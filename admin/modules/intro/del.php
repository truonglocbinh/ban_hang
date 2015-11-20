<?php
require '../../../database/cauhinh.php';
require '../../../database/database.php';
require '../../../database/intro.php';
$cate=new intro();
$string=$_POST['myCheckboxes'];
$data=explode(",",$string);
$re=count($data);
if($data[0]!= null){
    for($i=0;$i<$re;$i++){
        $cate->delete($data[$i]);
    }
    echo '1';
}else {
    echo '0';
    
}