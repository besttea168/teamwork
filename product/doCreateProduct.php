<?php
require_once("../db_connect.php");


if (!isset($_POST["name"])) {
  echo "請循正常管道進入此頁面";
  exit;
}

if ($_FILES["image"]["error"] == 0) {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], "../images/" . $_FILES["image"]["name"])) {
    $image = $_FILES["image"]["name"];
  } else {
    echo "圖片上傳失敗";
    exit;
  }
}

$name = $_POST["name"];
// $category_tag = $_POST["category_tag"]; 改改改改改
$price = $_POST["price"];
$image = $_FILES["image"]["name"];
$description = $_POST["description"];
$min_users = $_POST["min_users"];
$max_users = $_POST["max_users"];
$min_age = $_POST["min_age"];
$playtime = $_POST["playtime"];
$now = date('Y-m-d H:i:s');


// 把標籤塞進category_tag 改改改改改
$category_tag = "";
if (isset($_POST['product_tags']) && is_array($_POST['product_tags'])) {
  $tag_ids = $_POST['product_tags'];


  // 獲取標籤名稱 改改改改改
  $sql_get_tags = "SELECT name FROM tags WHERE id IN (" . implode(',', $tag_ids) . ")";
  $result = $conn->query($sql_get_tags);

  $tag_names = [];
  while ($row = $result->fetch_assoc()) {
    $tag_names[] = $row['name'];
  }
  $category_tag = implode(', ', $tag_names);
}



$sql = "INSERT INTO product (name, category_tag, price, description, image, min_users, max_users, min_age, playtime, created_at, valid)
  VALUES ('$name', '$category_tag', '$price', '$description', '$image', '$min_users', '$max_users', '$min_age', '$playtime', '$now', 1)";




if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;


  // 插入標籤關聯 改改改改改
  if (!empty($tag_ids)) {
    foreach ($tag_ids as $tag_id) {
      $sql_tag = "INSERT INTO product_tags (product_id, tag_id) VALUES ($last_id, $tag_id)";
      $conn->query($sql_tag);
    }
  }


  echo "新商品加入成功 id 為 $last_id";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
header("Location: products.php");
$conn->close();
