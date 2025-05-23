<?php
    session_start();    // 세션 시작, 사용자 상태의 정보를 유지하기 위해 사용/ 장바구니, 로그인 정보 등

    $products = [
        1 => [
            'id' => 1,
            'name' => '상품1',
            'price' => 10000,
            'description' => '상품1의 상세 설명입니다'
        ],
        2 => [ 
            'id' => 2,
            'name' => '상품2',
            'price' => 20000,
            'description' => '상품2의 상세 설명입니다'
        ],
        3 => [
            'id' => 3,
            'name' => '상품3',
            'price' => 30000,
            'description' => '상품3의 상세 설명입니다' 
        ],
    ];

    // 파라미터가 존재하는지 확인
    // $_GET : URL에 포함된 쿼리 문자열을 통해 전달된 파라미터를 가져옴
    if(isset($_GET['id'])) {
        $product_id = $_GET['id'];
        $product = null;

        foreach ($products as $p) {
            if ($p['id'] == $product_id) {
                $product = $p;
                break;
            }
        }

        if ($product) {
            echo "<h1>".htmlspecialchars($product['name'])."</h1>"; // htmlspecialchars() : html 공격 방지
            echo "<p>가격: ".htmlspecialchars($product['price'])."원</p>";
            echo "<p>상세설명: ".htmlspecialchars($product['description'])."</p>";
        }
        else {
            echo "<p>상품을 찾을 수 없습니다.</p>";
        }
    }
    else {
        echo "<p>상품 ID가 전달되지 않았습니다.</p>";
    }
?>