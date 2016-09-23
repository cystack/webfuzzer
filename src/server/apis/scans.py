from flask import request, jsonify
from flask_restful import Resource, Api, marshal_with, fields, abort
from flask_jwt import current_identity, jwt_required
from .errors import JsonRequiredError
from .errors import JsonInvalidError
from database import db
from models import Scan
import json

class ScansList(Resource):
    decorators = [jwt_required()]

    def get(self):
        scans = Scan.query.filter_by(user_id=current_identity.id).all()
        res = []
        for s in scans:
            if (s.deleted):
                continue
            r = {"id": s.relative_id, "href": "/scans/%d" % s.relative_id, "status": s.status, "start_time": s.start_time, "target_url": s.target_url}
            res.append(r)
        return res

    def post(self):
        reqs = request.get_json()
        if not reqs:
            raise JsonRequiredError()
        try:
            reqs['user_id'] = current_identity.id
            current_identity.num_scans += 1
            reqs['id'] = current_identity.num_scans
            u = Scan(**reqs)
            db.session.add(u)
            db.session.commit()
            # TODO: do actual scan
        except KeyError:
            raise JsonInvalidError()

class ScansEndpoint(Resource):
    decorators = [jwt_required()]

    def get(self, scan_rel_id):
        s = Scan.query.filter_by(user_id=current_identity.id, relative_id=scan_rel_id).first()
        if (s is None) or (s.deleted):
            return {"code": "ResourceNotFound", "message": "The specified resource does not exist."}, 404
        res = {'id': s.relative_id, "description": s.description, "target_url": s.target_url, "start_time": s.start_time, "scan_time": s.scan_time, "profile": s.profile, "status": s.status, "noti_href": "/scans/%d/noti" % s.relative_id, "vuln_href": "/scans/%d/vuln" % s.relative_id}
        return res

    def post(self, scan_rel_id): # change false positive only
        s = Scan.query.filter_by(user_id=current_identity.id, relative_id=scan_rel_id).first()
        if (s is None) or (s.deleted):
            return {"code": "ResourceNotFound", "message": "The specified resource does not exist."}, 404
        reqs = request.get_json()
        if not reqs:
            raise JsonRequiredError()
        try:
            s.description = reqs['description']
            db.session.commit()
        except KeyError:
            raise JsonInvalidError()

    def delete(self, scan_rel_id):
        s = Scan.query.filter_by(user_id=current_identity.id, relative_id=scan_rel_id).first()
        if (s is None) or (s.deleted):
            return {"code": "ResourceNotFound", "message": "The specified resource does not exist."}, 404
        s.deleted = True
        db.session.commit()
        return None, 204