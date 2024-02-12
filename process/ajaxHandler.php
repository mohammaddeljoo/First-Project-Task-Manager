<?php
include "/xampp/htdocs/7todo/bootsrap/init.php";
include_once "../bootsrap/init.php";
if(!isAjaxRequest()){
    diePage("invalid Request");
}

if(!isset($_POST['action']) || empty($_POST['action'])){
    diePage("invalid Request");

}


switch ($_POST['action']){
    case "addFolder":
        echo addFolder($_POST['folderName']);
    break;

    case "addTasks":
        var_dump($_POST['action']);
    break;

    default:
    diePage("invalid Request");

}