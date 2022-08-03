<?php


function adminer_object()
{
    // required to run any plugin
    include_once "./plugins/plugin.php";

    // autoloader
    foreach (glob("plugins/*.php") as $filename) {
        include_once "./$filename";
    }

    $plugins = array(
        new AdminerLoginServersEnhanced(
            array(
                new AdminerLoginServerEnhanced('127.0.0.1:3306', 'MySQL port 3306', 'server'),
                new AdminerLoginServerEnhanced('127.0.0.1:3307', 'MariaDB port 3307', 'server'),
                new AdminerLoginServerEnhanced('127.0.0.1:5432', 'PostgreSQL port 5432', 'pgsql')
            )
        )
    );

    /* It is possible to combine customization and plugins:
    class AdminerCustomization extends AdminerPlugin {
    }
    return new AdminerCustomization($plugins);
    */

    return new AdminerPlugin($plugins);
}

// include original Adminer or Adminer Editor
include "./adminer.php";
