<?php
if(!isset($_GET["id"])){
    echo "請正確帶入 get id 變數";
    exit;
}
$id=$_GET["id"];

require_once("../db_connect.php");

$sql="SELECT id, name, category, price, created_at FROM product WHERE id= '$id' ";

$result=$conn->query($sql);
$productCount=$result->num_rows;

$rows=$result->fetch_all(MYSQLI_ASSOC);

var_dump($rows);

$conn->close();