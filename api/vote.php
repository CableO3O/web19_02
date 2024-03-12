<?php include_once "db.php";
if ($Vote->count(['user'=>$_SESSION['user'],'poster_id'=>$_POST['poster_id']])>0) {
    $Vote->del(['user'=>$_SESSION['user'],'poster_id'=>$_POST['poster_id']]);
    $poster=$Poster->find($_POST['poster_id']);
    $poster['goods']--;
    $Poster->save($poster);
}else{
    $Vote->save(['user'=>$_SESSION['user'],'poster_id'=>$_POST['poster_id']]);
    $poster=$Poster->find($_POST['poster_id']);
    $poster['goods']++;
    $Poster->save($poster);
}