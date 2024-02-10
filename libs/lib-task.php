<?php
 function getTasks(){

}

//یه تابع ساختیم با استفاده از دیتابیس  مقدار اون جدول رو پرفتیم با دستورات اس کیو ال  و داخل تایع ریختیم  و بعد میتونیم جاهای دیگه  صداش بزنیم
 function getFolders(){
    global $pdo;
    $sql = 'select * from folders';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $record =  $stmt->fetchAll(PDO::FETCH_OBJ);
    return $record;
}