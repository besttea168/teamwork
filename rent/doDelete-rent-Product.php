<?php
if (!isset($_GET["id"])) {
    echo "請正確帶入 GET id 變數";
    exit;
}
$id = $_GET["id"];

require_once("../db_connect.php");

// 軟刪除租借商品
$sql = "UPDATE rent_product SET valid = 0 WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "租借商品已刪除";
    header("Location: rent_product_list.php");
} else {
    echo "刪除失敗: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
