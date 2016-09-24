from flask import request
from flask_restful import Resource, Api, marshal_with, fields, abort
from flask_jwt import jwt_required, current_identity
from .errors import JsonRequiredError
from .errors import JsonInvalidError
from .errors import InsufficientPermissionError, ResourceNotFoundError, UserExistedError
from database import db
from models import User

class UsersList(Resource):
    def post(self):
        reqs = request.get_json(force=True)
        if not reqs:
            raise JsonRequiredError()
        try:
            # check if email existed
            u = User.query.filter_by(email=reqs['email']).first()
            if not (u is None):
                raise UserExistedError()
            # TODO: check proper input
            u = User(**reqs)
            db.session.add(u)
            db.session.commit()
        except KeyError:
            raise JsonInvalidError()
        return {}, 201

class UsersEndpoint(Resource):
    decorators = [jwt_required()]

    def get(self, user_id):
        # check proper permission for user
        if (user_id != current_identity.id):
            raise InsufficientPermissionError()
        u = User.query.filter_by(id=user_id)
        if (u is None):
            raise ResourceNotFoundError()
        res = {"state": {"domain": {"quota": 0, "usage": 0}, "scan": {"quota": 0, "usage": 0}}}
        res['id'] = u.id
        res['profile'] = {"name": u.name, "email": u.email, "email_confirm": True, "organization": u.organization}
        return res

    def post(self, user_id):
        if (user_id != current_identity.id):
            raise InsufficientPermissionError()
        reqs = request.get_json()
        if not reqs:
            raise JsonRequiredError()
        u = User.query.filter_by(id=user_id)
        if (u is None):
            raise ResourceNotFoundError()
        try:
            if ('email' in reqs):
                u.email = reqs['email']
            if ('name' in reqs):
                u.name = reqs['name']
            if ('organization' in reqs):
                u.organization = reqs['organization']
            db.session.commit()
        except KeyError:
            raise JsonInvalidError()
