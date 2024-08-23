<?php
require_once("../article/db_connect.php");
$title = $_POST["title"];
$description = $_POST["description"];
$content = $_POST["content"];
$created_time = date('Y-m-d H:i:s');
$sql = "INSERT INTO article_main ( content, created_time) 
        VALUES ('$content','$created_time') ";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "新文章輸入成功 id 為 $last_id";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo ($sql);
?>