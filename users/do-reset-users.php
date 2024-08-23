<?php

require_once("../db_connect.php");
if (!isset($_GET["id"])) {
    echo "循正常管道進入";
    exit;
}

$id = $_GET["id"];

$sql = "UPDATE users SET valid=1 
WHERE id=$id";

$conn->query($sql);
?>
<script>
    alert("已恢復使用者權限")
    setTimeout(function() {

        location.href= "deleted-users.php"
    }, 1000);
</script>