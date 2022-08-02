# find endpoint

## login
- require: endpoint/login.php
- DB Auth: valid email & password
- create JWT: id, name, role, permission, avatar, expire
- return: JWT

## user/ID
- decode JWT
- require: endpoint/user.php
- DB fetch: user/ID
- return: userdata