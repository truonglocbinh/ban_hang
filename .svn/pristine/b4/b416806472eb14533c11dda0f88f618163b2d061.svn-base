<?php
//ob_start();
if(isset($_SESSION['cart'])){
	if(isset($_GET['type'])){ // xoa tat ca
		unset($_SESSION['cart']);
	}else{
		if(isset($_GET['pid'])){
			$key = $_GET['pid'];
			unset($_SESSION['cart'][$key]);
		}
	}
}
header("location:".baseurl."?page=product&act=indexCart");
exit();
?>