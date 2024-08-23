<?php
require_once("../db_connect.php");

if (!isset($_GET["id"])) {
    echo "請循正常管道進入此頁";
    exit;
}
$id = $_GET["id"];

$sql="UPDATE product SET valid = 1 WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "恢復成功";
} else {
    echo "恢復資料錯誤: " . $conn->error;
}
$conn->close();
header("Location: softDelete.php");