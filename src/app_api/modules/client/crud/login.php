<?php
	require_once "./../../../config/connection.php";
	require_once "./../../methods/client.php";

	$res = [];

	$obj = new Methods();
	$resp = $obj->tryToConnect();
	$res['connection'] = $resp;
	$res['active'] = false;

	if(!empty($_POST)){
		$email = $_POST["email"];
		$pass = $_POST["pass"];
		if(isset($email) && isset($pass)){
			if($email!="" && $pass!=""){

				$obj = new Methods();
				$user = $obj->login('client', $email, $pass);

				if ($user['active'] == '1') {
					$res['data'] = $user;
					$res['active'] = true;
				}
			}
		}
	}

	echo json_encode($res);
