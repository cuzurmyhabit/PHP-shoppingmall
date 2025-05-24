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
        // 데이터베이스 연결
        include 'db.php';
        $stmt = $pdo -> query("SELECT * FROM products"); 
        $products = $stmt -> fetchAll(PDO::FETCH_ASSOC);    //fetchAll() : 모든 결과를 배열로 가져옴


        
        

        // foreach ($products as $product) {
        //     echo "<p>".$product['name']." - ".$product['price']."원</p>";
        // }

        // foreach ($products as $product) {
        //     echo "<div>";
        //     echo "<h2>".$product['name']."</h2>";
        //     echo "<p>가격: ".$product['price']."원</p>";
        //     echo "<a href='pages/products.php?id=".$product['id']."'>상세보기</a>";
        // }
        
    ?>
    
    <?php if(count($products) === 0): ?>
        <p>상품이 없습니다.</p>
    <?php else: ?>
        <?php foreach($products as $product): ?>
            <h2><?= htmlspecialchars($product['name']) ?></h2>
            <p>가격: <?= htmlspecialchars($product['price']) ?>원</p>
            <a href="pages/products.php?id=<?= $product['id'] ?>">상세보기</a>
        <?php endforeach; ?>
    <?php endif; ?>

        
</body>
</html>