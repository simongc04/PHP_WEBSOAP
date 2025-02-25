<?php
$options = [
    'location' => 'http://localhost/soap-moodle-sepe/server/server.php',
    'uri' => 'http://example.com/centro',
    'trace' => true
];

$client = new SoapClient('../wsdl/centro.wsdl', $options);

$request = [
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

echo "Respuesta: " . $response['resultado'];
?>
