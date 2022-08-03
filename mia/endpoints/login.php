<?php

echo "login";


$payload = [
    'iss' => 'http://example.org',
    'aud' => 'http://example.com',
    'iat' => 1356999524,
    'nbf' => 11
];

/**
 * $jwt = generateJWT($payload)
 *
 * Generating a JWT token.
 */
$jwt = generateJWT($payload);

echo $jwt;