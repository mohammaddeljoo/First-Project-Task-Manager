<?php
// use Hekmatinasser\Verta\Verta;
// var_dump(verta::now());

include "bootsrap/init.php";

$folders = getFolders();

var_dump($folders[0]->name);

$tasks = getTasks();


include "tpl/tpl-index.php";


