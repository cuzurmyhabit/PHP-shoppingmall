<?php
    include '../db.php'; // 데이터베이스 연결

    if(isset($_GET['id'])) {
        $product_id = $_GET['id'];  // GET 방식으로 전달된 상품 ID를 가져옴
        $product = null;    // 상품 정보를 저장할 변수 초기화

        // 상품 id에 맞게 상품 정보 가져오기
        $stmt = $pdo -> prepare("SELECT * FROM products WHERE id = :id");   //PDO: php data object DB에서 값 찾기
        $stmt -> bindParam(':id', $product_id, PDO::PARAM_INT);             // :id에 $product_id를 바인딩, 정수형입니다
        $stmt -> execute();                                                 // 쿼리 실행

        $product = $stmt -> fetch(PDO::FETCH_ASSOC);    // 결과를 하나의 연관 배열로 가져옴 (상품 하나니까 fetch)

        if ($product) { // 상품이 존재하는 경우
            echo "<h1>" . htmlspecialchars($product['name']) . "</h1>";
            echo "<p>가격: " . htmlspecialchars($product['price']) . "원</p>";
            echo "<p> 상세 설명:" . htmlspecialchars($product['description']) . "</p>";
        } else {    // 상품이 존재하지 않는 경우
            echo "<p>상품을 찾을 수 없습니다.</p>";
        }
    } else {    // URL에 id 파라미터가 아예 없는 경우
        echo "<p>상품 ID가 제공되지 않았습니다.</p>";
    }
?>