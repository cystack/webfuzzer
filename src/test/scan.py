import requests
import json

data = {'scan_profile': file('../Server/Engine/w3af/profiles/full_audit.pw3af').read(),
        'target_urls': ['http://testphp.acunetix.com']}

response = requests.post('http://192.168.81.128:5000/scans/',
                         data=json.dumps(data),
                         headers={'content-type': 'application/json'})
						 
print response.text