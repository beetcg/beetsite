<?php

	/**
	*This is the Mailer Content class
	*/
	class Mailer {
		// Email HTML (Technician)
		public function techHtml($fname,$lname,$id,$salt){
			$message  = '<!DOCTYPE html>';
			$message .= '<html lang="en">';
			$message .= '<head>';
			$message .= '	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
			$message .= '	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">';
			$message .= '</head>';
			$message .= '<html>';
			$message .= '<body style="font-family:Verdana, Geneva, sans-serif;color:black;">';
			$message .= '	<table align="center" style="border:1px solid #fff;max-width:700px;">';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="width:100%;text-align:center;vertical-align:middle">';
			$message .= '				<img style="width:100%" src="http://comiczone.hol.es/src/assets/img/banner-tech.jpg">';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td><br><br></td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="padding-left:30px;padding-right:30px;"><p style="font-size:1.5rem;">';
			$message .= '				HOLA '.strtoupper($fname).'!';
			$message .= '			</p></td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="padding-left:30px;padding-right:30px;">';
			$message .= '				<p style="font-size:1rem;">	';
			$message .= '					We are so happy to receive your subscription, to complete it you need to fill in some ';
			$message .= '					important information, by pressing the following button you will be redirected.';
			$message .= '				</p>';
			$message .= '				<br>';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" align="center" style="text-align:center;padding-left:30px;padding-right:30px;">';
			$message .= '				<a href="http://comiczone.hol.es/confirmation.php?x='.$id.'&y='.$salt.'"';
			$message .= '				style="text-align: center;white-space: nowrap;vertical-align: middle;font-size: 1rem;';
			$message .= '				line-height: 1.5;border: 1px solid #840037;padding: 0.375rem 0.75rem;cursor:pointer;color:#840037;';
			$message .= '				text-decoration:none;';
			$message .= '				border-radius: 0.25rem;transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">';
			$message .= '					Continue Here!';
			$message .= '				</a>';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="padding-left:30px;padding-right:30px;">';
			$message .= '				<p style="font-size:1rem;">';
			$message .= '					<br><br>	';
			$message .= '					Thanks for enjoy to the Beet Communitiy!';
			$message .= '					<br><br>';
			$message .= '					Beet Support.';
			$message .= '				</p>';
			$message .= '				<br>';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td>';
			$message .= '				<hr>';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '	</table>';
			$message .= '</body>';
			$message .= '</html>';

			return $message;
		}

		// Email Plain Text (Technician)
		public function techPlain($fname,$lname,$id,$salt){

			$message  = "Hola ".$fname." ".$lname."";
			$message .= "\n";
			$message .= "Por favor, confirma tu correo electrónico haciendo clic en el link de abajo. ";
			$message .= "Serás dirigido a la página de verificación de correo.";
			$message .= "\n";
			$message .= "http://comiczone.hol.es/confirmation.php?x=".$id."&y=".$salt;
			$message .= "\n";
			$message .= "Gracias por unirte a la comunidad Beet!";
			$message .= "Soporte Beet.";

			return $message;
		}

		// Recovery Tech HTML (Technician)
		public function recoveryTechHtml($fname,$lname,$id,$salt){
			$message  = '<!DOCTYPE html>';
			$message .= '<html lang="en">';
			$message .= '<head>';
			$message .= '	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
			$message .= '	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">';
			$message .= '</head>';
			$message .= '<html>';
			$message .= '<body style="font-family:Verdana, Geneva, sans-serif;color:black;">';
			$message .= '	<table align="center" style="border:1px solid #fff;max-width:700px;">';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="width:100%;text-align:center;vertical-align:middle">';
			$message .= '				<img style="width:100%" src="http://comiczone.hol.es/src/assets/img/banner-tech.jpg">';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td><br><br></td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="padding-left:30px;padding-right:30px;"><p style="font-size:1.5rem;">';
			$message .= '				HOLA '.strtoupper($fname).'!';
			$message .= '			</p></td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="padding-left:30px;padding-right:30px;">';
			$message .= '				<p style="font-size:1rem;">	';
			$message .= '					<b>Recovery Tech Pass</b> ';
			$message .= '				</p>';
			$message .= '				<br>';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" align="center" style="text-align:center;padding-left:30px;padding-right:30px;">';
			$message .= '				<a href="http://comiczone.hol.es/recovery.php?x='.$id.'&y='.$salt.'&t=tech"';
			$message .= '				style="text-align: center;white-space: nowrap;vertical-align: middle;font-size: 1rem;';
			$message .= '				line-height: 1.5;border: 1px solid #840037;padding: 0.375rem 0.75rem;cursor:pointer;color:#840037;';
			$message .= '				text-decoration:none;';
			$message .= '				border-radius: 0.25rem;transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">';
			$message .= '					Continue Here!';
			$message .= '				</a>';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="padding-left:30px;padding-right:30px;">';
			$message .= '				<p style="font-size:1rem;">';
			$message .= '					<br><br>	';
			$message .= '					Thanks for enjoy to the Beet Communitiy!';
			$message .= '					<br><br>';
			$message .= '					Beet Support.';
			$message .= '				</p>';
			$message .= '				<br>';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td>';
			$message .= '				<hr>';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '	</table>';
			$message .= '</body>';
			$message .= '</html>';

			return $message;
		}

		// Recovery Tech Text (Technician)
		public function recoveryTechPlain($fname,$lname,$id,$salt){

			$message  = "Hola ".$fname." ".$lname."";
			$message .= "\n";
			$message .= "Recovery Password Tech";
			$message .= "\n";
			$message .= "http://comiczone.hol.es/recovery.php?x=".$id."&y=".$salt."&t=tech";
			$message .= "\n";
			$message .= "Thanks for enjoy to the Beet Communitiy!";
			$message .= "Beet Support.";

			return $message;
		}

		// Success Recovery Tech HTML
		public function techSuccessRecoveryHtml($fname,$lname,$id,$salt){
			$message  = '<!DOCTYPE html>';
			$message .= '<html lang="en">';
			$message .= '<head>';
			$message .= '	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
			$message .= '	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">';
			$message .= '</head>';
			$message .= '<html>';
			$message .= '<body style="font-family:Verdana, Geneva, sans-serif;color:black;">';
			$message .= '	<table align="center" style="border:1px solid #fff;max-width:700px;">';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="width:100%;text-align:center;vertical-align:middle">';
			$message .= '				<img style="width:100%" src="http://comiczone.hol.es/src/assets/img/banner-tech.jpg">';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td><br><br></td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="padding-left:30px;padding-right:30px;"><p style="font-size:1.5rem;">';
			$message .= '				HOLA '.strtoupper($fname).'!';
			$message .= '			</p></td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="padding-left:30px;padding-right:30px;">';
			$message .= '				<p style="font-size:1rem;">	';
			$message .= '					<b>Your Password has been changed (Tech)</b> ';
			$message .= '				</p>';
			$message .= '				<br>';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="padding-left:30px;padding-right:30px;">';
			$message .= '				<p style="font-size:1rem;">';
			$message .= '					<br><br>	';
			$message .= '					Thanks for enjoy to the Beet Communitiy!';
			$message .= '					<br><br>';
			$message .= '					Beet Support.';
			$message .= '				</p>';
			$message .= '				<br>';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td>';
			$message .= '				<hr>';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '	</table>';
			$message .= '</body>';
			$message .= '</html>';

			return $message;
		}

		// Recovery tech Text (Technician)
		public function techSuccessRecoveryPlain($fname,$lname,$id,$salt){

			$message  = "Hola ".$fname." ".$lname."";
			$message .= "\n";
			$message .= "Your Password has been changed (tech)";
			$message .= "\n";
			$message .= "Thanks for enjoy to the Beet Communitiy!";
			$message .= "Beet Support.";

			return $message;
		}


		// Email HTML (Client)
		public function clientHtml($fname,$lname,$id,$salt){
			$message  = '<!DOCTYPE html>';
			$message .= '<html lang="en">';
			$message .= '<head>';
			$message .= '	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
			$message .= '	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">';
			$message .= '</head>';
			$message .= '<html>';
			$message .= '<body style="font-family:Verdana, Geneva, sans-serif;color:black;">';
			$message .= '	<table align="center" style="border:1px solid #fff;max-width:700px;">';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="width:100%;text-align:center;vertical-align:middle">';
			$message .= '				<img style="width:100%" src="http://comiczone.hol.es/src/assets/img/banner-tech.jpg">';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td><br><br></td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="padding-left:30px;padding-right:30px;"><p style="font-size:1.5rem;">';
			$message .= '				HOLA '.strtoupper($fname).'!';
			$message .= '			</p></td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="padding-left:30px;padding-right:30px;">';
			$message .= '				<p style="font-size:1rem;">	';
			$message .= '					<b>Client Acount Confirmation</b>';
			$message .= '				</p>';
			$message .= '				<br>';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" align="center" style="text-align:center;padding-left:30px;padding-right:30px;">';
			$message .= '				<a href="http://comiczone.hol.es/active.php?x='.$id.'&y='.$salt.'"';
			$message .= '				style="text-align: center;white-space: nowrap;vertical-align: middle;font-size: 1rem;';
			$message .= '				line-height: 1.5;border: 1px solid #840037;padding: 0.375rem 0.75rem;cursor:pointer;color:#840037;';
			$message .= '				text-decoration:none;';
			$message .= '				border-radius: 0.25rem;transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">';
			$message .= '					Continue Here!';
			$message .= '				</a>';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="padding-left:30px;padding-right:30px;">';
			$message .= '				<p style="font-size:1rem;">';
			$message .= '					<br><br>	';
			$message .= '					Thanks for enjoy to the Beet Communitiy!';
			$message .= '					<br><br>';
			$message .= '					Beet Support.';
			$message .= '				</p>';
			$message .= '				<br>';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td>';
			$message .= '				<hr>';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '	</table>';
			$message .= '</body>';
			$message .= '</html>';

			return $message;
		}

		// Email Plain Text (Client)
		public function clientPlain($fname,$lname,$id,$salt){

			$message  = "Hola ".$fname." ".$lname."";
			$message .= "\n";
			$message .= "Client Acount Confirmation";
			$message .= "\n";
			$message .= "http://comiczone.hol.es/active.php?x=".$id."&y=".$salt;
			$message .= "\n";
			$message .= "Thanks for enjoy to the Beet Communitiy!";
			$message .= "Beet Support.";

			return $message;
		}

		// Recovery Client HTML (Technician)
		public function recoveryClientHtml($fname,$lname,$id,$salt){
			$message  = '<!DOCTYPE html>';
			$message .= '<html lang="en">';
			$message .= '<head>';
			$message .= '	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
			$message .= '	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">';
			$message .= '</head>';
			$message .= '<html>';
			$message .= '<body style="font-family:Verdana, Geneva, sans-serif;color:black;">';
			$message .= '	<table align="center" style="border:1px solid #fff;max-width:700px;">';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="width:100%;text-align:center;vertical-align:middle">';
			$message .= '				<img style="width:100%" src="http://comiczone.hol.es/src/assets/img/banner-tech.jpg">';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td><br><br></td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="padding-left:30px;padding-right:30px;"><p style="font-size:1.5rem;">';
			$message .= '				HOLA '.strtoupper($fname).'!';
			$message .= '			</p></td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="padding-left:30px;padding-right:30px;">';
			$message .= '				<p style="font-size:1rem;">	';
			$message .= '					<b>Recovery Password Client </b>';
			$message .= '				</p>';
			$message .= '				<br>';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" align="center" style="text-align:center;padding-left:30px;padding-right:30px;">';
			$message .= '				<a href="http://comiczone.hol.es/recovery.php?x='.$id.'&y='.$salt.'&t=client"';
			$message .= '				style="text-align: center;white-space: nowrap;vertical-align: middle;font-size: 1rem;';
			$message .= '				line-height: 1.5;border: 1px solid #840037;padding: 0.375rem 0.75rem;cursor:pointer;color:#840037;';
			$message .= '				text-decoration:none;';
			$message .= '				border-radius: 0.25rem;transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">';
			$message .= '					Continue Here!';
			$message .= '				</a>';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="padding-left:30px;padding-right:30px;">';
			$message .= '				<p style="font-size:1rem;">';
			$message .= '					<br><br>	';
			$message .= '					Thanks for enjoy to the Beet Communitiy!';
			$message .= '					<br><br>';
			$message .= '					Beet Support.';
			$message .= '				</p>';
			$message .= '				<br>';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td>';
			$message .= '				<hr>';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '	</table>';
			$message .= '</body>';
			$message .= '</html>';

			return $message;
		}

		// Recovery Client Text (Technician)
		public function recoveryClientPlain($fname,$lname,$id,$salt){

			$message  = "Hola ".$fname." ".$lname."";
			$message .= "\n";
			$message .= "Recovery Password Client";
			$message .= "\n";
			$message .= "http://comiczone.hol.es/recovery.php?x=".$id."&y=".$salt."&t=tech";
			$message .= "\n";
			$message .= "Thanks for enjoy to the Beet Communitiy!";
			$message .= "Beet Support.";

			return $message;
		}

		// Success Recovery Client HTML
		public function clientSuccessRecoveryHtml($fname,$lname,$id,$salt){
			$message  = '<!DOCTYPE html>';
			$message .= '<html lang="en">';
			$message .= '<head>';
			$message .= '	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
			$message .= '	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">';
			$message .= '</head>';
			$message .= '<html>';
			$message .= '<body style="font-family:Verdana, Geneva, sans-serif;color:black;">';
			$message .= '	<table align="center" style="border:1px solid #fff;max-width:700px;">';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="width:100%;text-align:center;vertical-align:middle">';
			$message .= '				<img style="width:100%" src="http://comiczone.hol.es/src/assets/img/banner-tech.jpg">';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td><br><br></td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="padding-left:30px;padding-right:30px;"><p style="font-size:1.5rem;">';
			$message .= '				HOLA '.strtoupper($fname).'!';
			$message .= '			</p></td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="padding-left:30px;padding-right:30px;">';
			$message .= '				<p style="font-size:1rem;">	';
			$message .= '					<b>Your Password has been changed (Client)</b> ';
			$message .= '				</p>';
			$message .= '				<br>';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td colspan="5" style="padding-left:30px;padding-right:30px;">';
			$message .= '				<p style="font-size:1rem;">';
			$message .= '					<br><br>	';
			$message .= '					Thanks for enjoy to the Beet Communitiy!';
			$message .= '					<br><br>';
			$message .= '					Beet Support.';
			$message .= '				</p>';
			$message .= '				<br>';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '		<tr>';
			$message .= '			<td>';
			$message .= '				<hr>';
			$message .= '			</td>';
			$message .= '		</tr>';
			$message .= '	</table>';
			$message .= '</body>';
			$message .= '</html>';

			return $message;
		}

		// Recovery Client Text (Technician)
		public function clientSuccessRecoveryPlain($fname,$lname,$id,$salt){

			$message  = "Hola ".$fname." ".$lname."";
			$message .= "\n";
			$message .= "Your Password has been changed (Client)";
			$message .= "\n";
			$message .= "Thanks for enjoy to the Beet Communitiy!";
			$message .= "Beet Support.";

			return $message;
		}

	}
