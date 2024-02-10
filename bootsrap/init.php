<?php

include "constans.php";
include "config.php";
include "vendor/autoload.php";


try {

    $pdo = new PDO("mysql:dbname={$database_config->db};host={$database_config->host}", $database_config->user, $database_config->pass);
}
catch(PDOException $e) {
    diePage($e->getMessage());
}
// echo "CCCoooooooooonectedd";


include "libs/helpers.php";
include "libs/lib-auth.php";
include "libs/lib-task.php";