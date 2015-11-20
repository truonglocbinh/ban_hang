<h3>Đăng kí thành viên</h3>
<style type="text/css">
td{
	padding:3px 5px
}
tr.title td{
	height:22px;
	font-weight:bold;
	text-align:center;
	background:#FFF
}
fieldset{
	width:400px;
	padding:30px;
	border:1px solid #CCC
}
legend{
	color:#09F
}
</style>
<div style="height:30px"></div>
<?php
require_once("functions/users/users.php");
$users = new users();
if(isset($_POST['submit'])){
	$name = $_POST['user'];
	$pass = md5($_POST['pass']);
	$repass = md5($_POST['repass']);
	$full = $_POST['fullname'];
	$gend = $_POST['gender'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$checkname = $users->checkUser("user_name",$name);
	$checkemail = $users->checkUser("user_email",$email);
	if($name == "" || $pass == "" ||$repass == "" || $full == "" || $email == "" ){
			die("Bạn phải điền đủ vào những ô có dấu sao!");
	}else{
		if(strlen($name) <= 3){
			die("Tên đăng nhập phải lớn hơn 3 kí tự!");
		}else {
			if(strlen($pass) <=  6){
				die("Mật khẩu phải lớn hơn 6 kí tự!");
			}else{
				if($pass != $repass){
					die("Mật khẩu nhập lại không đúng!");
				}else{
					if($phone != ""){
						if(!is_numeric($phone)){
							die("Số điện thoại phải là chữ số!");
						}else{
							if(substr($phone,0,1) != 0){
								die("số điện thoại phải bắt đầu bằng số 0!");
							}else{
								if(!preg_match("/^[a-z]{1}[a-zA-Z0-9.]{2,}@[a-zA-Z0-9-_]{2,10}\.[a-zA-Z]{2,5}$/",$email)){
									die("đây không phải là Email!");
								}
							}
						}
					}
				}
			}
		}
	}
	if($checkname == FALSE){
		echo "Tên đăng nhập đã có người sử dụng!";
	}elseif($checkemail==FALSE){
		echo "Email đã được sử dụng!";
	}else{
		$users->add($name,$pass,$full,$gend,$phone,$email);
		echo "Đăng kí thành công!";
		exit();
	}
}
?>
<form action="" method="post">
<fieldset>
	<legend>Đăng kí thành viên</legend>
<table width="350" border="0">
  <tr>
    <td width="143">Tên đăng nhập<font color="#FF0000"> * </font></td>
    <td width="197"><input type="text" name="user" size="25" placeholder="Tên đăng nhập"/></td>
  </tr>
  <tr>
    <td>Mật khẩu<font color="#FF0000"> * </font></td>
    <td><input type="password" name="pass" size="25" placeholder="Mật khẩu"/></td>
  </tr>
  <tr>
  	<td>Nhập lại mật khẩu <font color="#FF0000">* </font></td>
	<td> <input type="password" name="repass" size="25" placeholder="Nhập lại mật khẩu" /> </td>
  </tr>
  <tr>
    <td>Họ và tên<font color="#FF0000"> * </font></td>
    <td><input type="text" name="fullname" size="25" placeholder="Họ và tên"/></td>
  </tr>
  <tr>
    <td>Giới tính<font color="#FF0000"> * </font></td>
    <td>
    	<select name="gender">
        	<option value="1">Nam</option>
            <option value="0">Nữ</option>
        </select>
    </td>
  </tr>
  <tr>
  </tr>
  <tr>
    <td>Số điện thoại</td>
    <td><input type="text" name="phone" size="25" placeholder="Số điện thoại"/></td>
  </tr>
  <tr>
    <td>Email<font color="#FF0000"> * </font></td>
    <td><input type="text" name="email" size="25" placeholder="Email"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Đăng kí"/></td>
  </tr>
</table>
</fieldset>
</form>