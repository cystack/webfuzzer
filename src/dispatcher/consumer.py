import pika
import requests
import json
import sys
import time
import sqlalchemy as db
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy.orm import sessionmaker
import os

# database stuffs
Base = declarative_base()

# scan
class Scan(Base):
	__tablename__ = 'scans'
	id = db.Column(db.Integer, primary_key = True)
	relative_id = db.Column(db.Integer)
	description = db.Column(db.Text)
	target_url = db.Column(db.String(128))
	start_time = db.Column(db.Time)
	scan_time = db.Column(db.Time, nullable=True)
	profile = db.Column(db.String(32))
	status = db.Column(db.String(32))
	deleted = db.Column(db.Boolean, default=False)
	num_vulns = db.Column(db.Integer)
	vulns = db.orm.relationship("Vulnerability", back_populates="scan")
	user_id = db.Column(db.String(40))

	def __repr__(self):
		return '<Scan %d>' % self.id

# vuln
class Vulnerability(Base):
	__tablename__ = 'vulns'
	id = db.Column(db.Integer, primary_key = True)
	relative_id = db.Column(db.Integer) # relative to scans
	stored_json = db.Column(db.Text) # inefficient, might fix later
	deleted = db.Column(db.Boolean, default=False)
	false_positive = db.Column(db.Boolean, default=False)
	scan_id = db.Column(db.Integer, db.ForeignKey('scans.id'))
	scan = db.orm.relationship("Scan", back_populates="vulns")

	def __init__(self, id, json, scan_id):
		self.relative_id = id
		self.stored_json = json
		self.scan_id = scan_id

	def __repr__(self):
		return '<Vuln %d>' % self.id

engine = db.create_engine(os.environ.get('SQLALCHEMY_CONN_STRING'))
Session = sessionmaker(bind=engine)
sess = Session()

credentials = pika.PlainCredentials('test', 'test123@')
con = pika.BlockingConnection(pika.ConnectionParameters(host='188.166.243.111',credentials=credentials))

channelTask = con.channel()
channelTask.queue_declare(queue='task', durable=True)

channelResult = con.channel()
channelResult.queue_declare(queue='result')

server = sys.argv[1]

vul_cnt = 0

def freeServer(sv, href):
	r = requests.delete(sv + href)
	print r.text

def isFree(sv):
	r = requests.get(sv + '/scans/')
	print r.text
	items = json.loads(r.text)['items']
	if len(items) == 0:
		return True
	# number of items > 0
	item = items[0]
	if item['status'] == 'Stopped':
		freeServer(sv, item['href'])
		return True
	return False

def sendTaskDone(server, href):
	data = {}
	data['server'] = server
	data['href'] = href
	message = json.dumps(data)
	channelResult.basic_publish(exchange='',
						routing_key='result',
						body=message)

def scann(target):
	data = {'scan_profile': file('../core/w3af/profiles/full_audit.pw3af').read(),
		'target_urls': [target]}
	response = requests.post(server + '/scans/',
						data=json.dumps(data),
						headers={'content-type': 'application/json'})

def getVul(sv, href):
	r = requests.get(sv + href)
	#db.insert(r.text)

def getVulsList(sv, href):
	global vul_cnt
	r = requests.get(sv + href + 'kb')
	vuls = json.loads(r.text)['items']
	l = len(vuls)
	if l > vuls_cnt:
		for vul in vuls:
			if vul['id'] >= vul_cnt:
				getVul(sv, vul['href'])
	vul_cnt = l
		

def callback(ch, method, properties, body):
	print('Get message %s', body)
	task = json.loads(body)
	scann(task['target'])
	task_done = False
	time.sleep(1)
	step = 0
	last_vuln_len = 0
	sv = server
	while True:
		# update scan status; check if freed
		list_scans = json.loads(requests.get(sv + '/scans/').text)['items'] # currently just 1
		if (len(list_scans) == 0): # freed
			break
		scan = sess.query(Scan).filter_by(id=task['scan_id']).first()
		currentpath = list_scans[0]['href']
		# update vuln list
		r = requests.get(sv + currentpath + '/kb/')
		items = json.loads(r.text)['items']	
		for i in xrange(last_vuln_len, len(items)):
			v = Vulnerability(i+1, requests.get(sv + items[i]['href']).text, task['scan_id'])
			sess.add(v)
			sess.commit()
		scan.num_vulns += 1
		sess.commit()
		scan.status = list_scans[0]['status']
		sess.commit()
		if scan.status == 'Stopped' and not task_done:
			task_done = True
			requests.delete(sv + currentpath)
		step += 1
		if step == 9:
			con.process_data_events()
			step = 0
		time.sleep(5)
	ch.basic_ack(delivery_tag=method.delivery_tag)
#print getServerStatus(server)


channelTask.basic_qos(prefetch_count=1)
channelTask.basic_consume(callback, queue='task')

print '[*] Waiting for message'

channelTask.start_consuming()

