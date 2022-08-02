<?php


require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';
require __DIR__ . '/functions.php';





$array = getEndpoint();
pprint($array, 'Endpoint');



$payload = [
    'iss' => 'http://example.org',
    'aud' => 'http://example.com',
    'iat' => 1356999524,
    'nbf' => 11
];

$jwt = generateJWT($payload);
$user = readJWT($jwt);
pprint($user, 'User');