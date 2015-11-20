<?php
require '../../../database/cauhinh.php';
require '../../../database/database.php';
require '../../../database/products.php';
$pro=new products();
$id=$_POST['uid'];
if($pro->delete($id)){
    echo '1';
}else echo '0';