<?php
require_once("../db_connect.php");

if(!isset($_POST["name"])){
    echo "請循正常管道進入";
    exit;
}


$name=$_POST["name"];
$code=$_POST["code"];
$type=$_POST["discount_type"];
$value=$_POST["discount"];
$start=$_POST["start_date"];
$end=$_POST["end_date"];
$limit=$_POST["usage_limit"];
$min=$_POST["min_spend"];
$valid=$_POST["coupon_status"];
$now=date('Y-m-d H:i:s');




$sql="INSERT INTO coupons (name, code, type, discount, start_date, end_date, usage_limit, min_spend, valid, created_time)
    VALUES ('$name', '$code', '$type', '$value', '$start', '$end', '$limit', $min, $valid, '$now')";

// echo $sql;
// exit;

if ($conn->query($sql) === TRUE) {
   
    $last_id=$conn->insert_id;
    echo "輸入成功,id為  $last_id";
} else {
    echo "ERROR: " . $conn->error;
}

header("location: coupons.php");

$conn->close();
?>