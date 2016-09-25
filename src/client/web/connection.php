<?php
	$host = '188.166.224.165';
	$port = '5555';
	// var_dump($_POST);
	function GET($url, $accessToken){
		$host = '188.166.224.165';
		$port = '5555';
		$ch = curl_init($host.':'.$port.$url);

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

	function DELETE($url, $accessToken){
		$host = '188.166.224.165';
		$port = '5555';
		$ch = curl_init($host.':'.$port.$url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		if ($accessToken !== "None"){
			curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Authorization:JWT '.$accessToken));
		}
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		# Send request.
		$response = curl_exec($ch);
	}

	if (isset($_GET['action']) && isset($_GET['id'])){
		if ($_GET['action'] === "delete"){
			DELETE('/domains/'.$_GET['id'], $token);
			header('Location: domains.php');
		}
		if ($_GET['action'] === "stop"){
			GET('scans/'.$_GET['id'].'/stop', $token);
			header('Location: scan.php');
		}
	}
	function POST($host, $port, $url, $accessToken, $body){
		$ch = curl_init($host.':'.$port.$url);
		# Setup request to send json via POST.
		$bodyArray = array();
		foreach (explode(" ++ ", $body) as $pair){
			$keyValue = explode(":", $pair);
			$key = $keyValue[0];
			$value = $keyValue[1];
			$bodyArray[$key] = $value;
		}
		$bodyJSON = json_encode($bodyArray);
		$payload = $bodyJSON;
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

	if (isset($_POST['action'])) {
		POST($host, $port, $_POST['url'], $_POST['accessToken'], $_POST['body']);
		// header('Location: '.'./'.$_POST['redirectURL'].php);
	}
	
	
	// $body = "email:giaplvk57@gmail.com ++ password:123567 ++ name:asd ++ organization:BSE";
	
	
	// var_dump(POST($host, $port, '/users', 'None', 'email:giaplvk57@gmail.com ++ password:123567 ++ name:asd ++ organization:BSE company'));
	// $authRequest = POST($host, $port, '/auth', array(), array("email" => "1stsring@a2maa.com", "password" => "string"));
	// var_dump($authRequest);
	// $access_token = $authRequest['body']['access_token'];

	// var_dump(POST($host, $port, '/domains', array('Authorization: JWT '.$access_token), array("url" => "tuandsep2hjdtxrasi.com", "description" => "strsssssing", "port" => "123", "ssl" => "0")));

	// var_dump(GET($host, $port, '/domains', array('Authorization: JWT '.$access_token)));
?>


<!-- action=POST&url=api_url&accessToken=sjaghdas&body=abc:aksdhjk ++ fei:wqei ++ uwiqe:jhasd&redirecURL=dashboard -->