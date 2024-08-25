<?php
if (!isset($_POST["id"])) {
    echo "請正確帶入 POST id 變數";
    exit;
}
$id = $_POST["id"];
$status = $_POST["status"];

require_once("../db_connect.php");

// 更新商品的出租狀態
$sql_update = "UPDATE rent_product 
               SET status = ?, updated_time = NOW() 
               WHERE id = ? AND valid = 1";
$stmt = $conn->prepare($sql_update);
$stmt->bind_param("si", $status, $id);

if ($stmt->execute()) {
    header("Location: rent_product_list.php?id=" . urlencode($id));
    exit;
} else {
    echo "更新失敗：" . $conn->error;
}
