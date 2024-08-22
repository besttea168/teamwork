<?php
require_once("../db_connect.php");


if (!isset($_POST["name"])) {
    echo "請循正常管道進入此頁面";
    exit;
}
$amount = $_POST["amount"];
if (isset($amount) && $amount > 0) {
    // 檢查變量 $amount 是否存在且大於 0。如果是，則執行接下來的代碼。
    for ($i = 0; $i < $amount; $i++) {
        // 遍歷從 0 到 $amount - 1 的循環，根據 $amount 的值插入多條記錄。
        
        $product_id = $_POST["product_id"];
        // 從 POST 請求中獲取 "product_id" 的值並賦值給變量 $product_id。
        
        $price = $_POST["price"];
        // 從 POST 請求中獲取 "price" 的值並賦值給變量 $price。
        
        $deposit = $_POST["deposit"];
        // 從 POST 請求中獲取 "deposit" 的值並賦值給變量 $deposit。
        
        $status = $_POST["status"];
        // 從 POST 請求中獲取 "status" 的值並賦值給變量 $status。
        
        $now = date('Y-m-d H:i:s');
        // 獲取當前的日期和時間，以 "Y-m-d H:i:s" 格式儲存為變量 $now。
        
        $sql = "INSERT INTO rent_product (product_id, price, deposit, status, created_at, updated_time)
                VALUES ('$product_id', '$price', '$deposit', '$status', '$now', '$now')";
        // 構建一條 SQL 查詢語句，用於將 $product_id、$price、$deposit、$status、$now 插入到 "rent_product" 表中。
        
        if ($conn->query($sql) === TRUE) {
            // 執行 SQL 查詢，並檢查查詢是否成功執行（返回 TRUE 表示成功）。
            
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
}
header("Location: rent_product_list.php");
$conn->close();
