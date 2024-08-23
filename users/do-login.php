<?php
session_start();
require_once("../db_connect.php");

$account=$_POST["account"];
$password=$_POST["password"];

if($account=="123" && $password=="123"){
    $_SESSION["user"]["name"]="第一組管理員";
    header("location:users.php");
}else{
    $_SESSION["error"]["login"]="帳號密碼錯誤";
    header("location:login.php");
    exit;
    // echo "帳密錯誤";
}

// $sql="SELECT account, password FROM users
// WHERE valid=1 AND account='$account' AND password='$password'";


// $result=$conn->query($sql);
// $userCount=$result->num_rows;


// if($userCount!=0){
//     header("location:1-dashboed");
// }else{
//     echo "登入失敗";
// }
?>