<?php
require_once("../db_connect.php");

if (!isset($_POST["name"])) {
    echo "請循正常管道進入此頁";
    exit;
}

// 獲取現有圖片名稱
$existingImage = $_POST["existing_image"] ?? '';

// 上傳圖片判斷
if ($_FILES["image"]["error"] == 0) {
    $image = $_FILES["image"]["name"];
    if (move_uploaded_file($_FILES["image"]["tmp_name"], "../product_img/" . $image)) {
        echo "上傳成功";
    } else {
        echo "上傳失敗";
        $image = $existingImage; // 上傳失敗，保留現有圖片
    }
} else {
    $image = $existingImage; // 沒有選擇新圖片，使用現有圖片
}

$id = $_POST["id"];
$name = $_POST["name"];
$price = $_POST["price"];
$description = $_POST["description"];
$min_users = $_POST["min_users"];
$max_users = $_POST["max_users"];
$min_age = $_POST["min_age"];
$playtime = $_POST["playtime"];

// 刪除原有標籤
$sqlDeleteTags = "DELETE FROM product_tags WHERE product_id = $id";
$conn->query($sqlDeleteTags);

// 插入新的標籤
if (isset($_POST["product_tags"]) && is_array($_POST["product_tags"])) {
    foreach ($_POST["product_tags"] as $tag_id) {
        $sqlInsertTag = "INSERT INTO product_tags (product_id, tag_id) VALUES ($id, $tag_id)";
        $conn->query($sqlInsertTag);
    }
}

// 更新產品資料
$sql = "UPDATE product SET 
            name='$name', 
            price='$price', 
            image='$image', 
            description='$description', 
            min_users='$min_users', 
            max_users='$max_users', 
            min_age='$min_age', 
            playtime='$playtime' 
        WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "更新成功";
} else {
    echo "更新資料錯誤: " . $conn->error;
}

header("Location: products.php");
$conn->close();
