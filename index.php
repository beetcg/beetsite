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
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form id="form_create">
					<div id="form_message"></div>
					<div class="form-group">
				    <input 
				    	type="text" 
				    	class="form-control" 
				    	name="fname" 
				    	id="fname" 
				    	placeholder="First Name">
				    	<div class="invalid-feedback">
				        Is invThe FIRST NAME is invalid
				      </div>
				  </div>
					<div class="form-group">
				    <input 
				    	type="text" 
				    	class="form-control" 
				    	name="lname" 
				    	id="lname" 
				    	placeholder="Last Name">
				    	<div class="invalid-feedback">
				        The LAST NAME is invalid
				      </div>
				  </div>
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
					<div class="form-group">
				    <input 
				    	type="text" 
				    	class="form-control" 
				    	name="tlf" 
				    	id="tlf" 
				    	placeholder="Mobile">
				    	<div class="invalid-feedback">
				        The PHONE is invalid
				      </div>
				  </div>
					<div class="form-group">
				    <input 
				    	type="text" 
				    	class="form-control" 
				    	name="zip" 
				    	id="zip" 
				    	placeholder="Zip Code">
				    	<div class="invalid-feedback">
				        The ZIP CODE is invalid
				      </div>
				  </div>
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