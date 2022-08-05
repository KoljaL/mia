<?php



//
// Error handeling
//

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set("log_errors", 1);
if (is_file('./error.log')) {
    unlink('./error.log');
}
ini_set("error_log", "./error.log");
$start = microtime(true);


/**
 * getEndpoint()
*
* It takes the URL and returns an array with the endpoint and value
*
* @return array with the endpoint, value, and ext_1.
*/
function getEndpoint()
{
    $uri               = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri               = explode('/', $uri);
    $api               = array_search('mia', $uri);
    // pprint($uri);

    $array = array_slice($uri, $api+1);
    $array = replace_key($array, 0, 'endpoint');
    $array = replace_key($array, 1, 'value');
    $array['method'] = $_SERVER['REQUEST_METHOD'];
    // pprint($array);

    // $array['endpoint'] = (isset($uri[$api + 1])) ? $uri[$api + 1] : 'login';
    // $array['value']    = (isset($uri[$api + 2])) ? $uri[$api + 2] : '';
    // $array['ext_1']  = (isset($uri[$api + 3])) ? $uri[$api + 3] : '';
    // $array['ext_2']  = (isset($uri[$api + 4])) ? $uri[$api + 4] : '';
    // $array['ext_3']  = (isset($uri[$api + 5])) ? $uri[$api + 5] : '';


    return $array;
}

/**
 * parseRequest()
 *
 * It takes the request body and returns an associative array of the request parameters
 *
 * @return array the request.
 */
function parseRequest()
{
    $request = json_decode(file_get_contents('php://input'), true);
    if ($request) {
        $keys = preg_replace('/[^a-z0-9_]+/i', '', array_keys($request));
    } else {
        $request = $_POST;
    }
    return $request;
}



//
// JWT namespace
//
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

/**
 * generateJWT($payload)
 *
 * It generates a JWT token.
 *
 * @param payload The payload is the data that you want to send to the client.
 *
 * @return string A JWT token
 */
function generateJWT($payload)
{
    global $conf;
    return JWT::encode($payload, $conf['JWTkey'], 'HS256');
}



/**
 * readJWT($jwt)
 *
 * It takes a JWT and returns an array of the data in the JWT
 *
 * @param jwt The JWT to decode.
 *
 * @return array of the decoded JWT.
 */
function readJWT($jwt)
{
    global $conf;
    $TOKEN = JWT::decode($jwt, new Key($conf['JWTkey'], 'HS256'));
    $TOKEN     = json_decode(json_encode($TOKEN), true);
    // $user_role = $TOKEN['role'];
    // $user_id   = $TOKEN['id'];
    // $user_name = $TOKEN['username'];
    return (array) $TOKEN;
}




/**
 * replace_key($arr, $oldkey, $newkey)
 *
 * It takes an array, a key to replace, and a new key to replace it with.
 *
 * @param arr The array to be modified
 * @param oldkey The key you want to replace
 * @param newkey The new key you want to replace the old key with.
 *
 * @return array with the key replaced.
 */
function replace_key($arr, $oldkey, $newkey)
{
    if (array_key_exists($oldkey, $arr)) {
        $keys = array_keys($arr);
        $keys[array_search($oldkey, $keys)] = $newkey;
        return array_combine($keys, $arr);
    }
    return $arr;
}


///////////////////////////   HELPER    /////////////////////////////

/**
 * pprint($data, $name)
 *
 * The function takes two arguments, the first is the data to be printed, the second is an optional
 * name for the data
 *
 * @param data The data to be printed.
 * @param name The name of the variable you're printing.
*/
// function pprint($data, $name = '')
// {
//     $bt     = debug_backtrace();
//     $caller = array_shift($bt);

//     if ('' ===$name) {
//         $name = 'pprint';
//     }

//     print '<div style="width:max-content; background:#ccc;margin:0em; border-radius:5px;">';
//     print '<h4 style="background:#aaa; margin-bottom:-1em; padding-top:.3em;padding-left:.25em; border-top-right-radius:5px;border-top-left-radius:5px;"> '.$name;
//     print '<span style="padding-right:.5em; float:right;">'.basename($caller['file']).':'.$caller['line'].'</span></h4> ';
//     print '<pre style="padding:.25em;">';
//     // print_r($data);
//     // var_dump($data);
//     var_export($data);
//     print "</pre>";
//     print "</div>";
// }


/**
 * console($obj)
 *
 * It takes an object, converts it to JSON, and prints it to the console
 *
 * @param obj The object to be logged.
 */
function console($obj)
{
    print_r('<script>console.log('.json_encode($obj).')</script>');
}



/**
 * returnJSON($response)
 *
 * It takes a response array, adds some extra information to it, and then returns it as a JSON object
 *
 * @param array The response array that will be returned to the client.
 *
 * @return JSON The response is a JSON object with the following keys:
 */

function returnJSON($response)
{
    global $start;
    // access_log($response);

    // stop time measurement
    $response['exTime'] = round(1000*(microtime(true)-$start), 0).' ms';

    // send response as JSON
    if ($response['JSONoutput']) {
        unset($response['JSONoutput']);
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json; charset=UTF-8');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Max-Age: 3600');
        header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
        echo json_encode($response);
    }
    // send response as text
    else {
        unset($response['JSONoutput']);
        pprint($response, 'response');
    }
    exit;
}


//
// maybe usefull
//
// pprint(get_declared_classes(),'get_declared_classes);
// pprint(sys_get_temp_dir(), 'sys_get_temp_dir');