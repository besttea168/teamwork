<?php
require_once("../db_connect.php");

if(!isset($_POST["name"])){
    echo "請循正常管道進入此頁";
    exit;
}

$id = $_POST["id"];
$name = $_POST["name"];
$code = $_POST["code"];
$valid = $_POST["coupon_status"];
$type = $_POST["discount_type"];
$discount = $_POST["discount"];
$usage_limit = $_POST["usage_limit"];
$min_spend = $_POST["min_spend"];
$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];

$sql="UPDATE coupons SET name='$name', code='$code', valid='$valid', type='$type', discount='$discount', usage_limit='$usage_limit', min_spend='$min_spend', start_date='$start_date', end_date='$end_date' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "更新成功";
} else {
    echo "更新資料錯誤: " . $conn->error;
}

header("location: coupon.php?id=$id");

$conn->close();
?>