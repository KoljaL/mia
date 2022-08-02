<?php


require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';
require __DIR__ . '/functions.php';





/**
 *  $endpoint = getEndpoint()
 *
 *  Calling the function `getEndpoint()` and assigning the return value to the variable ``.
 *
 */
$array = getEndpoint();
pprint($array, 'Endpoint');



$payload = [
    'iss' => 'http://example.org',
    'aud' => 'http://example.com',
    'iat' => 1356999524,
    'nbf' => 11
];

/**
 * $jwt = generateJWT()
 *
 * Generating a JWT token.
 */
$jwt = generateJWT($payload);

/**
 * $user = readJWT()
 *
 * Reading the JWT and returning the user object.
 */
$user = readJWT($jwt);
pprint($user, 'User');