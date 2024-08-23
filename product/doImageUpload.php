<?php

$title = $_POST["title"];

// $pic = $_FILES["pic"];

if($_FILES["pic"]["error"] == 0){
    if(move_uploaded_file($_FILES["pic"]["tmp_name"], "../product_images/$_FILES["pic"]["tmp_name"]"))
}