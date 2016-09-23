import requests
import json

data = {'scan_profile': file('../core/w3af/profiles/full_audit.pw3af').read(),
        'target_urls': ['http://testphp.acunetix.com']}

response = requests.post('http://128.199.218.229:5001/scans/',
                         data=json.dumps(data),
                         headers={'content-type': 'application/json'})
						 
print response.text
