from flask import request, jsonify
from flask_restful import Resource, Api, marshal_with, fields, abort
from flask_jwt import current_identity, jwt_required
from .errors import JsonRequiredError
from .errors import JsonInvalidError
from database import db
from models import Domain
import json

class DomainsList(Resource):
    decorators = [jwt_required()]

    def get(self):
        domains = Domain.query.filter_by(user_id=current_identity.id).all()
        res = []
        for d in domains:
            if (d.deleted):
                continue
            if (d.ssl):
                url = 'https://%s:%d/' % (d.url, d.port)
            else:
                url = 'http://%s:%d/' % (d.url, d.port)
            res.append({'id': d.relative_id, 'href': url})
        return res

    def post(self):
        reqs = request.get_json()
        if not reqs:
            raise JsonRequiredError()
        try:
            # TODO: check proper input
            reqs['user_id'] = current_identity.id
            current_identity.num_domains += 1
            reqs['id'] = current_identity.num_domains
            u = Domain(**reqs)
            db.session.add(u)
            db.session.commit()
        except KeyError:
            raise JsonInvalidError()

class DomainsEndpoint(Resource):
    decorators = [jwt_required()]

    def get(self, domain_rel_id):
        d = Domain.query.filter_by(user_id=current_identity.id, relative_id=domain_rel_id).first()
        if (d is None) or (d.deleted):
            return {"code": "ResourceNotFound", "message": "The specified resource does not exist."}, 404
        res = {'id': d.relative_id, "description": d.description, "url": d.url, "port": d.port, "ssl": d.ssl, "verification": d.verification, "verification_code": d.verification_code}
        return res

    def post(self, domain_rel_id):
        d = Domain.query.filter_by(user_id=current_identity.id, relative_id=domain_rel_id).first()
        if (d is None) or (d.deleted):
            return {"code": "ResourceNotFound", "message": "The specified resource does not exist."}, 404
        reqs = request.get_json()
        if not reqs:
            raise JsonRequiredError()
        try:
            d.description = reqs['description']
            db.session.commit()
        except KeyError:
            raise JsonInvalidError()

    def delete(self, domain_rel_id):
        d = Domain.query.filter_by(user_id=current_identity.id, relative_id=domain_rel_id).first()
        if (d is None) or (d.deleted):
            return {"code": "ResourceNotFound", "message": "The specified resource does not exist."}, 404
        d.deleted = True
        db.session.commit()
        return None, 204