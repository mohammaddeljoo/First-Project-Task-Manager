<?php

include "constans.php";
include BASE_PATH . "bootsrap/config.php";
include BASE_PATH . "vendor/autoload.php";
include BASE_PATH . "libs/helpers.php";



try {

    $pdo = new PDO("mysql:dbname={$database_config->db};host={$database_config->host}", $database_config->user, $database_config->pass);
}
catch(PDOException $e) {
    diePage($e->getMessage());
}
// echo "CCCoooooooooonectedd";


include BASE_PATH . "libs/lib-auth.php";
include BASE_PATH . "libs/lib-task.php";