<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
$result=NULL;
if(isset($_POST['order']) && isset($val['name'])){//1
	if(isset($_SESSION['ses_name'])){//2
		$sqlNotice = "select * from tbl_orders where user_id = '$_SESSION[ses_userid]' order by order_notice desc limit 1";
		$resultNotice = mysql_query($sqlNotice) or die("Can not query sql notice!");
		$numRowNotice= mysql_num_rows($resultNotice);
		if($numRowNotice == 0){//3
			$orderNotice = 1;
		}else{//3'
			$infoNotice = mysql_fetch_assoc($resultNotice);
			$orderNotice = $infoNotice['order_notice'] + 1;
		}//c3'
		//$orderSum=$sum;
		$sqlName = "select * from tbl_orders order by order_name desc limit 1";
		$resultName = mysql_query($sqlName) or die("Can not query sql name!");
		$numRowName = mysql_num_rows($resultName);
		if($numRowName==0){//3''
			$orderName = 1;
		}else{//3'''
			$infoName = mysql_fetch_assoc($resultName);
			$orderName = $infoName['order_name'] +1;
		}//c3'''
		foreach($_SESSION['cart'] as $key => $val){//3''''
			$sql = "insert into tbl_orders(pro_id, user_id, order_date, order_number, order_status, order_notice,order_name) values('$key','$_SESSION[ses_userid]','".date("Y/m/d H:i:s")."','$val[qty]','0',$orderNotice,$orderName)";
			$result = mysql_query($sql);
		}//c3''''
	}else{//2'
		echo "<p style='color:red'>Bạn vui lòng đăng nhập trước khi mua hàng!</p>";
	}//c2'
	if(isset($result)){//2''
		echo "<p style='color:red'>Bạn đã đăng kí mua hàng thành công!</p>";
		if(isset($_SESSION['cart'])){//3'''''
			unset($_SESSION['cart']);
		}//c3'''''
	}//c2''
}//c1
?>