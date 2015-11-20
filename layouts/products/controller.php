<?php
if(isset($_GET['act'])){
	switch($_GET['act']){
		case "list" : require("layouts/products/categories.php"); break;
		case "detail" : require("layouts/products/detail.php"); break;
		case "comment" : require("layouts/products/comment.php"); break;
		case "addToCart": require("functions/shopCart/indexCart.php") ;break;//2 cái case này khác nhau, tuy cùng require 1 link nhưng ý nghĩa khác nhau, ko xóa
		case "indexCart": require("functions/shopCart/indexCart.php");break;//2 cái case này khác nhau, tuy cùng require 1 link nhưng ý nghĩa khác nhau, ko xóa
	}
}
if(isset($_GET['work'])){
	switch($_GET['work']){
		
		//case "comment" : require("layouts/products/comment.php"); break;
		//case "mota" : require("layouts/products/mota.php"); break;
	}
}