<?php 
include_once "db.php";
echo $Admin->count(['acc'=>$_POST['acc']]);