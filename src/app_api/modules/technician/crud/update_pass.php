<?php
	require_once "./../../../../../vendor/autoload.php";
	require_once "./../../../config/connection.php";
	require_once "./../../methods/mail/mail.php";
	require_once "./../../methods/tech.php";

	$res = [];
	$res['found'] = false;
	$res['update'] = false;

	$obj = new Methods();
	$resp = $obj->tryToConnect();
	$res['connection'] = $resp;

	if(!empty($_POST)){
		$id = $_POST["__id"];
		$salt = $_POST["salt"];
		$pass = $_POST["pass"];

		if(isset($id) && isset($salt) && isset($pass)){
			if($id!="" && $salt!="" && $pass!=""){

				$obj = new Methods();
      	$resp = $obj->checkAcount('tech', $id, $salt);
				$res['data'] = $resp;

				if ($res['data']) {
          $res['found'] = true;

					$obj = new Methods();
					$resp = $obj->new_pass('tech', $pass, $id, $salt);
					$res['update'] = $resp;
				}

			}
		}
	}

	echo json_encode($res);
