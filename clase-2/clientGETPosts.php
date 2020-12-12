<?php

/** 
 Cliente que consume API de typicode 
 * Metodo GET para obtener todos los posts
*/

ini_set('date.timezone', 'America/Argentina/Buenos_Aires');
require_once('function.php');

define("URL", "https://jsonplaceholder.typicode.com/posts");
define("LOG_DIR", "logs/");

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, URL);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$json = curl_exec($ch);
$info = curl_getinfo($ch, CURLINFO_HTTP_CODE);

$mensaje = "Solicitando URL ".URL."||HTTP Response Status Code\t".$info;
loguear("a+", LOG_DIR."typicode_access.log", $mensaje);

if ($info == 200) {

  if ($json) {
    $json = json_decode($json);
    var_dump($json);
    loguear("a+", LOG_DIR."typicode_access.log", "JSON devuelto".var_export($json, true));
  }
} else {
  echo "Ha ocurrido un error";
  $mensaje = "Error al consumir URL ".URL."||HTTP Response Status Code\t".$info;
  loguear("a+", LOG_DIR."typicode_error.log", $mensaje);
  echo curl_error($ch);
}

curl_close($ch);
