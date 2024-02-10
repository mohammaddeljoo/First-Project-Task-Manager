<?php
// use Hekmatinasser\Verta\Verta;
// var_dump(verta::now());

include "bootsrap/init.php";

if (isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder']) ){
    $deletedcount = deleteFolder($_GET['delete_folder']);
    echo "$deletedcount folders succesfully deleted!!!!";
}

$folders = getFolders();

$tasks = getTasks();


include "tpl/tpl-index.php";

