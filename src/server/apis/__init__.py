from flask import jsonify
from flask_restful import abort, Api, Resource
from users import UsersList, UsersEndpoint
from domains import DomainsList, DomainsEndpoint
from scans import ScansList, ScansEndpoint
from vulns import VulnsList, VulnsEndpoint

# meaningful errors
errors = {
    'UserExistedError': {
        'message': "The specified account already exists.",
        'status': 409,
    },
    'ResourceNotFoundError': {
        'message': "The specified resource does not exist.",
        'status': 404,
        'extra': "Any extra information you want.",
    },
    'InsufficientPermissionError': {
        'message': "Read operations are currently disabled.",
        'status': 403,
    },
    'JsonInvalidError': {
        'message': "One of the request inputs is not valid.",
        'status': 400,
    },
    'JsonRequiredError': {
        'message': "One of the request inputs is not valid.",
        'status': 400,
    },
    'JWTError': {
        'message': "Login failed.",
        'status': 401,
    },
}

api = Api(errors=errors, catch_all_404s=True)

api.add_resource(UsersList, '/users')
api.add_resource(UsersEndpoint, '/users/<string:user_id>')
api.add_resource(DomainsList, '/domains')
api.add_resource(DomainsEndpoint, '/domains/<int:domain_rel_id>')
api.add_resource(ScansList, '/scans')
api.add_resource(ScansEndpoint, '/scans/<int:scan_rel_id>')
api.add_resource(VulnsList, '/vulns/<int:scan_rel_id>')
api.add_resource(VulnsEndpoint, '/vulns/<int:scan_rel_id>/<int:vuln_rel_id>')
