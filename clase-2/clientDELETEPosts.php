<?php

/** 
 Cliente que actualiza un recurso POST en API de typicode 
 * Metodo PUT para actualizar un recurso 
*/

ini_set('date.timezone', 'America/Argentina/Buenos_Aires');
require_once('function.php');

define("URL", "https://jsonplaceholder.typicode.com/posts/1");
define("LOG_DIR", "logs/");

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, URL);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$json_response = curl_exec($ch);
$info = curl_getinfo($ch, CURLINFO_HTTP_CODE);

$mensaje = "Solicitando URL ".URL."||Method: DELETE||HTTP Response Status Code\t".$info;
loguear("a+", LOG_DIR."typicode_access.log", $mensaje);

if ($info == 200) {

  if ($json_response) {
    $json = json_decode($json_response);
    var_dump($json_response);
    loguear("a+", LOG_DIR."typicode_access.log", "JSON devuelto".var_export($json_response, true));
  }
} else {
  echo "Ha ocurrido un error";
  $mensaje = "Error al consumir URL ".URL."||HTTP Response Status Code\t".$info;
  loguear("a+", LOG_DIR."typicode_error.log", $mensaje);
  echo curl_error($ch);
}

curl_close($ch);
