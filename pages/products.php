<?php
    include '../db.php';

    if(isset($_GET['id'])) {
        $product_id = $_GET['id'];
        $product = null;

        // 상품 id에 맞게 상품 정보 가져오기
        $stmt = $pdo -> prepare("SELECT * FROM products WHERE id = :id");   //PDO: php data object DB에서 값 찾기
        $stmt -> bindParam(':id', $product_id, PDO::PARAM_INT);             // :id에 $product_id를 바인딩, 정수형입니다
        $stmt -> execute();                                                 // 쿼리 실행

        $product = $stmt -> fetch(PDO::FETCH_ASSOC);

        if ($product) {
            echo "<h1>" . htmlspecialchars($product['name']) . "</h1>";
            echo "<p>가격: " . htmlspecialchars($product['price']) . "원</p>";
            echo "<p> 상세 설명:" . htmlspecialchars($product['description']) . "</p>";
        } else {
            echo "<p>상품을 찾을 수 없습니다.</p>";
        }
    } else {
        echo "<p>상품 ID가 제공되지 않았습니다.</p>";
    }
?>