<div id="homelink">
	<a href="<?php echo baseurl; ?>">Trang chủ</a> &raquo; <a href="#">Hướng dẫn mua hàng</a>
</div>
<div id="homecontent">
<?php require("functions/customer/guide.php");
	$guide = new guide();
	$result = $guide->getdata();
	echo $result['cus_content'];
?>
</div>