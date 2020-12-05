<?php

ini_set('date.timezone', 'America/Argentina/Buenos_Aires');

define("URL", 'http://eit.indianadev.biz/clase-1/nota.xml');

$date = new DateTime();
$format_date = $date->format('Y-m-d');

$xml = file_get_contents(URL);
loguear("a+", "logs/".$format_date."-access_log", "Solicitando URL: ".URL);
$nota = simplexml_load_string($xml);

if (is_object($nota)) {

  echo "<h1>".$nota->heading."</h1>";
  echo "<h3>".$nota->body."</h3>";
  echo "<p>".$nota->to."</p>";
  echo "<p>".$nota->from."</p>";
  //var_dump($nota);
  //print_r($nota);
} else {
  echo "No se pudo leer el XML";
  loguear("a+", "logs/".$format_date."-error_log", "Error al conectarse a ".URL);
}

function loguear($modo, $nombre_archivo, $mensaje) {

  $date = new DateTime();
  $format_date = $date->format('Y-m-d H:i:s');

  $fp = fopen($nombre_archivo, $modo);
  fwrite($fp, "[".$format_date."]\t".$mensaje.PHP_EOL);
  fclose($fp);
}

