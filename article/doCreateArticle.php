<?php
require_once("../article/db_connect.php");
$title = "testtitle";
$content = "testcontent";
$image_id = "testimgig";
$description = "testdes";
$category_id = "testcat";
$sql = "INSERT INTO article_main (title, content, image_id, 	description, category_id) 
        VALUES ('$title','$content','$image_id','$description','$category_id') ";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "新文章輸入成功 id 為 $last_id";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo ($sql);
?>