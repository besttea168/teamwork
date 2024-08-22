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
    // 遍歷從 0 到 $amount - 1 的循環，根據 $amount 的值插入多條記錄。


    $sql = "INSERT INTO rent_product (product_id, price, deposit, status, created_at)
                VALUES ('$product_id', '$price', '$deposit', '$status', '$now')";


    if ($conn->query($sql) === TRUE) {

        $last_id = $conn->insert_id;
        // 獲取剛插入的記錄的自增 ID。

        echo "新商品加入成功 id 為 $last_id";
        // 輸出一條消息，顯示新插入記錄的 ID。
    } else {
        // 如果 SQL 查詢執行失敗，則進入這個條件。

        echo "Error: " . $sql . "<br>" . $conn->error;
        // 輸出錯誤信息，顯示 SQL 查詢語句和錯誤描述。
    }
}

header("Location: rent_product_list.php");
$conn->close();
