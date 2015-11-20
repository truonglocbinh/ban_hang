<div id="homelink">
	<a href="<?php echo baseurl; ?>">Trang chủ</a> &raquo; <a href="">Khách hàng</a>
</div>
<div id="homecontent">
<?php
	require("functions/customer/guide.php");
	require("functions/customer/question.php");
	require("functions/customer/warranty.php");	
	
	$guide = new guide();
	$result_guide = $guide->getdata();
	
	$question = new question();
	$result_question = $question->getdata();
	
	$warranty = new warranty();
	$result_warranty = $warranty->getdata();
	
?>
	<h3>Hướng dẫn mua hàng</h3>
<?php	
	echo $result_guide['cus_content']."<br>";
?>
	<h3>Hỏi đáp</h3>
<?php
	echo $result_question['cus_content']."<br>";
?>
	<h3>Chính sách bảo hành</h3>
<?php
	echo $result_warranty['cus_content'];
?>
</div>