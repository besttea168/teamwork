<?php
require_once("../db_connect.php");

if(!isset($_POST["name"])){
    echo "請循正常管道進入此頁";
    exit;
}

$id = $_POST["id"];
$name = $_POST["name"];
$price = $_POST["price"];

// 删除原有標籤
$sqlDeleteTags = "DELETE FROM product_tags WHERE product_id = $id";
$conn->query($sqlDeleteTags);

// 插入新的標籤
if(isset($_POST["product_tags"]) && is_array($_POST["product_tags"])){
    foreach($_POST["product_tags"] as $tag_id){
        $sqlInsertTag = "INSERT INTO product_tags (product_id, tag_id) VALUES ($id, $tag_id)";
        $conn->query($sqlInsertTag);
    }
}


$sql = "UPDATE product SET name='$name', price='$price' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "更新成功";
} else {
    echo "更新資料錯誤: " . $conn->error;
}

header("Location: products.php");
$conn->close();