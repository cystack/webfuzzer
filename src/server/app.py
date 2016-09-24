"""
This script runs the application using a development server.
It contains the definition of routes and views for the application.
"""

from flask import Flask
from flask_jwt import JWT
from flask_script import Manager
from config import configs
from database import db
from apis import api
from models import authenticate, identity, User

jwt = JWT(authentication_handler=authenticate, identity_handler=identity)
manager = Manager()

@manager.command
def createdb():
    "Just say hello"
    db.create_all()

def create_app(config_name):
    app = Flask(__name__)

    # setup configs
    app.config.from_object(configs[config_name])

    # init modules
    db.init_app(app)
    jwt.init_app(app)
    api.init_app(app)
    manager.init_app(app)

    # routes
        
    # CORS
#    @app.after_request
#    def after_request(response):
#        response.headers.add('Access-Control-Allow-Origin', '*')
#        response.headers.add('Access-Control-Allow-Headers', 'Content-Type,Authorization')
#        response.headers.add('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE')
#        return response

    # redirect
    app.add_url_rule('/scans/<int:scan_rel_id>/vuln', endpoint='VulnsList') # list vulns found in a scan

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
