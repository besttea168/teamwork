<?php
require_once("../db_connect.php");

if(!isset($_POST["title"])){
    echo "請循正常管道進入此頁";
    exit;
}

$id= $_POST["id"];
$title=$_POST["title"];

$yt_url=$_POST["yt_url"];
$category=$_POST["category"];
$video_duration=$_POST["video_duration"];

$sql="UPDATE video SET title='$title', yt_url='$yt_url', category='$category',video_duration='$video_duration' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    $last_id=$conn->insert_id;
    echo "新資料輸入成功" ;
} else {
    echo "更新資料錯誤: " .  $conn->error;
}

header("location: video-edit.php?id=$id");

$conn->close();