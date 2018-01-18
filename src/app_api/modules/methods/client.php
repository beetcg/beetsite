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

			$sql= "INSERT INTO client (__id, fname, lname, email, tlf, zip, salt, hash, created_at, update_at) VALUES ('$id','$fname','$lname','$email_s','$tlf','$zip','$salt','$hash','$date','$date')";

			if (mysqli_query($connect, $sql)) {

			  $res = true;

			  $obj = new Mailer();
			  $messageHtml = $obj->clientHtml($fname,$lname,$id,$salt);
			  $messagePlain = $obj->clientPlain($fname,$lname,$id,$salt);

				$mail = new PHPMailer(true);
				try {

			    //Server settings
			    $mail->isSMTP();
			    $mail->Host = 'smtp.gmail.com';
			    $mail->SMTPAuth = true;
			    $mail->Username = 'marco.montilla@beetcg.com';
			    $mail->Password = '';
			    $mail->SMTPSecure = 'tls';
    			$mail->Port = 587;

			    //Recipients
			    $mail->setFrom('no-reply@beetcg.com', 'Beet Community');
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

		// Check acount
		public function checkAcount($table, $id, $salt){
			$obj = new connect();
			$connect = $obj->connection();
			$res = 'not found';

			$sql= "SELECT * FROM $table WHERE __id='$id' AND salt='$salt'";
			$result = mysqli_query($connect, $sql);

			if (mysqli_num_rows($result) > 0) {
			  while($row = mysqli_fetch_assoc($result)) {
			    $res = $row;
			    break;
			  }
			}

			mysqli_close($connect);
			return $res;
		}

		// Confirm acount
		public function confirmAcount($table, $id, $salt){
			$obj = new connect();
			$connect = $obj->connection();
			$res = false;

			  date_default_timezone_set('America/Guatemala');
				$date = date("Y-m-d H:i:s", time());

			  $update = "
			  UPDATE $table
			  SET active= '1',
			  		update_at='$date'
			  WHERE __id='$id' AND salt='$salt';
			  ";

			  if (mysqli_query($connect, $update)) {
			  	$res = true;
			  }

			mysqli_close($connect);
			return $res;
		}

		// Recovery Password
		public function recovery($table, $email){
      $obj = new connect();
			$connect = $obj->connection();
			$res = false;

			$email_lower = strtolower($email);
			$email_s = filter_var($email_lower, FILTER_SANITIZE_EMAIL);

      $sql= "SELECT * FROM $table WHERE email='$email_s'";
			$result = mysqli_query($connect, $sql);

			if (mysqli_num_rows($result) > 0) {
			  while($row = mysqli_fetch_assoc($result)) {
			    $data = $row;
			    break;
			  }
			}
			mysqli_close($connect);

      if ($data) {
        $obj = new Mailer();
        $messageHtml = $obj->recoveryClientHtml($data['fname'],$data['lname'],$data['__id'],$data['salt']);
        $messagePlain = $obj->recoveryClientPlain($data['fname'],$data['lname'],$data['__id'],$data['salt']);

        $mail = new PHPMailer(true);
        try {

          //Server settings
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'marco.montilla@beetcg.com';
          $mail->Password = '';
          $mail->SMTPSecure = 'tls';
          $mail->Port = 587;

          //Recipients
          $mail->setFrom('no-reply@beetcg.com', 'Beet Community');
          $mail->addAddress($email_s, $data['fname'] .' '. $data['lname']);
          $mail->isHTML(true);
          $mail->Subject = 'Hi '.$data['fname'].' - Recovery Password';
          $mail->Body = $messageHtml;
          $mail->AltBody = $messagePlain;

          $mail->send();

          $res = true;
        } catch (Exception $e) {
          $res = false;
        }
      } else {
        $res = false;
      }

      return $res;
	  }

    // Change Password
    public function new_pass($table, $pass, $id, $salt){
      $obj = new connect();
			$connect = $obj->connection();
			$res = false;

			  date_default_timezone_set('America/Guatemala');
				$date = date("Y-m-d H:i:s", time());
        $new_hash = password_hash($pass, PASSWORD_BCRYPT);

			  $update = "
			  UPDATE $table
			  SET hash= '$new_hash',
			  		update_at='$date'
			  WHERE __id='$id' AND salt='$salt';
			  ";

			  if (mysqli_query($connect, $update)) {
			  	$res = true;
			  }

			mysqli_close($connect);
			return $res;
    }

    // Log-in
    public function login($table, $email, $pass){
      $obj = new connect();
      $connect = $obj->connection();
      $res = 'not found';
      $email_lower = strtolower($email);
			$email_s = filter_var($email_lower, FILTER_SANITIZE_EMAIL);

      $sql= "SELECT * FROM $table WHERE email='$email_s'";
			$result = mysqli_query($connect, $sql);

			if (mysqli_num_rows($result) > 0) {
			  while($row = mysqli_fetch_assoc($result)) {
			    $res = $row;
			    break;
			  }
			}
			mysqli_close($connect);

      if ($res) {
        if ( password_verify($pass, $res['hash']) ) {
          return $row;
        }
      } else {
        return $res;
      }
    }
  }
