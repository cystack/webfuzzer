from flask import request, jsonify
from flask_restful import Resource, Api, marshal_with, fields, abort
from flask_jwt import current_identity, jwt_required
from .errors import JsonRequiredError
from .errors import JsonInvalidError
from .errors import ResourceNotFoundError
from database import db
from models import Scan, Domain
import json
import pika

class ScansList(Resource):
    decorators = [jwt_required()]

    def get(self):
        scans = Scan.query.filter_by(user_id=current_identity.id).all()
        res = []
        for s in scans:
            if (s.deleted):
                continue
            r = {"id": s.relative_id, "href": "/scans/%d" % s.relative_id, "status": s.status, "start_time": str(s.start_time), "target_url": s.target_url}
            res.append(r)
        return res

    def post(self):
        reqs = request.get_json()
        if not reqs:
            raise JsonRequiredError()
        try:
            params = {}
            params['user_id'] = current_identity.id
            current_identity.num_scans += 1
            params['id'] = current_identity.num_scans
            params['description'] = reqs['description']
            # construct URL from stuffs
            domain = Domain.query.filter_by(user_id=current_identity.id, relative_id=reqs['domain_id']).first()
            if (domain is None) or (domain.deleted):
                raise ResourceNotFoundError()
            url = ''
            if (not reqs['bootstrap_path'].startswith('/')):
                reqs['bootstrap_path'] = '/' + reqs['bootstrap_path']
            if (domain.ssl):
                url = 'https://%s:%d%s' % (domain.url, domain.port, reqs['bootstrap_path'])
            else:
                url = 'http://%s:%d%s' % (domain.url, domain.port, reqs['bootstrap_path'])
            params['target'] = url
            params['profile'] = ''
            u = Scan(**params)
            db.session.add(u)
            db.session.commit()
            # post message to RabbitMQ then forget about it
            credentials = pika.PlainCredentials('test', 'test123@')
            con = pika.BlockingConnection(pika.ConnectionParameters(host='188.166.243.111',credentials=credentials))
            channel = con.channel()
            channel.queue_declare(queue='task', durable=True)
            channel.basic_publish(exchange='', routing_key='task', body=json.dumps({'target': url, 'scan_id': u.id}), properties=pika.BasicProperties(delivery_mode = 2))
            con.close()
        except KeyError:
            raise JsonInvalidError()

class ScansEndpoint(Resource):
    decorators = [jwt_required()]

    def get(self, scan_rel_id):
        s = Scan.query.filter_by(user_id=current_identity.id, relative_id=scan_rel_id).first()
        if (s is None) or (s.deleted):
            raise ResourceNotFoundError()
        res = {'id': s.relative_id, "description": s.description, "target_url": s.target_url, "start_time": str(s.start_time), "scan_time": str(s.scan_time), "profile": s.profile, "status": s.status, "noti_href": "/scans/%d/noti" % s.relative_id, "vuln_href": "/scans/%d/vuln" % s.relative_id}
        return res

    def post(self, scan_rel_id): # change false positive only
        s = Scan.query.filter_by(user_id=current_identity.id, relative_id=scan_rel_id).first()
        if (s is None) or (s.deleted):
            raise ResourceNotFoundError()
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
            raise ResourceNotFoundError()
        s.deleted = True
        db.session.commit()
        return None, 204
