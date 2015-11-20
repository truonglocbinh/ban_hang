<?php 
require "../../../functions/config.php";
require "../../../functions/database.php";
require "../../../database/customers.php";
$cate=new customers();
$id=$_POST['id'];
if($cate->deleteAll()){
	echo "1";
}else{
	echo "0";
}
?>