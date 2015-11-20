<?php
if(isset($_POST['update']) && isset($_POST['qty']) && isset($_SESSION['cart']) ){
	$qty = $_POST['qty'];
	foreach($qty as $k => $v){
		if(!is_numeric($v) || $v == 0){
			unset($_SESSION['cart'][$k]);
		}else{
			$_SESSION['cart'][$k]['qty'] = $v;
		}
	}
}
?>