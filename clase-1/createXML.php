<?php

$xml = new simpleXMLElement("<libros></libros>");

$libro = $xml->addChild('libro');
$libro->addAttribute('isbn', '098765432123');
$libro->addChild('titulo', 'El secreto de sus ojos');
$libro->addChild('autor', 'Eduardo Sacheri');
$libro->addChild('anio_publicacion', 2008);
$libro->addAttribute('imagen_portada', "cover.jpg");

/**
$libro = $xml->addChild('libro');
$libro->addAttribute('isbn', null);
$libro->addChild('titulo', '1984');
$libro->addChild('autor', 'George Orwell');
$libro->addChild('anio_publicacion', null);
**/

header("Content-Type: text/xml");
echo $xml->asXML();
