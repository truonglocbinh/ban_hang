<?php
require '../../../database/cauhinh.php';
require '../../../database/database.php';
require '../../../database/news.php';
$news= new news();
$id=$_POST['uid'];
if($news->delete($id)){
    echo '1';
}else    echo '0';