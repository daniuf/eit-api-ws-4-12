<?php

require_once('api.php');

$key = '1234567890bgftcftfcxfvghj';

if ($_SERVER['HTTP_TOKEN'] == $key) {

   $id = $_GET['id'];
   $input = json_decode(file_get_contents('php://input'));

   if (is_object($input) && (is_numeric($id))) {

     $api = new api();
     $resultado = $api->updateUser($id);

     if ($resultado) {
       http_response_code(200);
       $json_response = array('status' => 'User updated');
       header("Content-Type: application/json");
       echo json_encode($json_response);
     }

    } else {

      http_response_code(400);//400=Bad Request
      $json_response = array('status' => 'Missing JSON');
      header("Content-Type: application/json");
      echo json_encode($json_response);
   }
} else {

  http_response_code(401);//401=Unauthorized User
  $json_response = array('status' => 'Unauthorized User');
  header("Content-Type: application/json");
  echo json_encode($json_response);

}



