<?php 
require "../../../functions/config.php";
require "../../../functions/database.php";
require "../../../database/categories.php";
$cate=new categories();
$id=$_POST['id'];
if($cate->deleteAll()){
	echo "1";
}else{
	echo "0";
}
?>