<?php
require '../../../database/cauhinh.php';
require '../../../database/database.php';
require '../../../database/contacts.php';
$id=$_POST['uid'];
$cate=new contacts();
if($cate->delete($id)){
    echo '1';
}  else {
    echo '0';
}