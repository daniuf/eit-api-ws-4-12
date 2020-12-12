<?php

function loguear($modo, $nombre_archivo, $mensaje) {

  $date = new DateTime();
  $format_date = $date->format('Y-m-d H:i:s');

  $fp = fopen($nombre_archivo, $modo);
  fwrite($fp, "[".$format_date."]\t".$mensaje.PHP_EOL);
  fclose($fp);
}
