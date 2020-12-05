<?php

$notas = new simpleXMLElement('nota.xml', NULL, true);

if (is_object($notas)) {

  echo "<p>".$notas->to."</p>";
  echo "<p>".$notas->from."</p>";
} else {
  echo "No se pudo leer el XML";
}
