<?php       //시작 태그 
    $host = "localhost";       // 데이터베이스 서버 주소
    $user = "root";            // 데이터베이스 사용자 이름 (기본값)
    $password = "";            // 사용자 비밀번호  
    $dbname = "shopping-mall"; // 사용할 데이터베이스 이름

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password); // PDO 객체를 생성하여 데이터베이스에 연결
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     // PDO::ERRMODE_EXCEPTION: 오류 발생 시 예외를 던지도록 설정 디버깅 할 때 유용함
    }
    catch(PDOException $e){   // PDOException: db 연결 중 발생하는 에러만 잡겠다
        // 데이터베이스 연결 실패 시 예외 처리
        die("데이터베이스 연결 실패..... 죽으세요." . $e->getMessage());
    }
?>