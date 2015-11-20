<?php 
$act=$_GET['act'];
	switch($act){
	case "list": require("modules/user/list.php");break;
	case "edit": require("modules/user/update.php");break;
	case "updateadmin":require("modules/user/updateadmin.php");break;
	case "search"     :require("modules/user/search.php");break;
	//default: require ("home.php");break;
						}