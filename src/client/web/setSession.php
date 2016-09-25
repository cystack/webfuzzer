<?php
	var_dump($_POST);
	if(isset($_POST)){
		var_dump($_POST);
		session_start();
		var_dump($_POST);
		$_SESSION["token"] = $_POST['token'];
	}
?>