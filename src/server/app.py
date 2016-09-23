"""
This script runs the application using a development server.
It contains the definition of routes and views for the application.
"""

from flask import Flask
from flask_jwt import JWT
from config import configs
from database import db
from apis import api
from models import authenticate, identity, User

jwt = JWT(authentication_handler=authenticate, identity_handler=identity)

def create_app(config_name):
    app = Flask(__name__)

    # setup configs
    app.config.from_object(configs[config_name])
    configs[config_name].init_app(app)

    # init modules
    db.init_app(app)
    jwt.init_app(app)
    api.init_app(app)

    # routes

    # Make the WSGI interface available at the top level so wfastcgi can get it.
    global wsgi_app
    wsgi_app = app.wsgi_app

	# dev
    @app.before_first_request
    def init_data():
        db.create_all()
        u = User('joe', 'pass')
        db.session.add(u)
        db.session.commit()
        
    # CORS
    @app.after_request
    def after_request(response):
        response.headers.add('Access-Control-Allow-Origin', '*')
        response.headers.add('Access-Control-Allow-Headers', 'Content-Type,Authorization')
        response.headers.add('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE')
        return response

    return app


if __name__ == '__main__':
    import os
    HOST = os.environ.get('SERVER_HOST', 'localhost')
    try:
        PORT = int(os.environ.get('SERVER_PORT', '5555'))
    except ValueError:
        PORT = 5555
    app = create_app('development')
    app.run(HOST, PORT)