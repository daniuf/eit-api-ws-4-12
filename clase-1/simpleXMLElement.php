<?php

$xml = file_get_contents('nota.xml');
$notas = new simpleXMLElement($xml);

if (is_object($notas)) {

  echo "<p>".$notas->to."</p>";
  echo "<p>".$notas->from."</p>";
} else {
  echo "No se pudo leer el XML";
}
