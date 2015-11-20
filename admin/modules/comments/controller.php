<?php
	if(isset($_GET['page'])){
		switch($_GET['act']){
			case "list": require("modules/comments/list.php");break;
			case "listcmt":require("modules/comments/listcmt.php");break;
			case "searchp":require("modules/comments/searchp.php");break;
			case "searchcmt":require("modules/comments/searchcmt.php");break;
			default : header("location:".baseurl."admin/index.php");break;
		}	
	
	}else header("location:".baseurl."admin/index.php");