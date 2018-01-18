<?php
	require_once "./src/app_api/config/connection.php";

	$id = $_GET["x"];
	$salt = $_GET["y"];
  $type = $_GET["t"];

	if ($type == 'tech') {
		require_once "./src/app_api/modules/methods/tech.php";
	} else {
		require_once "./src/app_api/modules/methods/client.php";
	}

	$obj = new Methods();
	$resp = $obj->checkAcount($type ,$id, $salt);

	if (!$resp) {
		header('Location: http://comiczone.hol.es/');
	}
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
	<script src="https://use.fontawesome.com/e7cf633633.js"></script>
</head>
	<div class="container">
		<pre>
			<?php echo json_encode($resp); ?>
		</pre>
		<div class="row">
			<div class="col-md-8 offset-md-2">
        <h1>Recovery Password</h1>
        <h2><?php echo $resp['fname'].' '.$resp['lname']; ?> <small><?php echo $type ?></small></h2>
				<form id="new_pass_<?php echo $type ?>">
					<div class="form-group">
						<input
							type="password"
							class="form-control"
							name="pass"
							id="pass"
							placeholder="Password">
							<div class="invalid-feedback">
								The PASSWORD is invalid
								<ul>
									<li>at least 8 characters</li>
									<li>must contain at least 1 uppercase letter, 1 lowercase letter, and 1 number</li>
									<li>Can contain special characters</li>
								</ul>
							</div>
					</div>
					<div class="form-group">
						<input
							type="password"
							class="form-control"
							name="r_pass"
							id="r_pass"
							placeholder="Repeat Password">
							<div class="invalid-feedback">
								The PASSWORD is invalid
								<ul>
									<li>at least 8 characters</li>
									<li>must contain at least 1 uppercase letter, 1 lowercase letter, and 1 number</li>
									<li>Can contain special characters</li>
								</ul>
							</div>
					</div>
					<div class="invalid-feedback" id="same">
						The PASSWORDS are not the same
					</div>
					<input type="hidden" name="__id" value="<?php echo $id;?>">
					<input type="hidden" name="salt" value="<?php echo $salt;?>">
					<button type="submit" class="btn btn-dark btn-block"><span id="sub">Change Password</span></button>
				</form>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<script src="./src/app_api/modules/technician/controller.js"></script>
	<script src="./src/app_api/modules/client/controller.js"></script>
</body>
</html>
