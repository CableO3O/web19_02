<?php include_once "db.php";
echo $Admin->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
$_SESSION['user']=$_POST['acc'];