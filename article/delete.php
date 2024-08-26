<?php
include '../db_connect.php';

$id = $_GET['id'];
$sql = "DELETE FROM article_main WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    header("Location: mainArticle.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>