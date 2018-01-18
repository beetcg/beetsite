<?php

session_start();
session_unset();

require_once "./src/app_api/config/connection.php";
require_once "./src/app_api/modules/methods/client.php";

$id = $_GET["x"];
$salt = $_GET["y"];

$obj = new Methods();
$resp = $obj->checkAcount('client',$id, $salt);

if ($resp['active'] == '1') {
  header('Location: http://comiczone.hol.es/login.php');
} else {
  $obj = new Methods();
  $resp = $obj->confirmAcount('client',$id, $salt);
  if ($resp) {
    echo "Ativated Acount";
    sleep(5);
    header('Location: http://comiczone.hol.es/login.php');
  } else {
    echo 'error';
  }

}
