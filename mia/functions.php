<?php



/**
 * Name getEndpoint()
 *
 * It takes the URL and returns an array with the endpoint and value
 *
 * @return An array with the endpoint, value, and value_1.
 */
function getEndpoint()
{
    $uri          = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri          = explode('/', $uri);
    $api          = array_search('mia', $uri);
    $array['endpoint'] = (isset($uri[$api + 1])) ? $uri[$api + 1] : '';
    $array['value']    = (isset($uri[$api + 2])) ? $uri[$api + 2] : '';
    $array['value_1']    = (isset($uri[$api + 3])) ? $uri[$api + 3] : '';
    return $array;
}


// JWT

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

/**
 * Name generateJWT()
 *
 * It generates a JWT token.
 *
 * @param payload The payload is the data that you want to send to the client.
 *
 * @return A JWT token
 */
function generateJWT($payload)
{
    global $conf;
    return JWT::encode($payload, $conf['JWTkey'], 'HS256');
}



/**
 * Name readJWT()
 *
 * It takes a JWT and returns an array of the data in the JWT
 *
 * @param jwt The JWT to decode.
 *
 * @return An array of the decoded JWT.
 */
function readJWT($jwt)
{
    global $conf;
    $decoded = JWT::decode($jwt, new Key($conf['JWTkey'], 'HS256'));
    return (array) $decoded;
}


///////////////////////////   HELPER    /////////////////////////////


/**
 * Name pprint()
 *
 * The function takes two arguments, the first is the data to be printed, the second is an optional
 * name for the data
 *
 * @param data The data to be printed.
 * @param name The name of the variable you're printing.
 */
function pprint($data, $name = '')
{
    print '<div style="width:max-content; background:#ccc;padding-inline:.25em;margin:.5em;">';
    print '<h4 style=background:#aaa;>'.$name.'</h4> ';
    print "<pre>";
    // print_r($data);
    var_export($data);
    print "</pre>";
    print "</div>";
}



/**
 * Name console
 *
 * It takes an object, converts it to JSON, and prints it to the console
 *
 * @param obj The object to be logged.
 */
function console($obj)
{
    $js = json_encode($obj);
    print_r('<script>console.log('.$js.')</script>');
}