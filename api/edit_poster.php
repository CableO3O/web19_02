<?php include_once "db.php";
if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $id) {
        if (isset($_POST['del'])&&in_array($id,$_POST['del'])) {
            $Poster->del($id);
        }else{
            $poster=$Poster->find($id);
            $poster['sh']=(isset($_POST['sh'])&&in_array($id,$_POST['sh']))?1:0;
            $Poster->save($poster);
        }
    }
}
to("../back.php?do=news");