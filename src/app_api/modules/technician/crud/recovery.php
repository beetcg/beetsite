<?php
	require_once "./../../../../../vendor/autoload.php";
	require_once "./../../../config/connection.php";
	require_once "./../../methods/mail/mail.php";
	require_once "./../../methods/tech.php";

	$res = [];
	$res['found'] = false;
	$res['send'] = false;

	$obj = new Methods();
	$resp = $obj->tryToConnect();
	$res['connection'] = $resp;

	if(!empty($_POST)){
		$email = $_POST["email"];
		if(isset($email)){
			if($email!=""){

				$obj = new Methods();
				$resp = $obj->ifExist('tech', $email);
				$res['found'] = $resp;

				if ($res['found']) {
					$obj = new Methods();
					$resp = $obj->recovery('tech', $email);
					$res['send'] = $resp;
				} else {
					$res['send'] = false;
				}

			}
		}
	}

	echo json_encode($res);
