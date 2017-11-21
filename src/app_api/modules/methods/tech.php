<?php
  use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	/**
	* This is the Methods Class
	*/
	class Methods {
		// try to Connect
		public function tryToConnect(){
			$obj = new connect();
			$connect = $obj->connection();
			$res = false;

			if (mysqli_ping($connect)) { $res = true; }
			mysqli_close($connect);
			
			return $res;
		}

		// If exist the User 
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

		// Create User
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

			  $obj = new Mailer();
			  $messageHtml = $obj->contentHtml($fname,$lname);
			  $messagePlain = $obj->contentPlain($fname,$lname);

				$mail = new PHPMailer(true);
				try {

			    //Server settings
			    $mail->isSMTP();
			    $mail->Host = 'smtp.gmail.com';
			    $mail->SMTPAuth = true;
			    $mail->Username = 'marco.jr1695@gmail.com';
			    $mail->Password = 'Marco1695';
			    $mail->SMTPSecure = 'tls';
    			$mail->Port = 587;

			    //Recipients
			    $mail->setFrom('marco.jr1695@gmail.com', 'Beet');
			    $mail->addAddress($email_s, $fname.' '.$lname);
			    $mail->isHTML(true);
			    $mail->Subject = 'Hi '.$fname.' - Confirmation Message';
			    $mail->Body = $messageHtml;
			    $mail->AltBody = $messagePlain;

			    $mail->send();
				} catch (Exception $e) {
				    echo 'Mailer Error: ' . $mail->ErrorInfo;
				}
			}

			mysqli_close($connect);
			
			return $res;
		}

	}