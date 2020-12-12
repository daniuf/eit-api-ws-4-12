<?php

/** 
 Cliente que consume API de https://estadisticasbcra.com/api/documentacion
*/

ini_set('date.timezone', 'America/Argentina/Buenos_Aires');
require_once('function.php');

define("WS", "https://api.estadisticasbcra.com");
define("TOKEN", "BEARER eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2MzkyNjI4ODgsInR5cGUiOiJleHRlcm5hbCIsInVzZXIiOiJkYW5pdWZAZ21haWwuY29tIn0.PcuzWBfLyqnFD2qq5BWVDkCUb6eIkYONXcm7dHhC_IUtTM9mvymHl4KVde3o4uPCPqVKu8-TcEugQ9CwDmcCE");
define("LOG_DIR", "logs/");

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, WS.'/usd_of');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: '.TOKEN));

$json = curl_exec($ch);
$info = curl_getinfo($ch, CURLINFO_HTTP_CODE);

$mensaje = "Solicitando URL ".WS."/usd_of...HTTP Response Status Code\t".$info;
loguear("a+", LOG_DIR."access.log", $mensaje);

if ($info == 200) {

  if ($json) {
    $json = json_decode($json);
    //var_dump($json);
    for ($i = 0; $i < count($json); $i++) {
      echo "<p>La cotizacion del ".$json[$i]->d."=".$json[$i]->v."</p>";
    }
  }
} else {
  echo "Ha ocurrido un error";
  $mensaje = "Error al consumir URL ".WS."/usd_of...HTTP Response Status Code\t".$info;
  loguear("a+", LOG_DIR."error.log", $mensaje);
  echo curl_error($ch);
}

curl_close($ch);
