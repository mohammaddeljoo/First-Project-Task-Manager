<?php
 function getTasks(){

}
////////////////////////////////////////////////////////////////////////

function getCourrentUsersId(){
     return 1;

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
    $courrent_users_id = getCourrentUsersId();
    $sql = "select * from folders where user_id = $courrent_users_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $record =  $stmt->fetchAll(PDO::FETCH_OBJ);
    return $record;
}