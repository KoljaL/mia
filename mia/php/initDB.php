<?php

require_once 'functions.php';
require_once __DIR__ . './../vendor/autoload.php';
require_once 'config.php';


use RedBeanPHP\R as R;

R::setup('sqlite:../db/'.$conf['DB_filename']);
R::nuke();
R::fancyDebug();
// R::freeze(true);


//
// ceate admin user
//
$staff = R::dispense('staff');
$staff->name = 'admin';
$staff->password = password_hash("admin", PASSWORD_DEFAULT);
$staff->email = 'mail@example.com';
$staff->address = 'Main Rd. 22, 12234 Capital City';
$staff->avatar = 'https://i.pravatar.cc/150';
$staff->registrationdate = date("Y-m-d H:i");
$staff->role = 0;
$staff->permission = 0;


//
// create first customer
//
$customer = R::dispense('customer');
$customer->name = 'customer';
$customer->password = password_hash("customer", PASSWORD_DEFAULT);
$customer->email = 'customer@example.com';
$customer->address = 'Main Rd. 22, 12234 Capital City';
$customer->avatar = 'https://i.pravatar.cc/150';
$customer->registrationdate = date("Y-m-d H:i");
$customer->role = 0;
$customer->permission = 0;

//
// init projects
//
$project = R::dispense('project');
$project->title = 'project';

//
// init appointments
//
$appointment = R::dispense('appointment');
$appointment->title = 'appointment';




//
// store in database
//
$staff->ownCustomerList[] = $customer;
$customer->ownProjectList[] = $project;
$project->ownAppointmentList[] = $appointment;
R::store($staff);


function fakerData($noStaff, $noCustomer, $noProject, $noAppointment)
{
    $faker = Faker\Factory::create('de_DE');

    //
    // staff
    //
    for ($i=0; $i < $noStaff; $i++) {
        $faker->seed($i);
        $staff = R::dispense('staff');
        $staff->name = $faker->name();
        $staff->password = password_hash("admin", PASSWORD_DEFAULT);
        $staff->email = $faker->email();
        $staff->address = $faker->address();
        $staff->avatar = 'https://i.pravatar.cc/150';
        $staff->registrationdate = date("Y-m-d H:i");
        $staff->role = 1;
        $staff->permission = 1;

        //
        // customer
        //
        for ($j= 0; $j< $noCustomer ; $j++) {
            $faker->seed($j);
            $customer = R::dispense('customer');
            $customer->name = $faker->name();
            $customer->password = password_hash("customer", PASSWORD_DEFAULT);
            $customer->email = $faker->email();
            $customer->address = $faker->address();
            $customer->avatar = 'https://i.pravatar.cc/150';
            $customer->registrationdate = date("Y-m-d H:i");
            $customer->role = 3;
            $customer->permission = 3;

            //
            // project
            //
            for ($k=0; $k < $noProject; $k++) {
                $faker->seed($k);
                $project = R::dispense('project');
                $project->title = 'project';

                //
                // appointment
                //
                for ($a=0; $a < $noAppointment ; $a++) {
                    $faker->seed($a);
                    $appointment = R::dispense('appointment');
                    $appointment->title = 'appointment';
                    $appointment->date = $faker->dateTimeBetween('-1 week', '+1 week');


                    //
                    // store in database
                    //
                    $staff->ownCustomerList[] = $customer;
                    $customer->ownProjectList[] = $project;
                    $project->ownAppointmentList[] = $appointment;
                    R::store($staff);
                } // appointment
            } // project
        } // customer
    } // staff
}


fakerData(5, 5, 5, 5);


// $staff = R::load('staff', 1);
// pprint($staff->export());
// foreach ($staff->ownCustomerList as $customer) {
//     pprint($customer->export());
// };











// print_r(R::dump($staff));
// echo $staff;






// $faker = Faker\Factory::create('de_DE');
// $faker->seed(48329);
// echo $faker->name();
// $faker->seed(48322);
// echo $faker->name();




// $shop = R::dispense('shop');
// $shop->name = 'Antiques';

// $vase = R::dispense('product');
// $vase->price = 25;
// $shop->ownProductList[] = $vase;
// R::store($shop);

// $shop = R::load('shop', 1);
// foreach ($shop->ownProductList as $product) {
//     print_r($product->export());
// } //iterate





// $admin = R::load('users', '2');
// if (!$admin['login']) {
//     $users = R::dispense('users');
//     $users['login'] = 'admin';
//     $users['password'] = password_hash('123', PASSWORD_DEFAULT);
//     $id = R::store($users);
// }




// exit;
//
// DUMMY CONTENT
//

// class_exists('BenMajor\\RedSeed\\RedSeed');
// R::seed('staff', 10, [
//   'forename' => 'nameDE()',
//   'surname' => 'lastnameDE(10,15)',
//   'email' => 'email()',
//   'text' => 'lorem(5)',
//   'color' => 'color()',
//   'date' => 'datetime()',
//   'customer' => function () {
//       return R::seed('customer', 10, [
//         'forename' => 'nameDE()',
//         'surname' => 'lastnameDE(10,15)',
//         'email' => 'email()',
//         'text' => 'lorem(5)',
//         'street' => 'street()',
//         'city' => 'city()',
//         'date' => 'datetime()',
//         'project' => function () {
//             return R::seed('project', 10, [
//                 'bodyparts' => 'bodyparts()',
//                 'text' => 'lorem(5)',
//                 'date' => 'datetime()',
//             ]);
//         }
//       ]);
//   }
// ]);


pprint(round(1000*(microtime(true)-$start), 0).' ms', 'Executing time');