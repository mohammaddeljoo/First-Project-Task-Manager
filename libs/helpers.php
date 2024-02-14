<?php
function getCurrent(){
    return 1;
}

function diePage($msg){
    echo $msg;
    die();
}
function message($msg){
    echo "<pre style='color: black; background: antiquewhite; z-index: 999; position: relative; padding: 10px; margin: 10px; border-radius: 5px; border-left: 3px solid chocolate;'>";
echo "</pre>";
}

function isAjaxRequest(){
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
        return true;
    }    
    return false;
}

function dd($var){
    echo "<pre style='color: black; background: antiquewhite; z-index: 999; position: relative; padding: 10px; margin: 10px; border-radius: 5px; border-left: 3px solid chocolate;'>";
    var_dump($var);
    echo "</pre>";
}

function site_url($url = ''){
    return BASE_URL . $url;
}