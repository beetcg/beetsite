<?php
	/**
	* This is a Methods class
	*/
	class Methods {
		// If exist the user 
		public function ifExist($table, $email){
			$obj = new connect();
			$connect = $obj->connection();
			$res = 'Inicialiced (tech.php)';

			$email_lower = strtolower($email);
			$email_s = filter_var($email_lower, FILTER_SANITIZE_EMAIL);

			$sql= "SELECT email FROM $table WHERE email='$email_s'";
			$result = mysqli_query($connect, $sql);

			if (mysqli_num_rows($result) > 0) {
		    while($row = mysqli_fetch_assoc($result)) {
		       $res = 'Email Exist(tech.php)'; 
		       break;
		    }
			} else {
			    $res = 'Email Does not Exist (tech.php)';
			}

			mysqli_close($connect);

			return $res;
		}

		// Add User
		public function create($fname,$lname,$email,$pass,$tlf,$zip){
			$obj = new connect();
			$connect = $obj->connection();
			$res = 'Inicialiced (tech.php)';
			date_default_timezone_set('America/Guatemala');

			$id = uniqid();
			$salt = md5(uniqid());
			$hash = password_hash($pass, PASSWORD_BCRYPT);
			$email_lower = strtolower($email);
			$email_s = filter_var($email_lower, FILTER_SANITIZE_EMAIL);
			$activate_code = md5(uniqid()).uniqid();
			$date = date("Y-m-d H:i:s"), time();
			
			$sql= "INSERT INTO tech (__id, fname, lname, email, tlf, zip, question, answer, salt, hash, activate_code, active, hardware, printing, security, television, virus, network, telephone, servers, created_at, update_at) VALUES ('$id','$fname','$lname','$email_s','$tlf','$zip',null,null,'$salt','$hash','$activate_code','0','0','0','0','0','0','0','0','0','$date','$date')";

			if (mysqli_query($connect, $sql)) {
			  $res = 'Save Technician (tech.php)';
			} else {
			  $res = 'Dont Save Technician (tech.php)';
			}

			mysqli_close($connect);
			
			return $res;
		}

		// try to Connect
		public function tryToConnect(){
			$obj = new connect();
			$connect = $obj->connection();
			$res = 'Inicialized (tech.php)';

			$sql = "SELECT * FROM tech";
			$result = mysqli_query($connect, $sql);

			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
			      $res = 'Connected (tech.php)';
			      break;
			    }
			} else {
			    $res = 'Not Connected (tech.php)';
			}

			mysqli_close($connect);
			
			return $res;
		}
	}