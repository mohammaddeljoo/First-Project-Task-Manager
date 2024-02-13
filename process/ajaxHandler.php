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

    case "addTask":
        $folderId = $_POST['folderId'];
        $taskTitle = $_POST['taskTitle'];
        if(!isset($folderId) || empty($folderId)){
            echo "فولدر را انتخاب کنید.";
            die();
        }
        if(!isset($taskTitle) || strlen($taskTitle) < 3){
            echo "عنوان تسک باید بزرگتر از 2 حرف باشد.";
            die();
        }
         echo addTask($taskTitle,$folderId);

        //  echo addTask($_POST['taskTitle'],$_POST['folderId']);
        

    break;

    default:
    diePage("invalid Request");

}