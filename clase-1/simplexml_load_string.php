<?php

$xml = file_get_contents('nota.xml');
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
}
