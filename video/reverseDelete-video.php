<?php

require_once("../db_connect.php");

if (!isset($_GET["id"])) {
    echo "請循正常管道進入此頁";
    exit;
}
$id = $_GET["id"];

$sql = "UPDATE video SET valid =1 WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "刪除成功";
} else {
    echo "刪除資料錯誤: " .  $conn->error;
}

$conn->close();

header("location: softDeleteVideos.php");
