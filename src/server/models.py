from database import db
from werkzeug.security import generate_password_hash, check_password_hash
from datetime import datetime
import uuid

# user + role

class Role(db.Model):
    __tablename__ = 'roles'
    id = db.Column(db.Integer, primary_key = True)
    name = db.Column(db.Unicode(32), unique = True)
    description = db.Column(db.Text, unique = True)

    def __init__(self, name, description):
        self.name = name
        self.description = description

    def __repr__(self):
        return '<Role %r>' % self.name

user_roles = db.Table('user_roles',
    db.Column('role_id', db.Integer, db.ForeignKey('roles.id')),
    db.Column('user_id', db.String(32), db.ForeignKey('users.id'))
)

class User(db.Model):
    __tablename__ = 'users'
    id = db.Column(db.String(32), primary_key = True) # UUID
    username = db.Column(db.String(32), index = True, unique = True)
    email = db.Column(db.String(32))
    password_hash = db.Column(db.String(128))
    roles = db.relationship('Role', secondary=user_roles,
        backref=db.backref('users', lazy='dynamic'))
    organization = db.Column(db.Unicode(128), nullable=True)
    scans = db.relationship("Scan", back_populates="user")
    domains = db.relationship("Domain", back_populates="user")
    num_domains = db.Column(db.Integer)
    num_scans = db.Column(db.Integer)
    num_vulns = db.Column(db.Integer)

    def __init__(self, username, password, email=None, organization=None):
        self.id = str(uuid.uuid4())
        self.username = username
        self.password = password
        self.email = email
        self.organization = organization
        self.num_scans = 0
        self.num_domains = 0
        self.num_vulns = 0

    def __repr__(self):
        return '<User %r>' % self.username

    @property
    def password(self):
        raise AttributeError('password is not a readable attribute')

    @password.setter
    def password(self, password):
        self.password_hash = generate_password_hash(password, 'pbkdf2:sha256')

    def verify_password(self, password):
        return check_password_hash(self.password_hash, password)

# Flask-JWT supplier
def authenticate(username, password):
    user = User.query.filter_by(username = username).first()
    if user and user.verify_password(password):
        return user

def identity(payload):
    user_id = payload['identity']
    return User.query.filter_by(id = user_id).first()

# domain
class Domain(db.Model):
    __tablename__ = 'domains'
    id = db.Column(db.Integer, primary_key = True)
    relative_id = db.Column(db.Integer)
    description = db.Column(db.Text)
    url = db.Column(db.String(128))
    port = db.Column(db.Integer)
    ssl = db.Column(db.Boolean)
    verification = db.Column(db.Boolean)
    verification_code = db.Column(db.String(64))
    deleted = db.Column(db.Boolean, default=False)
    user_id = db.Column(db.String(32), db.ForeignKey('users.id'))
    user = db.relationship("User", back_populates="domains")

    def __init__(self, id, url, port, ssl, user_id, description=None):
        self.relative_id = id
        self.url = url
        self.port = port
        self.ssl = ssl
        self.description = description
        self.user_id = user_id
        # TODO: implement verification mechanism
        self.verification = true
        self.verification_code = ''

    def __repr__(self):
        return '<Domain %s:%d>' % (self.url. self.port)

# scan
class Scan(db.Model):
    __tablename__ = 'scans'
    id = db.Column(db.Integer, primary_key = True)
    relative_id = db.Column(db.Integer)
    description = db.Column(db.Text)
    target_url = db.Column(db.String(128))
    start_time = db.Column(db.Time, default=datetime.utcnow)
    scan_time = db.Column(db.Time, nullable=True)
    profile = db.Column(db.String(32))
    status = db.Column(db.String(32))
    deleted = db.Column(db.Boolean, default=False)
    user_id = db.Column(db.String(32), db.ForeignKey('users.id'))
    user = db.relationship("User", back_populates="scans")

    def __init__(self, id, description, target, profile, user_id):
        self.relative_id = id
        self.description = description
        self.target_url = target
        self.profile = profile
        self.status = '' # what?
        self.user_id = user_id

    def readyScan(self):
        self.scan_time = datetime.utcnow()
        # change status?

    def __repr__(self):
        return '<Scan %d>' % self.id

# vuln
