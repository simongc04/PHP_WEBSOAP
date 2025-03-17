<?php
$options = [
    'location' => 'http://localhost/PHP_WEBSOAP/server/server.php',
    'uri' => 'http://localhost/PHP_WEBSOAP/server',
    'trace' => true
];

$client = new SoapClient('../wsdl/centro.wsdl', $options);

$request = [
    'TOKEN' => '797ddf121fdbc5bf8f06f2668c24dbea', 
    'ID_CENTRO' => '12345',
    'NOMBRE_CENTRO' => 'Centro Ejemplo',
    'URL_PLATAFORMA' => 'https://moodle.ejemplo.com',
    'URL_SEGUIMIENTO' => 'https://moodle.ejemplo.com/seguimiento',
    'TELEFONO' => '123456789',
    'EMAIL' => 'info@centro.com',
    'ORIGEN_CENTRO' => 'Moodle',
    'CODIGO_CENTRO' => 'CF-001'
];

$response = $client->__soapCall('crearCentro', [$request]);

echo "Código: " . $response['codigo'] . "\n";
echo "Mensaje: " . $response['mensaje'] . "\n";
?>
