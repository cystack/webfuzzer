import pika
import json

credentials = pika.PlainCredentials('test', 'test123@')
con = pika.BlockingConnection(pika.ConnectionParameters(host='188.166.243.111',credentials=credentials))

channel = con.channel()

channel.queue_declare(queue='task', durable=True)

data = {'target': 'http://testphp.acunetix.com'}

channel.basic_publish(exchange='',
						routing_key='task',
						body=json.dumps(data),
						properties=pika.BasicProperties(
							delivery_mode = 2,
						))

print "[x] Sent"

con.close()

