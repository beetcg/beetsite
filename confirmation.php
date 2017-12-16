<?php
	require_once "./src/app_api/config/connection.php";
	require_once "./src/app_api/modules/methods/tech.php";

	$id = $_GET["x"];
	$salt = $_GET["y"];

	$obj = new Methods();
	$resp = $obj->checkAcount('tech',$id, $salt);

	if ($resp['active'] == '1') {
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
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form id="form_confirm" enctype="multipart/form-data">
					<div id="form_message"></div>
					<div class="form-group">
				    <label for="id_card">Documentation</label>
				    <input type="file" class="form-control-file" id="id_card">
				    <div class="invalid-feedback">
			        The IMAGE is invalid
			      </div>
				  </div>
				  <div class="form-check form-check-inline">
					  <label class="form-check-label">
					    <input class="form-check-input" type="checkbox" id="hardware" value="1"> Hardware
					  </label>
					</div>
					<div class="form-check form-check-inline">
					  <label class="form-check-label">
					    <input class="form-check-input" type="checkbox" id="printing" value="1"> Printing
					  </label>
					</div>
					<div class="form-check form-check-inline">
					  <label class="form-check-label">
					    <input class="form-check-input" type="checkbox" id="security" value="1"> Security
					  </label>
					</div>
					<div class="form-check form-check-inline">
					  <label class="form-check-label">
					    <input class="form-check-input" type="checkbox" id="television" value="1"> Television
					  </label>
					</div>
					<br><br>
				  <div class="form-check form-check-inline">
					  <label class="form-check-label">
					    <input class="form-check-input" type="checkbox" id="virus" value="1"> Virus
					  </label>
					</div>
					<div class="form-check form-check-inline">
					  <label class="form-check-label">
					    <input class="form-check-input" type="checkbox" id="network" value="1"> Network
					  </label>
					</div>
					<div class="form-check form-check-inline">
					  <label class="form-check-label">
					    <input class="form-check-input" type="checkbox" id="telephone" value="1"> Telephone
					  </label>
					</div>
					<div class="form-check form-check-inline">
					  <label class="form-check-label">
					    <input class="form-check-input" type="checkbox" id="servers" value="1"> Servers
					  </label>
					</div>
					<div class="invalid-feedback" id="cbm">
			        At least one has to be selected
			    </div>

					<input type="hidden" id="id" name="id" value="<?php echo $id ?>">
					<input type="hidden" id="salt" name="salt" value="<?php echo $salt ?>">
					<button type="submit" class="btn btn-dark btn-block"><span id="sub">Submit</span></button>
			</form>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<script src="./src/app_api/modules/technician/controller.js"></script>
</body>
</html>
