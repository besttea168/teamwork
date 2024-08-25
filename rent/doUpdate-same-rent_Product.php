<?php
if (!isset($_POST["product_id"])) {
    echo "請正確帶入 POST product_id 變數";
    exit;
}
$product_id = $_POST["product_id"];

require_once("../db_connect.php");

// 處理表單提交
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $price = $_POST["price"];
    $deposit = $_POST["deposit"];

    // 更新所有相同 product_id 的產品資料
    $sql_update = "UPDATE rent_product 
                   SET price = ?, deposit = ?, updated_time = NOW() 
                   WHERE product_id = ? AND valid = 1";
    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("dsi", $price, $deposit, $product_id);

    if ($stmt->execute()) {
        header("Location: rent_product_detail.php?id=" . urlencode($product_id));
        exit;
    } else {
        echo "更新失敗：" . $conn->error;
    }
}
