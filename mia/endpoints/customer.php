<?php

// secure file
if (!class_exists('RedBeanPHP\R')) {
    die('no direct loading allowed');
}
// get class
use RedBeanPHP\R as R;

/**
 * if no customer_id this endpoint will return a list of all customer from the current staff
 * with a customer_id it will return the data of this customer
 *
 * @param arrays $url, $user, $response
 *
 * @return JSON with customerdata
 */

if (!isset($url['value'])) {
    $staff_id =   $user['staff_id'];
    $allCustomer = R::getAll('SELECT * FROM customer WHERE staff_id = ?', [$staff_id]);

    // pprint($allCustomer);

    // if no customers found return to frontend
    if (empty($allCustomer)) {
        $response['data'] = '';
        $response['message'] = 'no customer found';
        returnJSON($response);
    }

    // remove some keys
    foreach ($allCustomer as &$customer) {
        unset($customer['password']);
    }

    // ad data to response
    $response['data'] = $allCustomer;

    // return data to frontend
    returnJSON($response);
}


if ('' !== $url['value']) {
    $response['data'] = getCustomer($url['value']);
    returnJSON($response);
}





function getCustomer($id)
{
    $customer = R::load('customer', $id);
    $data = $customer->export();
    unset($data['password']);
    return $data;
}