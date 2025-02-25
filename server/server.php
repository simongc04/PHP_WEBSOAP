<?php
require_once 'CentroService.php';

$options = [
    'uri' => 'http://localhost/soap-moodle-sepe/server/server.php',
    'soap_version' => SOAP_1_2,
    'trace' => true
];

$server = new SoapServer(WSDL_URL, $options);
$server->setClass('CentroService');
$server->handle();
?>
