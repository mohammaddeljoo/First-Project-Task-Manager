<?php
function login($user,$password){
    return 1;
}


function register($userData){
    global $pdo;
    #validation of iserData is here
    $passHash = password_hash($userData['password'],PASSWORD_BCRYPT);
    $sql = "INSERT INTO `users` (name,email,password) VALUES (:name,:email,:pass);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':name'=>$userData['name'],':email'=>$userData['email'],':pass'=>$passHash]);
    return $stmt->rowCount();
}

function isLoggedIn(){
    return false;
}

