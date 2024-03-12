<?php
include_once "db.php";
$poster=$Poster->find($_POST['id']);
echo "<pre>";
echo $poster['text'];
echo "</pre>";