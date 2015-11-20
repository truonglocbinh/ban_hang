<?php session_start();?>
<?php require("../functions/config.php");
	  require("../functions/database.php");
	  require("../functions/user.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
body{
	background-image:url(images/back.jpg);
	background-size:1500px 800px;
}
#round {
  height:400px;
  width:330px;
  padding-top:30px;
  margin:100px 500px 100px 500px;
  font: 12px/20px 'Lucida Grande', Verdana, sans-serif;
  color: #404040;
  border-radius:5px;
  background: #ebc9a2;
}
 
input, textarea, select, label {
  font-family: inherit;
  font-size: 12px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.login {
  margin: 20px auto;
  padding: 18px 20px;
  width: 200px;
  background: #3f65b7;
  background-clip: padding-box;
  border: 1px solid #172b4e;
  border-bottom-color: #142647;
  border-radius: 5px;
  background-image: -webkit-radial-gradient(cover, #437dd6, #3960a6);
  background-image: -moz-radial-gradient(cover, #437dd6, #3960a6);
  background-image: -o-radial-gradient(cover, #437dd6, #3960a6);
  background-image: radial-gradient(cover, #437dd6, #3960a6);
  -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.3), inset 0 0 1px 1px rgba(255, 255, 255, 0.1), 0 2px 10px rgba(0, 0, 0, 0.5);
  box-shadow: inset 0 1px rgba(255, 255, 255, 0.3), inset 0 0 1px 1px rgba(255, 255, 255, 0.1), 0 2px 10px rgba(0, 0, 0, 0.5);
}
 
#dn{
  margin-bottom: 20px;
  height:50px;
  font-size: 16px;
  font-weight: bold;
  color: white;
  text-align: center;
  text-shadow: 0 -1px rgba(0, 0, 0, 0.4);
}
 
.login-input {
  display: block;
  width: 100%;
  height: 37px;
  margin-bottom: 20px;
  padding: 0 9px;
  color: white;
  text-shadow: 0 1px black;
  background: #2b3e5d;
  border: 1px solid #15243b;
  border-top-color: #0d1827;
  border-radius: 8px;
}
 

.login-submit {
  display: block;
  width: 100%;
  height: 37px;
  margin-bottom: 15px;
  font-size: 14px;
  font-weight: bold;
  color: #294779;
  text-align: center;
  text-shadow: 0 1px rgba(255, 255, 255, 0.3);
  background: #adcbfa;
  background-clip: padding-box;
  border: 1px solid #284473;
  border-bottom-color: #223b66;
  border-radius: 4px;
  cursor: pointer;
    background-image: -webkit-linear-gradient(top, #d0e1fe, #96b8ed);
  background-image: -moz-linear-gradient(top, #d0e1fe, #96b8ed);
  background-image: -o-linear-gradient(top, #d0e1fe, #96b8ed);
  background-image: linear-gradient(to bottom, #d0e1fe, #96b8ed);
}
.error{
  color:#F00
}
.tile{
	margin:20px 500px 100px 470px; 
}
</style>
</head>
<script type="text/javascript" src="../scripts/jquery-1.11.1.min.js"></script>
<script type="text/javascript">

$(document).ready(function(e) {
	$("#ok").click(function(e) { 
		var form_datalogin={action:"checkLogin",user_name:$("#use").val(),pass:$("#pass").val()} 
		$.ajax({
		 	  url:"checklogin.php",
		 	  type:"post", 
		 	  data: form_datalogin, 
			  async:false, 
		 	 success: function(result){
				 if(result==1){
					$(".error").html("Đăng nhập thất bại");
				 }else{
					window.location="index.php";
				 }
				 
			 } 
	    });
    });
	
	
});

</script>
<body>
<div class="tile"><marquee  border=0 behavior=alternate width=650  align=middle><img border=0 src="images/login/b.gif" /><img border=0 src="images/login/k.gif" /><img border=0 src="images/login/s.gif" /><img border=0 src="images/login/u.gif" /><img border=0 src="images/login/n.gif" /></marquee></div>
<div id="round">

<form class="login" onsubmit="return false">
    <div id="dn"><h2>Đăng nhập</h2><div class="error"></div></div>
    <input type="text" name="email" class="login-input" id="use" placeholder="Account">
    <input type="password" name="password" class="login-input" id="pass" placeholder="Password">
    <input type="submit" value="Login" id="ok" class="login-submit">	
</form>
</div>
</body>
</html>
