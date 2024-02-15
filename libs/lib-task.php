<?php

 function getTasks(){
    global $pdo;

    $folder = $_GET['folder_id'] ?? null;  // اگر پیداش کردی قرارش بده توی متغیر اگر پیدااش نکردی نال قرار بده
    $folderCondition = '';
    if (isset($folder) and is_numeric($folder)){
        $folderCondition = "and folder_id=$folder";
    }
//وقتی فولدر ست شده بود میاد و متقیر  فولدر کاندیشن رو اجرا میکنه  تویی متغیر فولدر کامندیشن هم که  ادامه دستورات اس کیو ال هست

    $current_user_id = getCurrentUserId();
    $sql = "select * from tasks where user_id = $current_user_id $folderCondition";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $record =  $stmt->fetchAll(PDO::FETCH_OBJ);
    return $record;
}
////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////

function deleteTask($task_id){
    global $pdo;
   // $courrent_users_id = getCourrentUsersId();
    $sql = "delete from tasks where id = $task_id ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
        return $stmt->rowCount();
}

/////////////////////////////////////////////////////////////////////////
//یه تابع ساختیم با استفاده از دیتابیس  مقدار اون جدول رو پرفتیم با دستورات اس کیو ال  و داخل تایع ریختیم  و بعد میتونیم جاهای دیگه  صداش بزنیم
 function deleteFolder($folder_id){
    global $pdo;
   // $courrent_users_id = getCourrentUsersId();
    $sql = "delete from folders where id = $folder_id ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
        return $stmt->rowCount();
}
////////////////////////////////////
 function getFolders(){
    global $pdo;
    $current_user_id = getCurrentUserId();
    $sql = "select * from folders where user_id = $current_user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $record =  $stmt->fetchAll(PDO::FETCH_OBJ);
    return $record;
}
////////////////////////////////
function addFolder($folder_name){
    global $pdo;
    $current_user_id = getCurrentUserId();
    $sql = "INSERT INTO `folders` (name,user_id) VALUES (:folder_name,:user_id);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':folder_name'=>$folder_name,':user_id'=>$current_user_id]);
    return $stmt->rowCount();
}
////////////////////////////////////

function addTask($taskTitle,$folderId){
    global $pdo;
    $current_user_id = getCurrentUserId();
    $sql = "INSERT INTO `tasks` (title,user_id,folder_id) VALUES (:title,:user_id,:folder_id);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':title'=>$taskTitle,':user_id'=>$current_user_id,':folder_id'=>$folderId]);
    return $stmt->rowCount();
}
function doneSwitch($task_id){
    global $pdo;
    $current_user_id = getCurrentUserId();
    $sql = "UPDATE `tasks` SET is_done = 1-is_done where user_id = :userId and id = :taskId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':userId'=>$current_user_id,':taskId'=>$task_id]);
    return $stmt->rowCount();
}