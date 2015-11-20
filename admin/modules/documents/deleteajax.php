<?php
require '../../../database/cauhinh.php';
require '../../../database/database.php';
require '../../../database/documents.php';
$doc= new documents();
$id=$_POST['uid'];
if($doc->delete($id)){
    echo '1';
}else    echo '0';