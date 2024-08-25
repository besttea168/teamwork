<?php require_once("../db_connect.php");

if(!isset($_POST["searchTitle"])){
    echo"錯誤，非正常進入";
    exit;
}
$sql="SELECT * FROM article ORDER by id "
?>