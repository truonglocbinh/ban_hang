<?php session_start(); ?>
<?php require("functions/config.php"); ?>
<?php require("functions/database.php"); ?>
<?php require("functions/products.php");?>

  <?php 
    $title="Trang chủ";
	// $cid=$_GET['cate_id'];
	  if(isset($_GET['page']))
	  { switch($_GET['page']){
		  
   case "dangki":   {  $title="Đăng kí"; }break;
   case "trangchu": {  $title="Trang chủ"; }break;
   case "intro": {$title="Giới thiệu";} break;
   case "product":{ $title="Sản phẩm";} break;
   case "customer": {$title="Khách hàng";} break;
   case "document": {$title="Tài liệu";} break; 
   case "contact": {$title="Liên hệ ";} break;
   case "search": {$title="Tìm kiếm từ khóa";} break;
   case "searchall": {$title="Tìm kiếm nhanh";} break;
   case "cart": {$title="Giỏ hàng";} break;
   default :
{    
$title="Trang chủ";
break;
}
  }
	  }
       ?>
<?php  
 if(isset($_GET['act'])){
	switch($_GET['act'])
	{ 
                 case "list":
	             { 
	                $product= new products(); 
					$cate=$product->getOne(1);
					$title="Danh sách sản phẩm ";
					
	             }   break;             
   }
 }

?>
<?php  
 if(isset($_GET['sub'])){
	switch($_GET['sub'])
	{ 
                 case "guide":$title="Hướng dẫn mua hàng";break;  
				 case "warranty":$title="Chính sách bảo hành";break;  
				 case "question":$title="Hỏi đáp";break;  
				 case "ic":$title="Tài liệu về IC";break;  
				 case "pin":$title="Tài liệu về Pin";break;  
				 case "trick":$title="Thủ thuật chung";
      break;             
   }
 }

?>
<?php  
 if(isset($_GET['cateid'])){
	switch($_GET['cateid'])
	{       
                 case "".$_GET['cateid']."":
	             { 
	                $product= new products(); 
					$cate=$product->getCate($_GET['cateid']);
					$title=$cate['cate_name'];					
	             }   break;    	         
   }
 }

?>
<?php  
 if(isset($_GET['pid'])){
	switch($_GET['pid'])
	{       
                 case "".$_GET['pid']."":
	             { 
	                $product= new products(); 
					$pro=$product->getOne($_GET['pid']);
					$title=$pro['pro_name'];					
	             }   break;    	         
   }
 }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $title ?></title>
        <link href="styles/styleIndex.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo baseurl; ?>scripts/jquery-1.11.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#slideshow > div:gt(0)").hide();
                setInterval(function() {
                    $('#slideshow > div:first')
                            .fadeOut(1000)
                            .next()
                            .fadeIn(1000)
                            .end()
                            .appendTo('#slideshow');
                }, 3000);
            });

        </script>
    </head>
    <body>
        <div id="category">
            <?php require("layouts/menuCategory.php"); ?>
        </div>
        <div id="wrapper">
            <?php require("layouts/header.php"); ?>
            <?php require("layouts/content.php"); ?>
            <?php require("layouts/footer.php"); ?>
        </div>
    </body>


