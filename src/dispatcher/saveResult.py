import pika
import requests
import json
import logging

logging.basicConfig(level=logging.DEBUG)
logger = logging.getLogger('Wait for task done')

channelResult = con.channel()
channelResult.queue_declare(queue='result', durable=True)


def callback(ch, method, properties, body):
	logger.debug('Task done %s', body)
	
	
channel.basic_consume(callback, queue='result')
