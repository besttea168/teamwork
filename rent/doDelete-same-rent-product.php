<?php
if (!isset($_GET["id"])) {
    echo "請正確帶入 get id 變數";
    exit;
}
$id = $_GET["id"];

require_once("../db_connect.php");

// 查詢當前商品的詳細資料
$sql = "SELECT product_id FROM rent_product WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "沒有找到該商品";
    exit;
}

$row = $result->fetch_assoc();
$product_id = $row['product_id'];

// 軟刪除相同 product_id 的所有商品
$sql_delete = "UPDATE rent_product SET valid = 0 WHERE product_id = ?";
$stmt = $conn->prepare($sql_delete);
$stmt->bind_param("i", $product_id);
if ($stmt->execute()) {
    // 刪除成功後重定向到列表頁面
     echo "刪除失敗";
    header("Location: rent_product_list.php");
    exit;
} else {
    echo "刪除失敗";
}

// 關閉連線
$stmt->close();
$conn->close();
