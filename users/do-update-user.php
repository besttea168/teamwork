<?php
require_once("../db_connect.php");


$id=$_POST["id"];
$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$address=$_POST["address"];
$birthday=$_POST["birthday"];
$gender=$_POST["gender"];

$sql="UPDATE users SET name='$name', email='$email', phone='$phone', address='$address', birthday='$birthday', gender='$gender' WHERE id='$id'";


if(($conn->query($sql)===true)){
    // echo "修改成功";
}else{
    echo "修改失敗";
}
// header("location: update-user.php?id=$id");
$conn->close();
?>
<script>
    alert("修改完成")
    setTimeout(function(){
        location.href="update-user.php?id=<?=$id?>"
    },1000)
</script>

