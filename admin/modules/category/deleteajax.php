<?php
require '../../../database/cauhinh.php';
require '../../../database/database.php';
require '../../../database/categories.php';
$id=$_POST['uid'];
$cate=new categories();
if($cate->delete($id)){
    echo '1';
}  else {
    echo '0';
}