<?php
/**
 Script que consume API de paises
 */

$paises = file_get_contents('http://eit.indianadev.biz/clase-2/paises.php');

if ($paises) {
  $json = json_decode($paises, true);
  var_dump($json);
}

