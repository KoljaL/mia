<?php

require __DIR__ . './../vendor/autoload.php';

require 'functions.php';


use RedBeanPHP\R as R;

// pprint(get_declared_classes());
pprint(sys_get_temp_dir());

R::setup('sqlite:../db/test.sqlite');

$book = R::dispense("book");
$book->author = "Santa Claus";
$book->title = "Secrets of Christmas";
$id = R::store($book);