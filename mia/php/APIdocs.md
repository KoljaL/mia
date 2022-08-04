 
 
## endpoints/login.php

### `$jwt = generateJWT($payload)`  
Generating a JWT token.  
 
 
## endpoints/user.php

### `testfunction()`  
bla  
 
 
## php/functions.php

### `getEndpoint()`  
It takes the URL and returns an array with the endpoint and value  
**return** ` array ` with the endpoint, value, and value_1.  

### `parseRequest()`  
It takes the request body and returns an associative array of the request parameters  
**return** ` array ` the request.  

### `generateJWT($payload)`  
It generates a JWT token.  
**param** ` payload ` The payload is the data that you want to send to the client.  
**return** ` string ` A JWT token  

### `Name readJWT($jwt)`  
It takes a JWT and returns an array of the data in the JWT  
**param** ` jwt ` The JWT to decode.  
**return** ` array ` of the decoded JWT.  

### `pprint($data, $name)`  
The function takes two arguments, the first is the data to be printed, the second is an optional  
name for the data  
**param** ` data ` The data to be printed.  
**param** ` name ` The name of the variable you're printing.  

### `console($obj)`  
It takes an object, converts it to JSON, and prints it to the console  
**param** ` obj ` The object to be logged.  
