<div id="homelink">
	<a href="<?php echo baseurl; ?>">Trang chủ</a> &raquo; <a href="#">Giới thiệu</a>
</div>
<div id="homecontent">
<?php require("functions/intro.php");
	$intro = new intro();
	$result = $intro->getdata();
	echo $result['intro_content'];
?>
</div>