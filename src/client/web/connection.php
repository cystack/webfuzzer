<?php
	$host = '188.166.224.165';
	$port = '5555';

	function GET($host, $port, $url, $accessToken){
		$ch = curl_init($host.':'.$port.$url);
		# Setup request to send json via POST.
		if ($accessToken !== "None"){
			curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Authorization:JWT '.$accessToken));
		}
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		# Send request.
		$response = curl_exec($ch);
		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$header = explode("\n", substr($response, 0, $header_size));;
		$body = json_decode(substr($response, $header_size), true);
		return array('header' => $header, 'body' => $body);
	}

	function POST($host, $port, $url, $accessToken, $body){
		$ch = curl_init($host.':'.$port.$url);
		# Setup request to send json via POST.
		$payload = $body;
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		if ($accessToken !== "None"){
			curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Authorization:JWT '.$accessToken));
		}	
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		# Send request.
		$response = curl_exec($ch);
		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$header = explode("\n", substr($response, 0, $header_size));;
		$body = json_decode(substr($response, $header_size), true);
		return array('header' => $header, 'body' => $body);
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		POST($host, $port, $_POST['url'], $_POST['accessToken'], $_POST['body']);
	}
	
	var_dump(POST($host, $port, '/users', 'None', '{"email": "stri@ssccc.nssg", "password": "string", "name": "string", "organization": "string"
}'));
	// $authRequest = POST($host, $port, '/auth', array(), array("email" => "1stsring@a2maa.com", "password" => "string"));
	// var_dump($authRequest);
	// $access_token = $authRequest['body']['access_token'];

	// var_dump(POST($host, $port, '/domains', array('Authorization: JWT '.$access_token), array("url" => "tuandsep2hjdtxrasi.com", "description" => "strsssssing", "port" => "123", "ssl" => "0")));

	// var_dump(GET($host, $port, '/domains', array('Authorization: JWT '.$access_token)));
?>


<!-- action=POST&url=api_url&accessToken=sjaghdas&body=jhasghjdas -->