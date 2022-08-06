<?php

//
// preflight for CORS
// https://github.com/mikecao/flight/issues/425
//
if ('OPTIONS' === $_SERVER['REQUEST_METHOD']) {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: *');
    header('Access-Control-Allow-Headers: *');
    header('Access-Control-Max-Age: 1728000');
    die();
}

//
// load files
//
require __DIR__ . '/php/config.php';
require __DIR__ . '/php/functions.php';
require __DIR__ . '/php/pprint.php';

require __DIR__ . '/vendor/autoload.php';

//
// define global vars
//
$response = [];
$response['JSONoutput'] = true;
$response['status'] = 200;
$response['message'] = '';

if (isset($_GET['debug'])) {
    $response['JSONoutput'] = false;
}



//
// parse URL and create array with endpoint,value & ext_1
//
$url = getEndpoint();
$response['url'] = $url;
// pprint($url, 'Endpoint');


//
// load file for current endpoint
//
switch ($url['endpoint']) {
    //
    // special case for login, because we have no token
    //
    case 'login':
        require 'endpoints/login.php';
        break;
        exit;

        //
        // search for file in endpoints
        //
    default:
        if (file_exists('endpoints/'.$url['endpoint'].'.php')) {


            //
            // get params from json or POST
            //
            $request = parseRequest();
            $response['request'] = $request;
            // pprint($request);


            //
            // verify JWT from barier and get user properties
            //
            $jwt ="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdGFmZl9pZCI6OCwicm9sZSI6MCwicGVybWlzc2lvbiI6MH0.tzH7VLleNEIq2pJM6tuLs2M2icQoLqpTDqOhrjdMNYc";
            $user = readJWT($jwt);
            $response['user'] = $user;
            // pprint($user, 'User');
            // $payload = ['staff_id' => 8,'role' => 0,'permission' => 0];
            // pprint(generateJWT($payload));


            //
            // make database connection & load utiliti functions
            //
            RedBeanPHP\R::setup('sqlite:db/'.$conf['DB_filename']);
            require __DIR__ . '/php/functionsDB.php';

            //
            // switch between development & production mode
            //
            if ($conf['prod']) {
                RedBeanPHP\R::freeze(true);
            }

            //
            // debug shows redbean queries
            //
            if (isset($_GET['debug']) && $_GET['debug']==='rb') {
                RedBeanPHP\R::fancyDebug();
            }


            //
            // call endpointfile
            //
            require 'endpoints/'.$url['endpoint'].'.php';
            exit;
        }

        //
        // throw error if no endpoint found
        //
        else {
            echo "no such endpoint";
        }
        break;
}