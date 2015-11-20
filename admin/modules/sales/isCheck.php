<?php
require '../../../database/cauhinh.php';
require '../../../database/database.php';
require '../../../database/products.php';
$id=$_POST['id'];
$num=$_POST['num'];
$pro=new products();
$data=$pro->showOne($id);
if($data == null){
    echo 'Không hợp lệ';
}else{
    if($data['pro_number'] >= $num){
        echo 'Hợp lệ';
    }  else {
        echo 'Số lượng phải nhỏ hơn hoặc bằng số sản phẩm '; 
    }
}
