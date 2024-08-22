<?php
$per_page = 6; // 每頁顯示的筆數
$page=1; // 預設的頁數
$start_item = ($page-1) * $per_page; // 起始筆數

require_once("../db_connect.php");

$sql = "SELECT * FROM product WHERE valid = 1 LIMIT $start_item, $per_page";

$result = $conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);

var_dump($rows);
$conn->close();