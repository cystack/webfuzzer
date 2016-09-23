import pika
import requests
import json
from enum import Enum
import logging
import sys
import time

logging.basicConfig(level=logging.DEBUG)
logger = logging.getLogger('Dispatcher')

class ServerStatus(Enum):
	FREE = 1
	RUNNING = 2
	STOPPED = 3

credentials = pika.PlainCredentials('test', 'test123@')
con = pika.BlockingConnection(pika.ConnectionParameters(host='188.166.243.111',credentials=credentials))

channelTask = con.channel()
channelTask.queue_declare(queue='task', durable=True)

channelResult = con.channel()
channelResult.queue_declare(queue='result', durable=True)

server = sys.argv[1]

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

def getServerStatus(sv):
	r = requests.get(sv + '/scans/')
	items = json.loads(r.text)['items']
	if len(items) == 0:
		return ServerStatus.FREE, ''
	item = items[0]
	href = item['href']
	if item['status'] == 'Running':
		return ServerStatus.RUNNING, href
	if item['status'] == 'Stopped':
		return ServerStatus.STOPPED, href

def sendTaskDone(server, href):
	data = {}
	data['server'] = server
	data['href'] = href
	message = json.dumps(data)
	channelResult.basic_publish(exchange='',
						routing_key='result',
						body=message,
						properties=pika.BasicProperties(
							delivery_mode = 2,
						))

def scan(target):
	data = {'scan_profile': file('../core/w3af/profiles/full_audit.pw3af').read(),
		'target_urls': [target]}
	response = requests.post(server + '/scans/',
						data=json.dumps(data),
						headers={'content-type': 'application/json'})

def callback(ch, method, properties, body):
	logger.debug('Get message %s', body)
	task = json.loads(body)
	scan(task['target'])
	task_done = False
	while True:
		status, href = getServerStatus(server)
		if status == ServerStatus.FREE:
			break
		if status == ServerStatus.STOPPED and not task_done:
			task_done = True
			sendTaskDone(server, href)
		time.sleep(0.5)
	ch.basic_ack(delivery_tag = method.delivery_tag)

channel.basic_qos(prefetch_count=1)
channel.basic_consume(callback, queue='task')

print '[*] Waiting for message'

channel.start_consuming()
