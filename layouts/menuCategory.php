	<div id="cate_title"><h2>Sản phẩm</h2></div>
	<div id="cate_content">
<?php  require("functions/categories.php");?>
<?php 	
		$categories=new categories();
		$listcate=$categories->showAll();
?>
		<ul>
<?php foreach($listcate as $items){ ?>
			<li><a href="<?php echo baseurl."?page=product&act=list&cateid=".$items['cate_id']; ?>"><?php echo $items['cate_name']; ?></a></li>
<?php } ?>
		<li><a style="border-top:1px solid #000; height:0px;"></a></li>
		</ul>
	</div>
