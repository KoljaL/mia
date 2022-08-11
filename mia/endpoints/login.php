<?php

// secure file
if (!class_exists('RedBeanPHP\R')) {
    die('no direct loading allowed');
}
// get class
use RedBeanPHP\R as R;

// find staff in database by email
$staff  = R::findOne('staff', ' email = ?', [ $request['email']]);
if ($staff) {
    $staff = $staff->export();

    // verify password
    if (password_verify($request['password'], $staff['password'])) {
        $payload = [
            'staff_id' => $staff['id'],
            'role' => $staff['role'],
            'permission' => $staff['permission'],
            'avatar' => $staff['avatar'],
        ];
    }
}



/**
 * $jwt = generateJWT($payload)
 *
 * Generating a JWT token.
 */
$jwt = generateJWT($payload);

// echo $jwt;


if ($jwt) {
    $response['data'] = $jwt;
    returnJSON($response);
} else {
    $response['data'] = '';
    $response['status'] = 400;
    $response['message'] = 'no numeric customer_id';
    returnJSON($response);
}