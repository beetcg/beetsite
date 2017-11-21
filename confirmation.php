<?php
	session_start();
	session_unset();
	
	require_once "./src/app_api/config/connection.php";
	require_once "./src/app_api/modules/methods/tech.php";

	$id = $_GET["x"];
	$salt = $_GET["y"];

	$obj = new Methods();
	$resp = $obj->confirmAcount('tech',$id, $salt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form</title>
	<base href="/">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="./src/assets/css/app.css">
</head>
<body>
	<div class="container">
		

	</div>

	<script></script>	
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	<script src="./src/app_api/modules/technician/controller.js"></script>
</body>
</html>