<?php
	require_once "./../../../../../vendor/autoload.php";
	require_once "./../../../config/connection.php";
	require_once "./../../methods/mail/mail.php";
	require_once "./../../methods/tech.php";

	$res = [];
	
	$obj = new Methods();
	$resp = $obj->tryToConnect();
	$res['connection'] = $resp;

	$id = $_POST["id"];
	$salt = $_POST["salt"];

	$res['id'] = $id;
	$res['salt'] = $salt;

	if(!empty($_POST)){
		$elements = $_POST['subcat'];

		if(isset($elements)){
			if($elements!=""){
				// Convert from String to Array
				$subcat = explode(',', $elements);
				$res['data'] = $subcat;

				$file_name = $_FILES['id_card']['name'];
				$file_type = $_FILES['id_card']['type'];
				$file_size = $_FILES['id_card']['size'];
				$file_path = '/home/u420574110/public_html/src/app_api/ids/';

				if ($file_type == 'image/jpeg'){
					$new_name = $id.'.jpeg';
				}
				if ($file_type == 'image/jpg'){
					$new_name = $id.'.jpg';
				}
				if ($file_type == 'image/gif'){
					$new_name = $id.'.gif';
				}
				if ($file_type == 'image/png'){
					$new_name = $id.'.png';
				}

				$final_route = $file_path.$new_name;

				if ($file_size<= 3000000) {
					$res['rulessize'] = true; 

					if ($file_type == 'image/jpeg' || $file_type == 'image/jpg' || $file_type == 'image/gif' || $file_type == 'image/png') {
						$res['rulestype'] = true;

						if (move_uploaded_file($_FILES['id_card']['tmp_name'], $final_route)) {
							$res['picUpload'] = true;
						}
					}
				}

				// Save the subcategory
				$count = 0;
				for ($i=0; $i < count($subcat); $i++) {
					$obj = new Methods();
					$resp = $obj->saveSubcategory($subcat[$i], $id);
					$res['trigger'] = $resp;

					if ($res['trigger']) {
						$count++;
					}
				}

				if ($count > 0) {
					$res['subcategory'] = true;
				} else {
					$res['subcategory'] = false;
				}

				if ($res['picUpload'] && $res['subcategory']) {
					$obj = new Methods();
					$resp = $obj->activateAcount('tech', $id, $salt, $final_route);
					$res['active'] = $resp;
				}

				for ($i=0; $i < count($subcat); $i++) { 
					$res[$i] = 'You had selected the option N° '.$subcat[$i];
				}
				
			} else {
		    $res['empty'] = true;
			}
		}else {
			$res['empty'] = true;
		}
	} else {
		$res['empty'] = true;
	}

	echo json_encode($res);
