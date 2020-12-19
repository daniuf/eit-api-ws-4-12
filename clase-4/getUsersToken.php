<?php

require_once('api.php');

$key = '1234567890bgftcftfcxfvghj';

if ($_GET['token'] == $key) {

   $api = new api();
   $resultado = $api->getUsers();

   http_response_code(200);
   header("Content-Type: application/json");
   echo $resultado; 

} else {

  http_response_code(401);//401=Unauthorized User
  $json_response = array('status' => 'Unauthorized User');
  header("Content-Type: application/json");
  echo json_encode($json_response);

}
