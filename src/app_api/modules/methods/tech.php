<?php
	/**
	* This is a Methods class
	*/
	class Methods {
		// If exist the user 
		public function ifExist($table, $email){
			$obj = new connect();
			$connect = $obj->connection();
			$res = 'Inicialiced';

			$email_lower = strtolower($email);
			$email_s = filter_var($email_lower, FILTER_SANITIZE_EMAIL);

			$sql= "SELECT email FROM $table WHERE email='$email_s'";
			$result = mysqli_query($connect, $sql);

			if (mysqli_num_rows($result) > 0) {
		    while($row = mysqli_fetch_assoc($result)) {
		       $res = 'Email Exist'; 
		       break;
		    }
			} else {
			    $res = 'Email Does not Exist';
			}

			mysqli_close($connect);

			return array($res);
		}

		// Add User
		public function create($fname,$lname,$email,$pass,$tlf,$zip){
			$obj = new connect();
			$connect = $obj->connection();
			$res = 'Inicialiced';
			date_default_timezone_set('America/Guatemala');

			$id = uniqid();
			$salt = md5(uniqid());
			$hash = password_hash($pass, PASSWORD_BCRYPT);
			$email_lower = strtolower($email);
			$email_s = filter_var($email_lower, FILTER_SANITIZE_EMAIL);
			$activate_code = md5(uniqid()).uniqid();
			$date = date('m/d/Y H:i:s', time());

			$aux1 = 'Do you want to have an apple?';
			$aux2 = 'yes I Want to';

			$sql= "INSERT INTO tech(__id,fname,lname,email,zip,tlf,question,answer,salt,hash,activate_code,active,created_at,update_at,hardware,printing,security,television,virus,network,telephone,servers) VALUES ('$id',$fname','$lname','$email_s','$zip','$tlf','$aux1','$aux2','$salt','$hash','$activate_code','0','$date','$date','0','0','0','0','0','0','0','0')";

			$result = mysqli_query($connect, $sql);

			if ($result) {
			  $res = 'Save Technician';
			} else {
			  $res = 'Dont Save Technician';
			}

			mysqli_close($connect);

			return array($res, $result);
		}

		// try to Connect
		public function tryToConnect(){
			$obj = new connect();
			$connect = $obj->connection();
			$res = 'Inicialized';

			$sql = "SELECT * FROM tech";
			$result = mysqli_query($connect, $sql);

			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
			      $res = 'Connected';
			      break;
			    }
			} else {
			    $res = 'Not Connected';
			}

			mysqli_lcose($connect);
			
			return $res;
		}
	}