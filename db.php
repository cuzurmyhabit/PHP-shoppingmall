<?php 
    $host = "localhost";
    $user = "root";
    $password = ""; 
    $dbname = "shopping-mall";

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        die("데이터베이스 연결 실패..... 죽으세요." . $e->getMessage());
    }
?>