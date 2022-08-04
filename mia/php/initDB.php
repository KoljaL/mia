<?php

require_once 'functions.php';
require_once __DIR__ . './../vendor/autoload.php';
require_once 'config.php';


use RedBeanPHP\R as R;

R::setup('sqlite:../db/'.$conf['DB_filename']);
// R::nuke();
// R::fancyDebug(true);
R::freeze(true);



// $book = R::dispense("book");
// $book->author = "Santa Claus";
// $book->title = "Secrets of Christmas";
// $id = R::store($book);




$admin = R::load('users', '2');
if (!$admin['login']) {
    $users = R::dispense('users');
    $users['login'] = 'admin';
    $users['password'] = password_hash('123', PASSWORD_DEFAULT);
    $id = R::store($users);
}



// exit;
//
// DUMMY CONTENT
//

class_exists('BenMajor\\RedSeed\\RedSeed');
R::seed('staff', 10, [
  'forename' => 'nameDE()',
  'surname' => 'lastnameDE(10,15)',
  'email' => 'email()',
  'text' => 'lorem(5)',
  'color' => 'color()',
  'date' => 'datetime()',
  'customer' => function () {
      return R::seed('customer', 10, [
        'forename' => 'nameDE()',
        'surname' => 'lastnameDE(10,15)',
        'email' => 'email()',
        'text' => 'lorem(5)',
        'street' => 'street()',
        'city' => 'city()',
        'date' => 'datetime()',
        'project' => function () {
            return R::seed('project', 10, [
                'bodyparts' => 'bodyparts()',
                'text' => 'lorem(5)',
                'date' => 'datetime()',
            ]);
        }
      ]);
  }
]);


pprint(microtime(true)-$start);


$time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];

echo "Did nothing in $time seconds\n";