from flask import request
from flask_restful import Resource, Api, marshal_with, fields, abort
from .errors import JsonRequiredError
from .errors import JsonInvalidError
from database import db
from models import User

class UsersEndpoint(Resource):
    def post(self):
        reqs = request.get_json()
        if not reqs:
            raise JsonRequiredError()
        try:
            # TODO: check proper input
            u = User(**reqs)
            db.session.add(u)
            db.session.commit()
        except KeyError:
            raise JsonInvalidError()
