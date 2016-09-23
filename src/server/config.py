'''
Application config class here
'''

import os
basedir = os.path.abspath(os.path.dirname(__file__))

class Config(object):
    SECRET_KEY = os.environ.get('SECRET_KEY') or 'ce1e355f-77e1-4ddb-828b-76a2f759ce50'
    JWT_AUTH_URL_RULE = '/auth' # where to retrieve auth & handing out JWTs
    
    @staticmethod
    def init_app(app):
        pass

class DevelopmentConfig(Config):
    DEVELOPMENT = True
    SQLALCHEMY_DATABASE_URI = 'sqlite://' # stays in memory

    @staticmethod
    def init_app(app):
        super(DevelopmentConfig, DevelopmentConfig).init_app(app)

class TestingConfig(Config):
    TESTING = True
    SQLALCHEMY_DATABASE_URI = 'sqlite:///' + os.path.join(basedir, 'test.sqlite')

class ProductionConfig(Config):
    SQLALCHEMY_DATABASE_URI = 'sqlite:///' + os.path.join(basedir, 'data.sqlite')

configs = {
    'development': DevelopmentConfig,
    'testing': TestingConfig,
    'production': ProductionConfig,

    'default': DevelopmentConfig
}