<?php

define("WS", "http://www.thomas-bayer.com/axis2/services/BLZService");

$blz = $_GET['parametro'];

$xml = '<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://thomas-bayer.com/blz/"><SOAP-ENV:Body><ns1:getBank><ns1:blz>'.$blz.'</ns1:blz></ns1:getBank></SOAP-ENV:Body></SOAP-ENV:Envelope>';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, WS);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml; charset=utf-8',
					   'SOAPAction: ""')
		);

$response = curl_exec($ch);
//var_dump($response);

$xml_respuesta = str_replace(array('soapenv:', 'SOAP-ENV:', 'ns1:'), '', $response);
//var_dump($xml_respuesta);

$xml_final = simplexml_load_string($xml_respuesta);
var_dump($xml_final);

curl_close($ch);
