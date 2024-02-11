<?php
include "/xampp/htdocs/7todo/bootsrap/init.php";
include_once "../bootsrap/init.php";
if(!isAjaxRequest()){
    diePage("invalid Request");
}
var_dump($_POST);

