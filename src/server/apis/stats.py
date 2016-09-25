# dashboard stats endpoint

from flask import request, jsonify, json
from flask_restful import Resource, Api, marshal_with, fields, abort
from flask_jwt import current_identity, jwt_required
from .errors import JsonRequiredError
from .errors import JsonInvalidError
from .errors import ResourceNotFoundError
from database import db
from models import Scan, Vulnerability
import json

class OverallVulnEndpoint(Resource):
    decorators = [jwt_required()]

    def get(self):
        res = db.session.query(Vulnerability.severity, db.func.count(Vulnerability.severity)).join(Scan).join(Domain).group_by(Vulnerability.severity).all()
        return res

class DomainVulnEndpoint(Resource):
    decorators = [jwt_required()]

    def get(self, domain_rel_id):
        scan_subquery = db.session.query(Scan).filter_by(user_id=current_identity.id, domain_id=domain_rel_id).subquery()
        res = db.session.query(Vulnerability.severity, db.func.count(Vulnerability.severity)).join(scan_subquery).group_by(Vulnerability.severity).all()
        return res    

class DomainRecentScanEndpoint(Resource):
    decorators = [jwt_required()]

    def get(self, domain_rel_id):
        res = db.session.query(Scan).filter_by(user_id=current_identity.id, domain_id=domain_rel_id).order_by(Scan.start_time.desc()).limit(5)
        return res    