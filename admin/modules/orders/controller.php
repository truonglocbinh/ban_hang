<?php
	if(isset($_GET['page'])){
		switch($_GET['act']){
			case "list": require("modules/orders/list.php");break;
			case "listorder":require("modules/orders/listorder.php");break;
			case "search":require("modules/orders/search.php");break;
			default:header("location:".baseurl."admin/index.php");break;
		}	
	
	}else require("../index.php");