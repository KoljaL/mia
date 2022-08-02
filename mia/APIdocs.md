 
 
## functions.php

### `getEndpoint()`  
It takes the URL and returns an array with the endpoint and value  
**return** ` An ` array with the endpoint, value, and value_1.  

### `generateJWT()`  
It generates a JWT token.  
**param** ` payload ` The payload is the data that you want to send to the client.  
**return** ` A ` JWT token  

### `Name readJWT()`  
It takes a JWT and returns an array of the data in the JWT  
**param** ` jwt ` The JWT to decode.  
**return** ` An ` array of the decoded JWT.  

### `pprint()`  
The function takes two arguments, the first is the data to be printed, the second is an optional  
name for the data  
**param** ` data ` The data to be printed.  
**param** ` name ` The name of the variable you're printing.  

### `console()`  
It takes an object, converts it to JSON, and prints it to the console  
**param** ` obj ` The object to be logged.  
 
 
## endpoints/user.php

### `testfunction()`  
bla  
 
 
## index.php

### `$endpoint = getEndpoint()`  
Calling the function `getEndpoint()` and assigning the return value to the variable.  

### `$jwt = generateJWT()`  
Generating a JWT token.  

### `$user = readJWT()`  
Reading the JWT and returning the user object.  
