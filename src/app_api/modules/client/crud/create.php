<?php
	require_once "./../../../../../vendor/autoload.php";
	require_once "./../../../config/connection.php";
	require_once "./../../methods/mail/mail.php";
	require_once "./../../methods/client.php";

	$res = [];
	$res['found'] = false;
	$res['save'] = false;

	$obj = new Methods();
	$resp = $obj->tryToConnect();
	$res['connection'] = $resp;

	if(!empty($_POST)){
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$email = $_POST["email"];
		$pass  = $_POST["pass"];
		$tlf   = $_POST["tlf"];
		$zip   = $_POST["zip"];

		if(isset($fname) && isset($lname) && isset($email) && isset($pass) && isset($tlf) && isset($zip)){

			if($fname!="" && $lname!="" && $email!="" && $pass!="" && $tlf!="" && $zip!=""){

				$obj = new Methods();
				$resp = $obj->ifExist('client', $email);
				$res['found'] = $resp;

				if (!$res['found']) {
					$obj = new Methods();
					$resp = $obj->create($fname,$lname,$email,$pass,$tlf,$zip);
					$res['save'] = $resp;
				} else {
					$res['save'] = false;
				}
			}
		}
	}

	echo json_encode($res);
