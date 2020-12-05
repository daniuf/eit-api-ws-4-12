<?php

$notas = simplexml_load_file('notas_v2.xml');

if (is_object($notas)) {

  foreach ($notas->note as $nota) {
    echo "<p>".$nota->to."</p>";
    echo "<p>".$nota->from."</p>";
    //var_dump($nota);
    //print_r($nota);
  }
  /**for ($i = 0; $i < count($notas->note); $i++) {
    //var_dump($notas->note[$i]);
    echo "<p>".$notas->note[$i]->to."</p>";
    echo "<p>".$notas->note[$i]->from."</p>";
  }**/

  //var_dump($notas);
  //print_r($notas);
} else {
  echo "No se pudo leer el XML";
}
