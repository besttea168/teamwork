<?php
require_once("../db_connect.php");

$sql = "SELECT product_id, COUNT(*) AS count FROM rent_product GROUP BY product_id";
$result = $conn->query($sql);

// 檢查是否有返回的結果
if ($result->num_rows > 0) {
    // 輸出每個 product_id 的統計結果
    while($row = $result->fetch_assoc()) {
        echo "Product ID: " . $row["product_id"]. " - Count: " . $row["count"]. "<br>";
    }
} else {
    echo "沒有找到結果";
}

// 關閉資料庫連接
$conn->close();
?>