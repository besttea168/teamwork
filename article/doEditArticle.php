<?php
require_once("../article/db_connect.php");
$title = $_POST["title"];
$description = $_POST["description"];
$content = $_POST["content"];
$created_time = date('Y-m-d H:i:s');
$updated_time = date('Y-m-d H:i:s');
$sql = "INSERT INTO article_main (title, description ,content, created_time,updated_time) 
        VALUES ('$title','$description','$content','$created_time','updated_time') ";

if ($conn->query($sql) === TRUE) {
    //$last_id = $conn->insert_id;
    //echo "新文章輸入成功 id 為 $last_id";
    header("location: article_manage_system.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo ($sql);
?>