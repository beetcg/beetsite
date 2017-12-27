<?php
	require_once "./src/app_api/modules/methods/common.php";
  session_start();

  $obj = new Methods();
  $res = $obj->logout();
	echo $res;
  if ($res == '1') {
    session_destroy();
		header("Location: http://comiczone.hol.es");
  } else {
		echo "Error en Log Out";
	}
