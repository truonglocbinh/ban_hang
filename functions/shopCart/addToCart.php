<?php
if(isset($_GET['pid'])){ // selected a product
	$id = $_GET['pid'];
	$quantity=$_GET['qty'];
	$sql = "select * from tbl_products where pro_id = '$id'";
	$result = mysql_query($sql);
	$numRow = mysql_num_rows($result);
	if($numRow > 0){ // product exist
		$info = mysql_fetch_assoc($result);
		if(isset($_SESSION['cart'][$id])){
			$_SESSION['cart'][$id]['qty']+= $quantity;
		}elseif(isset($quantity)){
			$_SESSION['cart'][$id]['qty'] = $quantity; // quantity
		}
		$_SESSION['cart'][$id]['name'] = $info['pro_name']; 
		$_SESSION['cart'][$id]['price'] = $info['pro_price'];
		$_SESSION['cart'][$id]['image'] = $info['pro_image'];
		$_SESSION['cart'][$id]['info'] = $info['pro_info'];
		//header("location:indexMain.php");
	}else{
		echo "Bạn phải chọn một sản phẩm!";
	}
}else{
	header("location:".baseurl);
}