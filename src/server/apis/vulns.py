from flask import request, jsonify, json
from flask_restful import Resource, Api, marshal_with, fields, abort
from flask_jwt import current_identity, jwt_required
from .errors import JsonRequiredError
from .errors import JsonInvalidError
from .errors import ResourceNotFoundError
from database import db
from models import Scan, Vulnerability
import json

class VulnsList(Resource):
    decorators = [jwt_required()]

    def get(self, scan_rel_id):
        scan = Scan.query.filter_by(user_id=current_identity.id, relative_id=scan_rel_id).first()
        if (scan is None) or (scan.deleted):
            raise ResourceNotFoundError()
        vulns = Vulnerability.query.filter_by(scan_id=scan.id).all()
        res = []
        for v in vulns:
            if (v.deleted):
                continue
            t = json.loads(v.stored_json)
            r = {"id": v.relative_id, "href": "/vulns/%d/%d" % (scan_rel_id, v.relative_id), "name": t['name'], "url": t['url'], "severity": t['severity']}
            res.append(r)
        return res

class VulnsEndpoint(Resource):
    decorators = [jwt_required()]

    def get(self, scan_rel_id, vuln_rel_id):
        s = Scan.query.filter_by(user_id=current_identity.id, relative_id=scan_rel_id).first()
        if (s is None) or (s.deleted):
            raise ResourceNotFoundError()
        vuln = Vulnerability.query.filter_by(scan_id=s.id, relative_id=vuln_rel_id).first()
        if (vuln is None) or (vuln.deleted):
            raise ResourceNotFoundError()
        res = json.loads(vuln.stored_json)
        res['id'] = vuln.relative_id
        res['false_positive'] = vuln.false_positive
        res['href'] = ('/vulns/%d/%d' % (scan_rel_id, vuln.relative_id))
        # TODO: save traffic or do something else
        if ('traffic_hrefs' in res):
            del res['traffic_hrefs']
        return res

    def post(self, scan_rel_id, vuln_rel_id): # change false positive only
        s = Scan.query.filter_by(user_id=current_identity.id, relative_id=scan_rel_id).first()
        if (s is None) or (s.deleted):
            raise ResourceNotFoundError()
        vuln = Vulnerability.query.filter_by(scan_id=s.id, relative_id=vuln_rel_id).first()
        if (vuln is None) or (vuln.deleted):
            raise ResourceNotFoundError()
        reqs = request.get_json()
        if not reqs:
            raise JsonRequiredError()
        try:
            vuln.false_positive = reqs['false_positive']
            db.session.commit()
        except KeyError:
            raise JsonInvalidError()

    def delete(self, scan_rel_id, vuln_rel_id):
        s = Scan.query.filter_by(user_id=current_identity.id, relative_id=scan_rel_id).first()
        if (s is None) or (s.deleted):
            raise ResourceNotFoundError()
        vuln = Vulnerability.query.filter_by(scan_id=s.id, relative_id=vuln_rel_id).first()
        if (vuln is None) or (vuln.deleted):
            raise ResourceNotFoundError()
        vuln.deleted = True
        db.session.commit()
        return None, 204