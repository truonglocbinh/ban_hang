<?php //session_start();
	  require_once("../functions/user.php");
?>
<style type="text/css">
label{
	display: inline-block;
	width:140px;
	font-size:18px;
}
.table{
	margin-left:330px;
	margin-right:280px;
	
}
.tile{
	margin-top:50px;
	margin-bottom:10px;
	height:70px;
}
fieldset{
	padding:10px 10px 10px 10px;
	border-radius:5px;
	box-shadow:5px 2px 5px #999999;
	background-color:#6F6
}
p{
	margin-bottom:4px;
}
input{
	width:200px;
}
.button{
	margin-left:150px;
	margin-top:20px;
}
input {
	height:30px;
	width:200px;
	border-radius:5px;
}
select{
	height:25px;
	width:70px;
}
.pt{	
	margin-left:150px;
	margin-right:130px;
	margin-top:250px;
    box-shadow:5px 2px 5px #999999;
}
.button{
	outline:none;
	border-radius:20px;
	height:30px;
	width:90px;
   border-top: 1px solid #247db5;
   background: #28597a;
   background: -webkit-gradient(linear, left top, left bottom, from(#cadbd2), to(#28597a));
   background: -webkit-linear-gradient(top, #cadbd2, #28597a);
   background: -moz-linear-gradient(top, #cadbd2, #28597a);
   background: -ms-linear-gradient(top, #cadbd2, #28597a);
   background: -o-linear-gradient(top, #cadbd2, #28597a);
   
   }
.button:hover {
   border-top-color: #42aac9;
   background: #42aac9;
   color: #050308;
   }
</style>
<script type="text/javascript"></script>
<?php 
$users=new user();
$data=array();
$id=$_SESSION['ses_userid'];
$data=$users->showOne($id);
$errors="";
if(isset($_POST['ok'])){
	$user=$_POST['user'];
	$pass=md5($_POST['pass']);
	$fullname=$_POST['fullname'];
	$gender=$_POST['gender'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$level=$_POST['level'];
	$rulephone= "/^[0]{1}[0-9]{9,10}$/";
	$ruleemail = "/^[a-z]{1}[a-zA-Z0-9.]{2,}@[a-zA-Z0-9-_]{2,10}\.[a-zA-Z]{2,5}$/";
	$count=0;
	if($user==""||$email==""){
		$errors= "Không được bỏ trống USERNAME và EMAIL";
		$count=1;
	}else{
		if($pass==""){
			$pass=$data['user_pass'];	
		}
		if($users->checkCol($id,"user_name",$user)&&$count!=1){
			$errors="Đã tồn tại user";
			$count=1;	
		}
		if(strlen($pass)<6&&$count!=1){
			$errors= "Password phải dài hơn 6 kí tự";
			$count=1;
		}
			
		if($phone!=""&&$count!=1){
			if(!preg_match($rulephone,$phone)){
			$errors= "Số điện thoại không hợp lệ";	
			$count=1;
			}
		}
		if($users->checkCol($id,"user_email",$email)&&$count!=1){
			$errors="Đã tồn tại email";
			$count=1;	
		}
		if(!preg_match($ruleemail,$email)&&$count!=1){
			$errors="Email không hợp lệ";	
			$count=1;
		}
		if($count!=1) 
		{
			$users->update($id,$user,$pass,$fullname,$gender,$phone,$email,$level);
			$errors="Cập nhật thành công";
		}
	}
	$data=$users->showOne($id);
}
?>
<div class="tile" align="center">	
	<h3>Thông tin cá nhân <?php echo $_SESSION['ses_username'];?></h3><br />
	<h4 style="color:#F00"><?php echo $errors?></h4>
</div>
<div align="center"></div>
<div class="table">
<fieldset><legend>Thông tin cá nhân admin</legend>
<form action="" method="post">
<p><label>Tài khoản</label> <input type="text" name="user" value="<?php echo $data['user_name']?>"/></p>
<p><label>Mật khẩu</label> <input type="password" name="pass" value=""/></p>
<p><label>Họ Tên</label> <input type="text" name="fullname" value="<?php echo $data['user_fullname']?>"/></p>
<p><label>Giới tính</label>  <select name="gender">
						<option value="1" <?php if($data['user_gender']==1) echo "selected=''"?>>Nam</option>
                        <option value="2" <?php if($data['user_gender']==2) echo "selected=''"?>>Nữ</option>
					   </select></p>
<p><label>Số ĐT</label>    <input type="text" name="phone" value="<?php echo $data['user_phone']?>"/></p>
<p><label>Email</label>   <input type="text" name="email" value="<?php echo $data['user_email']?>"/></p>
<p><label>Level</label>   <select name="level">
						<option value="1" selected="selected">Admin</option>
                        <option value="2">Member</option>
					   </select></p>
<button class="button" name="ok" value="Cập nhật" >Cập nhật</button>
</form>
</fieldset>
</div>
<div class="pt" align="center">Trang <a style="color:#F00">1</a></div>
