from flask import jsonify
from flask_restful import abort, Api, Resource
from users import UsersEndpoint
from domains import DomainsList, DomainsEndpoint
from scans import ScansList, ScansEndpoint

api = Api()

api.add_resource(UsersEndpoint, '/users')
api.add_resource(DomainsList, '/domains')
api.add_resource(DomainsEndpoint, '/domains/<int:domain_rel_id>')
api.add_resource(ScansList, '/scans')
api.add_resource(ScansEndpoint, '/scans/<int:scan_rel_id>')
