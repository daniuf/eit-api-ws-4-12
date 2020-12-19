<?php

require_once('api.php');

$api = new api();
$resultado = $api->getUsers();

http_response_code(200);
header("Content-Type: application/json");
echo $resultado; 

