<?php
require_once("../db_connect.php");
if (!isset($_GET["id"])) {
    echo "循正常管道進入";
    exit;
}

$id = $_GET["id"];

$sql = "UPDATE users SET valid=0 
WHERE id=$id";

$conn->query($sql);
?>
<script>
    alert("刪除成功")
    setTimeout(function() {

        location.href= "users.php"
    }, 1000);
</script>