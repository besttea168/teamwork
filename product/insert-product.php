<?php
require_once("../db_connect.php");
$sql="INSERT INTO product (name, category, price, image, content)
    VALUES ('test1', 'test1', 'test1', 'test1', 'test1')";


if ($conn->query($sql) === TRUE) {
  echo "新商品加入成功";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
