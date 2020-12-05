<?php

ini_set('date.timezone', 'America/Argentina/Buenos_Aires');

define("URL", 'http://www.geoplugin.net/xml.gp?ip=');

$date = new DateTime();
$format_date = $date->format('Y-m-d');

$url = URL.$_SERVER['REMOTE_ADDR'];
$xml = file_get_contents($url);
loguear("a+", "logs/".$format_date."-access_log", "Solicitando URL: ".$url);
$geo = simplexml_load_string($xml);

if (is_object($geo)) {

  var_dump($geo);
  //print_r($geo);
} else {
  echo "No se pudo leer el XML";
  loguear("a+", "logs/".$format_date."-error_log", "Error al conectarse a ".$url);
}

function loguear($modo, $nombre_archivo, $mensaje) {

  $date = new DateTime();
  $format_date = $date->format('Y-m-d H:i:s');

  $fp = fopen($nombre_archivo, $modo);
  fwrite($fp, "[".$format_date."]\t".$mensaje.PHP_EOL);
  fclose($fp);
}

