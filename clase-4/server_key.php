<?php

/**
 * Script que valida request de API utilizando un token/api key
 */


$key = '1234567890bgftcftfcxfvghj';

if ($_SERVER['HTTP_TOKEN'] == $key) {

   $input = json_decode(file_get_contents('php://input'));

   if ($input->email == 'daniuf@gmail.com') {

     http_response_code(201);
     $json_response = array('status' => 'User created', 'id' => uniqid());//uniqid seria el ID de DB asignado
     header("Content-Type: application/json");
     echo json_encode($json_response);

   } else {

    http_response_code(401);//401=Unauthorized User
    $json_response = array('status' => 'Unauthorized User');
    header("Content-Type: application/json");
    echo json_encode($json_response);
   }
} else {

  http_response_code(401);//401=Unauthorized User
  $json_response = array('status' => 'Unauthorized User');
  header("Content-Type: application/json");
  echo json_encode($json_response);

}
