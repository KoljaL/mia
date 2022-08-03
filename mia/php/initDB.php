<?php

require_once 'functions.php';
require_once __DIR__ . './../vendor/autoload.php';
require_once 'config.php';


use RedBeanPHP\R as R;

R::setup('sqlite:../db/'.$conf['DB_filename']);
R::nuke();
// $book = R::dispense("book");
// $book->author = "Santa Claus";
// $book->title = "Secrets of Christmas";
// $id = R::store($book);


class_exists('BenMajor\\RedSeed\\RedSeed');

// // $users = R::seed('user', 10, [
//   'forename' => 'word(3,10)',
//   'surname' => 'word(5,15)',
//   'email' => 'email()'
// ]);



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