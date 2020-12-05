<?php

$xml = file_get_contents('http://eit.indianadev.biz/clase-1/createXML.php');
$libros = simplexml_load_string($xml);

if (is_object($libros)) {

  $atributos = $libros->libro->attributes();
  foreach($atributos as $key => $value) {
    echo $key."=".$value."<br/>";
  }
  //var_dump($atributos);
  //print_r($libros);
} else {
  echo "No se pudo leer el XML";
}
