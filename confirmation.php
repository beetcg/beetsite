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
			<div class="col">
				<form id="form_confirm" enctype="multipart/form-data">
					<div id="form_message"></div>
					<div class="form-group">
				    <label for="id_card">Documentation</label>
				    <input type="file" class="form-control-file" id="id_card">
				    <div class="invalid-feedback">
			        The IMAGE is invalid
			      </div>
				  </div>

				 	<div class="row">
						<div class="col mb-3">
							<ul class="list-group">
								<li class="list-group-item list-group-item-info">Computer Support</li>
								<li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="1"> Computer Repair and Help </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="1" id="1">
									</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="2"> Computer Tune Up </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="2" id="2">
									</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="3"> Data Back-up or Transfer </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="3" id="3">
									</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="4"> New Computer Setup </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="4" id="4">
									</span>
								</li>
							  <li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="5"> Software Install or Uninstall </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="5" id="5">
									</span>
								</li>
							  <li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="6"> Printer Setup </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="6" id="6">
									</span>
								</li>
							  <li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="7"> OS (Operative System) Install or Re- Install </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="7" id="7">
									</span>
								</li>
							</ul>
						</div>
						<div class="col mb-3">
							<ul class="list-group">
								<li class="list-group-item list-group-item-info">Smart Home</li>
								<li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="8"> Smart Security Cam  Installation </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="8" id="8">
									</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="9"> Smart Hub Installation or Setup </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="9" id="9">
									</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="10"> Smart Device Hook-up </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="10" id="10">
									</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="11"> Smart Thermostat Installation </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="11" id="11">
									</span>
								</li>
							  <li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="12"> Video Doorbell Installation </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="12" id="12">
									</span>
								</li>
							</ul>
						</div>
				 	</div>

				 	<div class="row">
						<div class="col mb-3">
							<ul class="list-group">
								<li class="list-group-item list-group-item-info">Television </li>
								<li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="13"> Tv Wall Mount Installation </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="13" id="13">
									</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="14"> Tv Dismount or Remount </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="14" id="14">
									</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="15"> Cable Tv Service </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="15" id="15">
									</span>
								</li>
							</ul>
						</div>
						<div class="col mb-3">
							<ul class="list-group">
								<li class="list-group-item list-group-item-info">Audio & Video </li>
								<li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="16"> Home Theather Hook-up and Setup </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="16" id="16">
									</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="17"> Surround sound system setup </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="17" id="17">
									</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="18"> Tv and Home theather Support </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="18" id="18">
									</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="19"> Streaming  Video Device Setup and Support </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="19" id="19">
									</span>
								</li>
							</ul>
						</div>
				 	</div>

				 	<div class="row">
						<div class="col mb-3">
							<ul class="list-group">
								<li class="list-group-item list-group-item-info">Wifi & Network </li>
								<li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="20"> Wifi and network  Connectivity Support </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="20" id="20">
									</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="21"> New Wifi Connection Setup </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="21" id="21">
									</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="22"> Wifi Signal Extension </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="22" id="22">
									</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="23"> Internet Service Installation </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="23" id="23">
									</span>
								</li>
							</ul>
						</div>

						<div class="col mb-3">
							<ul class="list-group">
								<li class="list-group-item list-group-item-info">Malware/ Virus</li>
								<li class="list-group-item d-flex justify-content-between align-items-center">
								  <label for="24"> Virus Removal and Cleanup </label>
									<span class="badge">
										<input type="checkbox" name="subcat[]" value="24" id="24">
									</span>
								</li>
							</ul>
						</div>
				 	</div>

					<div class="invalid-feedback" id="cbm">
			        At least one has to be selected
			    </div>
					<br>

					<input type="hidden" id="id" name="id" value="<?php echo $id ?>">
					<input type="hidden" id="salt" name="salt" value="<?php echo $salt ?>">
					<button type="submit" class="btn btn-dark btn-block"><span id="sub">Submit</span></button>
				</div>
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
