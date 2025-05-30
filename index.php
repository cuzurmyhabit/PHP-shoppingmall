<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> 상품 목록 </h1>
    <?php
        // 데이터베이스 연결 db 연결에 관한 설정을 포함한 파일 ex. PDO를 사용한 데이터베이스 연결
        include 'db.php';
        $stmt = $pdo -> query("SELECT * FROM products");    // products 테이블에서 모든 상품을 조회하는 쿼리 실행
                                                            //SELECT * FROM products : 모든 컬럼을 가지고 올 거다

        $products = $stmt -> fetchAll(PDO::FETCH_ASSOC);    //fetchAll() : 모든 결과를 연관 배열로 가져옴
                                                            // PDO::FETCH_ASSOC : 컬럼명을 배열의 키값으로 가져옴

    ?>
    
    <?php if(count($products) === 0): ?>      <!-- 상품이 없을 때 count($products)의 행 개수 길이 반환-->
        <p>상품이 없습니다.</p>               
    <?php else: ?>                       <!-- 상품이 있을 때 -->
        <?php foreach($products as $product): ?>        <!-- products 배열을 순회하여 prosuct에 저장 -->
            <h2><?= htmlspecialchars($product['name']) ?></h2>                  <!-- htmlspecialchars() : HTML 특수문자( ex. < > &) 를 방지하기 위해 사용 -->
            <p>가격: <?= htmlspecialchars($product['price']) ?>원</p>
            <a href="pages/products.php?id=<?= $product['id'] ?>">상세보기</a>    <!-- 상세보기 링크 (상품 ID를 GET 방식으로 전달) -->
            <!-- <?= $product['id'] ?>: 상품의 고유 아이디를 php로 출력
            누르면 Id 파라미터가 전달되어 pages/products.php로 이동 -->
        <?php endforeach; ?>
    <?php endif; ?>
        
</body>
</html>