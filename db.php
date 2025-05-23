<?php 
    $host = "localhost";
    $user = "root";
    $password = ""; 
    $dbname = "shopping-mall";

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "이걸 성공하네 ㅋㅋ";
    }
    catch(PDOException $e){
        die("데이터베이스 연결 실패..... 죽으세요." . $e->getMessage());
    }
?>