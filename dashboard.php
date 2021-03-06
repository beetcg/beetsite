<?php session_start(); 
if (isset($_COOKIE['email'])) {
?>
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
<?php require_once 'menu.php'; 
if ($_SESSION['type'] == 'tech') {
	$type = "Technician ";
} else {
	$type = '';
}
?>

	<div class="container">
		<div class="row my-5">
			<div class="col-md-6 offset-md-3 my-2">
				<h1 class="text-center">Wellcome</h1>
    		<h2 class="text-center">
    			<?php echo $type.$_SESSION['fname']." ".$_SESSION['lname'];?>
    			<br>
					<small><?php echo $_SESSION['email'];?></small>
    		</h2>
				 
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
<?php 
	} else { // Fin del if
		header('Location: http://comiczone.hol.es/login');
	}
?>
