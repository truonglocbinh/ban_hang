<?php //session_start();
	  require("functions/user.php");
?>
<style type="text/css">
label{
	display: inline-block;
	width:140px;
	font-size:18px;
	margin-left:0px;
}
.table{
	width:400px;
	height:400px;
	margin-left:200px;
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
}
p{
	margin-bottom:4px;
}
.table input{
	width:200px;
	height:30px;
	width:200px;
	border-radius:5px;
}
.button{
	margin-left:150px;
	margin-top:20px;
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
</style>
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
	$level=$data['user_level'];
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
	<h3>Thông tin cá nhân <?php echo $_SESSION['ses_name'];?></h3><br />
	<h4 style="color:#F00"><?php echo $errors?></h4>
</div>
<div class="table" align="left">
<fieldset><legend>Thông tin cá nhân <?php echo $_SESSION['ses_name']; ?></legend>
<form action="" method="post">
<p><label>USER</label> <input type="text" name="user" value="<?php echo $data['user_name']?>"/></p>
<p><label>PASSWORD</label> <input type="password" name="pass" value=""/></p>
<p><label>FULLNAME</label> <input type="text" name="fullname" value="<?php echo $data['user_fullname']?>"/></p>
<p><label>GENDER</label>  <select name="gender">
						<option value="1" <?php if($data['user_gender']==1) echo "selected=''"?>>Nam</option>
                        <option value="2" <?php if($data['user_gender']==2) echo "selected=''"?>>Nữ</option>
					   </select></p>
<p><label>PHONE</label>    <input type="text" name="phone" value="<?php echo $data['user_phone']?>"/></p>
<p><label>EMAIL</label>   <input type="text" name="email" value="<?php echo $data['user_email']?>"/></p>
<p><label>LEVEL</label>   <input type="text" disabled="disabled" name="level" value="<?php if($data['user_level']==1) echo "Admin"; else echo "Member";?>" /></p>
<button class="button" name="ok" value="Cập nhật" >Cập nhật</button>
</form>
</fieldset>
</div>
