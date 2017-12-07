<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form</title>
	<base href="/">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="./src/assets/css/app.css">
	<script src="https://use.fontawesome.com/e7cf633633.js"></script>
</head>
<body>
	<div class="container">
		<div class="row my-5">
			<div class="col-md-8 offset-md-2 my-5">
        <div class="row">
					<a class="btn btn-info btn-lg btn-block" href="./client.php">Client's registry</a>
        </div>
				<hr>
				<div class="row">
					<a class="btn btn-info btn-lg btn-block" href="./tech.php">Technician's registry</a>
				</div>
				<hr>

				<div class="row">
					<div class="col-md-6">
						<form>
							<div class="form-group">
								<input
									type="email"
									class="form-control"
									name="email"
									id="email"
									placeholder="Email">
									<div class="invalid-feedback">
										The EMAIL is invalid
									</div>
							</div>
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
							<button type="submit" class="btn btn-dark btn-block"><span id="sub">Client</span></button>
						</form>
						<br>
						<a href="#" data-toggle="modal" data-target="#client_recovery" class="text-left d-block">Olvide mi contraseña</a>
					</div>

					<div class="col-md-6">
						<form>
							<div class="form-group">
								<input
									type="email"
									class="form-control"
									name="email"
									id="email"
									placeholder="Email">
									<div class="invalid-feedback">
										The EMAIL is invalid
									</div>
							</div>
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
							<button type="submit" class="btn btn-dark btn-block"><span id="sub">Technician</span></button>
						</form>
						<br>
						<a href="#" data-toggle="modal" data-target="#tech_recovery" class="text-right d-block">Olvide mi contraseña</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Technician Recovery -->
	<div class="modal fade" id="tech_recovery" tabindex="-1" role="dialog" aria-labelledby="tech_recovery" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="tech_recovery">Recovery Password</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
				<form id="recovery_form_tech">
		      <div class="modal-body">
							<div class="form-group">
						    <input
						    	type="email"
						    	class="form-control"
						    	name="email"
						    	id="emailRT"
						    	placeholder="Email">
						    	<div class="invalid-feedback">
						        The EMAIL is invalid
						      </div>
						  </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary"><span id="subRC">Client</span></button>
		      </div>
				</form>
	    </div>
	  </div>
	</div>

	<!-- Client Recovery -->
	<div class="modal fade" id="client_recovery" tabindex="-1" role="dialog" aria-labelledby="client_recovery" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="client_recovery">Recovery Password</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
				<form id="recovery_form_client">
		      <div class="modal-body">
							<div class="form-group">
						    <input
						    	type="email"
						    	class="form-control"
						    	name="email"
						    	id="emailRC"
						    	placeholder="Email">
						    	<div class="invalid-feedback">
						        The EMAIL is invalid
						      </div>
						  </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Recovery</button>
		      </div>
				</form>
	    </div>
	  </div>
	</div>

	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<script src="./src/app_api/modules/client/controller.js"></script>
	<script src="./src/app_api/modules/technician/controller.js"></script>
</body>
</html>
