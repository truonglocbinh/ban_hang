<?php 
require "../../../functions/config.php";
require "../../../functions/database.php";
require "../../../database/products.php";
$cate=new products();
$id=$_POST['id'];
if($cate->deleteAll()){
  echo "1";
}else{
  echo "0";
}
?>