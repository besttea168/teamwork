<?php
if (!isset($_POST["id"])) {
    echo "請正確帶入 POST id 變數";
    exit;
}
$id = $_POST["id"];

require_once("../db_connect.php");

// 取得當前商品資料
$sql = "SELECT * FROM rent_product WHERE id = ? AND valid = 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    echo "找不到該商品";
    exit;
}

// 處理表單提交
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $price = $_POST["price"];
    $deposit = $_POST["deposit"];
    $status = $_POST["status"];
    $valid = isset($_POST["valid"]) ? 0 : 1;

    // 更新所有相同 product_id 的產品資料
    $sql_update = "UPDATE rent_product 
                   SET price = ?, deposit = ?, status = ?, valid = ?, updated_time = NOW() 
                   WHERE product_id = ? AND valid = 1";
    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("dissi", $price, $deposit, $status, $valid, $row['product_id']);

    if ($stmt->execute()) {
        echo "所有相同產品已更新成功";
        header("Location: rent_product_detail.php?id=$id");
        exit;
    } else {
        echo "更新失敗：" . $conn->error;
    }
}
