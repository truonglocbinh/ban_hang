<?php require_once("../functions/user.php");?>

<style type="text/css">
td{
width:50;

}
tr{
height:30px;	
}

div.table{
width:1000;
padding-top:20px;
margin-top:20px;	
}
h3{
padding-bottom:20px	
}
select,input{
	height:27px;
	width:200px;
	margin-top:3px;
	border-radius:5px;
	
}
.pt{	
	margin-left:150px;
	margin-right:130px;
	margin-top:250px;
    box-shadow:5px 2px 5px #999999;
}
.title{
	margin-top:20px;
	height:100px;
}
fieldset{
	margin:5px 250px 0px 290px;
	width:400px;
	border-radius:5px;
	padding:10px 10px 10px 10px;
	background-color:#6F6;
	box-shadow:5px 2px 5px #999999;
}
.button {
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
<body>
<?php
	if(isset($_GET['id'])){
		$user=new user();
		$id=$_GET['id'];
		$data=array();
		$data=$user->showOne($id);	
	}else header("location:".baseurl."admin/index.php?page=user&act=list");
	$errors="";
	$count=1;
	if(isset($_POST['submit'])){
		if($_POST['pass']!=NULL){
			if(strlen($_POST['pass'])<6){
				$errors="Mật khẩu phải lớn hơn 6 kí tự";
				$count=$count+1;
			}else{
				$pass=md5($_POST['pass']);
				$user->updateOne("user_pass",$pass,$id);
			}
		}
		$level=$_POST['level'];
		if($count==1){
			$errors="Cập nhật thành công";
			$user->updateOne("user_level",$level,$id);
		}
	}
?>
<div class="title" align="center"><h3>UPDATA USER <br /><?php echo $data['user_name']?></h3>
	<?php echo "<a style='color:#F00'>".$errors."</a>"?>
</div>
<fieldset><legend>Thông tin người dùng</legend>
<div align="center" id="table" >
<form action="" method="post">
<table width="323" border="0" align="center">
	<tr>
  		<td width="90"  >Tài khoản</td>
 		<td width="235" > <input type="text" disabled="disabled" value="<?php echo $data['user_name']?>"/></td>
	</tr>
	<tr>
  		<td width="90" >Mật khẩu</td> 
		<td>  <input type="password" name="pass" /></td>
 	</tr>
 	<tr>
		<td width="90" >Họ tên</td> 
		<td><input type="text" disabled="disabled" value="<?php echo $data['user_fullname']?>"/></td>
	</tr>
	<tr>
		<td width="90"  >Giới tính</td>
		<td><input type="text" disabled="disabled"  value="<?php if($data['user_gender']==1) echo "Nam"; else echo "Nữ";?>"/></td>	
	</tr>
	<tr>
		<td width="90" >Số ĐT</td>
 		<td><input type="text" disabled="disabled" value="<?php echo $data['user_phone']?>"/></td>
 	</tr>
 	<tr>
		<td width="90" >Email</td>
		 <td> <input type="text" disabled="disabled" value="<?php echo $data['user_email']?>"/></td>
 	 </tr>
  	 <tr>
		<td width="90" >Level</td>
        <td>
          <select name="level">
          <option value="1" <?php if($data['user_level']==1) echo "selected='selected'";?>>Admin</option>
          <option value="2" <?php if($data['user_level']==2) echo "selected='selected'";?>>Member</option>
          </select> 	
		</td>
 	</tr>
 </table>
<input style="height:25px;width:70px;margin-top:10px;" class="button"  type="submit" name="submit" value="Cập nhật" />
</form>

</div>
</fieldset>
<div class="pt" align="center">Trang <a style="color:#F00">1</a></div>
