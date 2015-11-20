<?php
require '../../../database/cauhinh.php';
require '../../../database/database.php';
require '../../../database/products.php';
$pro=new products();
$id=$_POST['pro_id'];
$price=$_POST['km'];
$data=$pro->showOne($id);
$gia=$data['pro_price'] - ($data['pro_price']*$price)/100;
echo round($gia, -3);
