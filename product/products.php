<?php
require_once("../db_connect.php");

$sql = "SELECT * FROM product";

$result = $conn->query($sql);

// $row=$result->fetch_assoc();
// var_dump($row);
$userCount = $result->num_rows;
echo "共有".$userCount."個商品";
if($userCount > 0){
    while($row = $result->fetch_assoc()){
        echo "<br>id: ".$row["id"]." - Name: ".$row["name"]." - Category: ".$row["category"]." - Price: ".$row["price"]." - Image: ".$row["image"]." - Content: ".$row["content"]." - Created_at: ".$row["created_at"];
    }

}else{
    echo "0 results";
}


$conn->close();