<?php include_once "db.php";
$poster=$Poster->all(['type'=>$_POST['type']]);
foreach ($poster as $po) {
    echo "<a onclick='showitem({$po['id']})'>";
    echo $po['title'];
    echo "</a>";
    echo "<br>";
}