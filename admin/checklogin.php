<?php session_start();
 require("../functions/config.php");
 require("../functions/database.php");
 require("../functions/user.php"); 
  $user=new user();
 if(!empty($_POST['user_name'])){
	 $action =$_POST['action'];
	$user= $_POST['user_name'];
	if($action=="checkUser")
		checkUser(strtolower($user));
	if($action=="checkLogin"){
		$pass=md5($_POST['pass']);
		checkLogin($user,$pass);		
	}
 }

 function checkUser($user){
	 $users=new user();
	
	 if($users->checkUser("user_name",$user)){
		echo "tai khoan hop le";
	 }else{
		echo "tai khoan khong ton tai";	 
	 }
 }
 function checkLogin($user,$pass){
	$users=new user();
	$checklogin=$users->checkLogin($user,$pass);
	if(!$checklogin){
		echo 1;
	}else{
		$_SESSION['ses_userid']=$checklogin['user_id'];	
		$_SESSION['ses_username']=$checklogin['user_name'];	
		$_SESSION['ses_userlevel']=$checklogin['user_level'];	
	}
 }