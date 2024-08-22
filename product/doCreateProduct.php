<?php
require_once("../db_connect.php");


if (!isset($_POST["name"])) {
  echo "請循正常管道進入此頁面";
  exit;
}

$name = $_POST["name"];
$category_tag = $_POST["category_tag"];
$price = $_POST["price"];
$image = $_POST["image"];
$description = $_POST["description"];
$min_users = $_POST["min_users"];
$max_users = $_POST["max_users"];
$min_age = $_POST["min_age"];
$playtime = $_POST["playtime"];
$now = date('Y-m-d H:i:s');

$sql = "INSERT INTO product (name, category_tag, price, description, image, min_users, max_users, min_age, playtime, created_at, valid)
  VALUES ('$name', '$category_tag', '$price', '$description', '$image', '$min_users', '$max_users', '$min_age', '$playtime', '$now', 1)";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;
  echo "新商品加入成功 id 為 $last_id";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
// header("Location: products.php");
$conn->close();
