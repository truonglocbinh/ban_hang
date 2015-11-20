<?php 
require "../../../functions/config.php";
require "../../../functions/database.php";
require "../../../database/intro.php";
$cate=new intro();
$id=$_POST['id'];
if($cate->deleteAll()){
	echo "1";
}else{
	echo "0";
}
?>