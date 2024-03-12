<?php
include_once "db.php";
if ($Admin->count(['email'=>$_POST['email']])>0) {
    echo $Admin->find(['email'=>$_POST['email']])['pw'];
}else{
    echo "查無此資料";
}