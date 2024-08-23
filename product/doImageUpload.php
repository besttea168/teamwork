<?php

// $title = $_POST["title"];

// $pic = $_FILES["pic"];

if ($_FILES["image"]["error"] == 0){
    if (move_uploaded_file($_FILES["image"]["tmp_name"], "../product_img/".$_FILES["image"]["name"])){
        echo "上傳成功";
    }else{
        echo "上傳失敗";
    }
}