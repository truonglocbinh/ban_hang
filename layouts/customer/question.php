<div id="homelink">
	<a href="<?php echo baseurl; ?>">Trang chủ</a> &raquo; <a href="#">Hỏi đáp</a>
</div>
<div id="homecontent">
<?php require("functions/customer/question.php");
	$question = new question();
	$result = $question->getdata();
	echo $result['cus_content'];
?>
</div>