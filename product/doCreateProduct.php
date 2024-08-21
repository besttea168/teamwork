<?php
require_once("../db_connect.php");


if(!isset($_POST["name"])){
    echo "請循正常管道進入此頁面";
    exit;
}

$name=$_POST["name"];
$category_tag=$_POST["category_tag"];
$price=$_POST["price"];
$image=$_POST["image"];
$content=$_POST["content"];
$now=date('Y-m-d H:i:s');

$sql="INSERT INTO product (name, category_tag, price, image, content, created_at)
  VALUES ('$name', '$category_tag', '$price', '$image', '$content', '$now')";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;
  echo "新商品加入成功 id 為 $last_id";
    
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
header("Location: products.php");
$conn->close();
  