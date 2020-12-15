<?php

class Servidor {

  public function __construct() {}

  public function holaMundo() {
	return "Hola mundo";
  }

  public function holaMundov2($parametro) {
  	return "Hola mundo, $parametro";
  }

  public function createUser($params) {

  }
}

$options = array(
		'uri' => 'http://eit.indianadev.biz/clase-3/soapServer.php'
	      );

$soapserver = new SoapServer(null, $options);
$soapserver->setClass('Servidor');
$soapserver->handle();
