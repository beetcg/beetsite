<?php

	require_once "./../../config/connection.php";
	require_once "./../methods/tech.php";

	$res = [];
	
	$obj = new Methods();
	$resp = $obj->tryToConnect();
	$res['Connection'] = $resp;

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
				$resp = $obj->ifExist('tech', $email);
				$res['found'] = $resp;

				if ($res['found'] === 'Email Does not Exist') {
					$obj = new Methods();
					$resp = $obj->create($fname,$lname,$email,$pass,$tlf,$zip);
					$res['save'] = $resp;
				} else {
					$res['save'] = 'Dont Save Technician';
				}
			}
		}
	}
	echo json_encode($res);
