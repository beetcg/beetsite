<?php
	require_once "./../../../../../vendor/autoload.php";
	require_once "./../../../config/connection.php";
	require_once "./../../methods/mail/mail.php";
	require_once "./../../methods/tech.php";

	$res = [];

	$obj = new Methods();
	$resp = $obj->tryToConnect();
	$res['connection'] = $resp;

	// Aqui se enviaran los datos de confirmation.php
	
	echo json_encode($res);