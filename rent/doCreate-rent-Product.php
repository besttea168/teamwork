<?php
require_once("../db_connect.php");


if (!isset($_POST["price"])) {
    echo "請循正常管道進入此頁面";
    exit;
}
$amount = $_POST["amount"];
$product_id = $_POST["id"];
$price = $_POST["price"];
$deposit = $_POST["deposit"];
$status = $_POST["status"];
$now = date('Y-m-d H:i:s');


for ($i = 0; $i < $amount; $i++) {

    $sql = "INSERT INTO rent_product (product_id, price, deposit, status, created_at)
                VALUES ('$product_id', '$price', '$deposit', '$status', '$now')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        echo "新商品加入成功 id 為 $last_id";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

header("Location: rent_product_list.php");
$conn->close();
