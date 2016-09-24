"""
This script runs the application using a development server.
It contains the definition of routes and views for the application.
"""

from flask import Flask, request, current_app
from flask_jwt import JWT, JWTError
from flask_cors import CORS
from config import configs
from database import db
from apis import api
from models import authenticate, identity, User
from werkzeug.local import LocalProxy

jwt = JWT(authentication_handler=authenticate, identity_handler=identity)
cors = CORS(send_wildcard=True)

def create_app(config_name):
    app = Flask(__name__)

    # setup configs
    app.config.from_object(configs[config_name])

    # init modules
    cors.init_app(app)
    db.init_app(app)
    jwt.init_app(app)
    api.init_app(app)

    # routes
        
     #CORS

    # redirect
    app.add_url_rule('/scans/<int:scan_rel_id>/vuln', endpoint='VulnsList') # list vulns found in a scan

    @app.before_first_request
    def init():
        db.create_all()

    @app.before_request
    def detect_user_language():
        print request.data
        print request.headers

    return app


if __name__ == '__main__':
    import os
    HOST = os.environ.get('SERVER_HOST', '127.0.0.1')
    try:
        PORT = int(os.environ.get('SERVER_PORT', '5555'))
    except ValueError:
        PORT = 8080
    app = create_app('development')
    app.run(HOST, PORT)
