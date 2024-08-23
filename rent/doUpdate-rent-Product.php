<?php
require_once("../db_connect.php");

if(!isset($_POST["name"])){
    echo "請循正常管道進入此頁";
    exit;
}

$id = $_POST["id"];
$name = $_POST["name"];
$price = $_POST["price"];
$status = $_POST["status"];

$sql = "UPDATE product SET  price='$price', deposit='$deposit's status = 'status' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "更新成功";
} else {
    echo "更新資料錯誤: " . $conn->error;
}

header("Location: products.php");
$conn->close();