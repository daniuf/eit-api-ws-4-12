<?php

define("WS", "http://eit.indianadev.biz/clase-3/soapServer.php");

try {

  $options = array(
		  'location' => WS,
		  'uri' => WS
		);

  $client = new soapClient(null, $options);
  //$response = $client->holaMundo();
  //$response = $client->holaMundov2("Pepito");
  //var_dump($response);

} catch (Exception $e) {
  print "Error: ".$e->getMessage();
}
