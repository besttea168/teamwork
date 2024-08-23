<?php

session_start();

require_once("../db_connect.php");




$account=$_POST["account"];
$password=$_POST["password"];
$repasseord=$_POST["repassword"];
$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$address=$_POST["address"];
$birthday=$_POST["birthday"];
$gender=$_POST["gender"];
$now=date('Y-m-d H:i:s');


$md5Password=md5($password);

if(empty($_POST["account"])){
    // echo "帳號不能為空";
    $_SESSION["error"]["account"]="帳號不能為空";
    header("location:creat-user.php");
    exit;
}

if(empty($_POST["password"])){
    // echo "密碼不能為空";
    $_SESSION["error"]["password"]="密碼不能為空";
    header("location:creat-user.php");
    exit;
}

if($password!=$repasseord){
    // echo "兩次不依樣";
    $_SESSION["error"]["repassword"]="兩次不一樣";
    header("location:creat-user.php");
    exit;
}

$sqlCheck="SELECT * FROM users WHERE account= '$account'";
$result=$conn->query($sqlCheck);
$userCount=$result->num_rows;

if($userCount>0){
    echo "帳號已存在";
    $_SESSION["error"]["isset"]="帳號已存在";
    header("location:creat-user.php");
    exit;
}











$sql="INSERT INTO users (account, password, name, email, phone, address, birthday, gender, valid ,created_at)
VALUES ('$account','$md5Password', '$name', '$email' , '$phone', '$address', '$birthday', '$gender',1,'$now')";




if($conn->query($sql)===true){
    // echo"<script>alert('註冊成功')</script>";
    
}else{
    echo "註冊失敗";
}

$conn->close();
// header("location: creat-user.php");
?>

<script>
    alert("註冊成功!")
    setTimeout(function(){
        location.href= "creat-user.php"
    },1000)
</script>
