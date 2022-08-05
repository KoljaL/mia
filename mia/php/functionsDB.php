<?php

use RedBeanPHP\R as R;

function getProjectsFromCustomer($id)
{
    $customer = R::load('customer', $id);

    $data = [];
    foreach ($customer->ownProjectList as $project) {
        $data[] = $project->export();
    };
    return $data;
}
