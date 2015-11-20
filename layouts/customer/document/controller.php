<?php
// neu khong ton tai bien get nao thi hien ca 3 trang led, pin, trick //
if (isset($_GET['sub'])){
	switch($_GET['sub']){
		case "ic": require("layouts/customer/document/ic.php"); break;
		case "pin": require("layouts/customer/document/pin.php"); break;
		case "trick": require("layouts/customer/document/trick.php"); break;
	}
}
if(isset($_GET['act'])){
	switch($_GET['act']){
		case "detail" : require("layouts/customer/document/detail.php"); break;
	}
}