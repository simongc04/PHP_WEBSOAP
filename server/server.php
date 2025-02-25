<?php
require_once 'centroService.php';

$options = [
    'uri' => 'http://localhost/PHP_WEBSOAP/server/server.php',
    'soap_version' => SOAP_1_2,
    'trace' => true
];

$server = new SoapServer(WSDL_URL, $options);
$server->setClass('CentroService');
$server->handle();
?>
