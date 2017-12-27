<?php
	require_once "./../../../config/connection.php";
	require_once "./../../methods/tech.php";

	$res = [];

	$obj = new Methods();
	$resp = $obj->tryToConnect();
	$res['connection'] = $resp;

	if(!empty($_POST)){
		$email = $_POST["email"];
		$pass = $_POST["pass"];
		if(isset($email) && isset($pass)){
			if($email!="" && $pass!=""){

				$obj = new Methods();
				$user = $obj->login('tech', $email, $pass);

				if ($user['active'] == '1') {
					$res['data'] = $user;
					$res['active'] = true;
				} else {
					$res['active'] = false;
				}
			}
		}
	}

	echo json_encode($res);
