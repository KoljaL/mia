<?php

// timemeasurerment
// error logging switchable

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/php/config.php';
require __DIR__ . '/php/functions.php';


//
// parse URL and create array with endpoint,value & value_1
//
$url = getEndpoint();
// pprint($url, 'Endpoint');


//
// get endpointfile
//
switch ($url['endpoint']) {

    // special case for login, because we have no token
    case 'login':
        require 'endpoints/login.php';
        exit;
        break;

        // search for file in endpoints
    default:
        if (file_exists('endpoints/'.$url['endpoint'].'.php')) {

            // verify JWT from barier and get user properties
            $jwt ='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vZXhhbXBsZS5vcmciLCJhdWQiOiJodHRwOi8vZXhhbXBsZS5jb20iLCJpYXQiOjEzNTY5OTk1MjQsIm5iZiI6MTF9.SXaiJ9tLgtY9DG-uECFvsTecew780YqFnWXRJpALZD8';
            $user = readJWT($jwt);
            pprint($user, 'User');

            // call endpointfile
            require 'endpoints/'.$url['endpoint'].'.php';
            exit;
        }

        // throw error if no endpoint found
        else {
            echo "no such endpoint";
        }
        break;
}
