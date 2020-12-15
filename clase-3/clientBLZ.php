<?php

define("WS", "http://www.thomas-bayer.com/axis2/services/BLZService");

/**
 Operacion disponible: getBank
 Input
  * blz => string
*/

try {

  $options = array(
		'soap_version' => SOAP_1_1,
		'trace' => true
	     );

  $client = new SoapClient(WS."?wsdl", $options);
  /**
   Opcion 1 enviando array como input 
   */
   $response = $client->getBank(array('blz' => "54030011"));
  /**
   Opcion 2
  $input['blz'] = "54030011";
  $response = $client->getBank($input);
  */
  /** 
   Opcion 3 
  $response = $client->__soapCall("getBank", array('getBank' => array('blz' => "54030011")));

  var_dump($response);
  */

  /**
  $functions = $client->__getFunctions();
  var_dump($functions);
  **/

  //echo "Details->bezeichnung ".$response->details->bezeichnung;
  echo $client->__getLastRequestHeaders().PHP_EOL;
  echo $client->__getLastRequest().PHP_EOL;
  echo $client->__getLastResponseHeaders().PHP_EOL;
  echo $client->__getLastResponse().PHP_EOL;
} catch (Exception $e) {

  print $e->getMessage();
}
