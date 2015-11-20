<?php
require '../../../database/cauhinh.php';
require '../../../database/database.php';
require '../../../database/sales.php';
$id=$_POST['uid'];
$sale=new sales();
if($sale->delete($id)){
    echo '1';
}else    echo '0';