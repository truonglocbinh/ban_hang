<div id="homelink">
	<a href="<?php echo baseurl; ?>">Trang chủ</a> &raquo; <a href="#">Bảo hành</a>
</div>
<div id="homecontent">
<?php require("functions/customer/warranty.php");
	$warranty = new warranty();
	$result = $warranty->getdata();
	echo $result['cus_content'];
?>
</div>