<?php
include "bootsrap/init.php";
//dd($_SERVER['REQUEST_METHOD']);// میاییم چگ میکنیم ببین فرم ارسال شده یا نه


$home_url = site_url();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = $_GET['action'];
    $params = $_POST;
    if($action == 'register'){
        $result = register($params);
        if(!$result){
            echo "Error register...!";
        }else{
            echo "your now registered <br> <a href='{$home_url}auth.php'>please Login</a>";
        }

    }else if($action == 'login'){
        $result =  login($params['email'],$params['password']);
        if(!$result){
            echo "error : email or adddres try agane!";
        }else {
           header("Location:$home_url");

    
        }
    }
}


include "tpl/tpl-auth.php";


