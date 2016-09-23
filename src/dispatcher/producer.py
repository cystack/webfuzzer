import pika
import json

credentials = pika.PlainCredentials('test', 'test123@')
con = pika.BlockingConnection(pika.ConnectionParameters(host='188.166.243.111',credentials=credentials))

channel = con.channel()

channel.queue_declare(queue='task', durable=True)

data = {'target': 'http://testphp.acunetix.com'}
data1 = {'target': 'http://timbus.vn'}
data2 = {'target': 'http://mp3.zing.vn'}
data3 = {'target': 'http://ctf.babyphd.net'}

channel.basic_publish(exchange='',
						routing_key='task',
						body=json.dumps(data),
						properties=pika.BasicProperties(
							delivery_mode = 2,
						))

channel.basic_publish(exchange='',
						routing_key='task',
						body=json.dumps(data1),
						properties=pika.BasicProperties(
							delivery_mode = 2,
						))

channel.basic_publish(exchange='',
						routing_key='task',
						body=json.dumps(data2),
						properties=pika.BasicProperties(
							delivery_mode = 2,
						))

channel.basic_publish(exchange='',
						routing_key='task',
						body=json.dumps(data3),
						properties=pika.BasicProperties(
							delivery_mode = 2,
						))
print "[x] Sent"

con.close()

