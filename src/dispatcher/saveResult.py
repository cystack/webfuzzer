import pika
import requests
import json

credentials = pika.PlainCredentials('test', 'test123@')
con = pika.BlockingConnection(pika.ConnectionParameters(host='188.166.243.111',credentials=credentials))

channelResult = con.channel()
channelResult.queue_declare(queue='result')


def callback(ch, method, properties, body):
	print('Task done %s' % (body))
	
	
channelResult.basic_consume(callback, queue='result', no_ack=True)
channelResult.start_consuming()
