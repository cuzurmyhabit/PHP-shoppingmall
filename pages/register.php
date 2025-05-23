<?php
    session_start(); // 세션 시작, 사용자 상태의 정보를 유지하기 위해 사용/ 장바구니, 로그인 정보 등
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //입력된 데이터 받아오기
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        //비밀번호 암호화
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        //사용자 정보 저장
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $hashed_password;

        echo "<p>회원가입이 완료되었습니다. <a href = 'login.php'> 로그인 </a> 하세요</p>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1> 회원가입 </h1>
    <form action="register.php" method = "POST">
        <label for="name">이름:</label> <br>
        <input type="text" id="name" name="name" required> <br><br>

        <label for="email">이메일:</label> <br>
        <input type="email" id="email" name="email" required> <br><br>

        <label for="passward">비밀번호: </label> <br>
        <input type="password" id="password" name="password" required> <br><br>

        <button type="submit">가입하기</button>
    </form> 
</body>
</html>