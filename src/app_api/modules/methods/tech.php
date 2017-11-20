<?php
	/**
	* This is a Methods class
	*/
	class Methods {
		// try to Connect
		public function tryToConnect(){
			$obj = new connect();
			$connect = $obj->connection();
			$res = false;

			$sql = "SELECT * FROM tech";
			$result = mysqli_query($connect, $sql);

			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
			      $res = true;
			      break;
			    }
			}

			mysqli_close($connect);
			
			return $res;
		}

		// If exist the user 
		public function ifExist($table, $email){
			$obj = new connect();
			$connect = $obj->connection();
			$res = false;

			$email_lower = strtolower($email);
			$email_s = filter_var($email_lower, FILTER_SANITIZE_EMAIL);

			$sql= "SELECT email FROM $table WHERE email='$email_s'";
			$result = mysqli_query($connect, $sql);

			if (mysqli_num_rows($result) > 0) {
		    while($row = mysqli_fetch_assoc($result)) {
		       $res = true; 
		       break;
		    }
			}

			mysqli_close($connect);

			return $res;
		}

		// Add User
		public function create($fname,$lname,$email,$pass,$tlf,$zip){
			$obj = new connect();
			$connect = $obj->connection();
			$res = false;
			date_default_timezone_set('America/Guatemala');

			$id = uniqid();
			$salt = md5(uniqid());
			$hash = password_hash($pass, PASSWORD_BCRYPT);
			$email_lower = strtolower($email);
			$email_s = filter_var($email_lower, FILTER_SANITIZE_EMAIL);
			$activate_code = md5(uniqid()).uniqid();
			$date = date("Y-m-d H:i:s", time());

			$sql= "INSERT INTO tech (__id, fname, lname, email, tlf, zip, question, answer, salt, hash, activate_code, active, hardware, printing, security, television, virus, network, telephone, servers, created_at, update_at) VALUES ('$id','$fname','$lname','$email_s','$tlf','$zip',null,null,'$salt','$hash','$activate_code','0','0','0','0','0','0','0','0','0','$date','$date')";

			if (mysqli_query($connect, $sql)) {
			  $res = true;

					require '../../libs/PHPMailer/PHPMailerAutoload.php';

					$mail = new PHPMailer;

					//$mail->SMTPDebug = 3;                              // Enable verbose debug output
					$nombre = $fname.' '.$lname;
					$body = file_get_contents('./mail/template.html');

					$mail->isSMTP();                                     // Set mailer to use SMTP
					$mail->Host = 'smtp.gmail.com';                      // Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                              // Enable SMTP authentication
					$mail->Username = 'marco.montilla@beetcg.com';       // SMTP username
					$mail->Password = 'Marco1695';                       // SMTP password
					$mail->SMTPSecure = 'ssl';                           // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 465;                                   // TCP port to connect to

					$mail->setFrom('marco.montilla@beetcg.com', 'Mailer');
					$mail->addAddress($email_s, $nombre);     

					$mail->isHTML(true);                                  // Set email format to HTML
			    $mail->Subject = 'Email Confirmation';
			    $mail->Body    = $body;
			    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

					if(!$mail->send()) {
					    echo 'Error, mensaje no enviado';
					    echo 'Error del mensaje: ' . $mail->ErrorInfo;
					} else {
					    echo 'El mensaje se ha enviado correctamente';
					    
					}
			}

			mysqli_close($connect);
			
			return $res;
		}

	}