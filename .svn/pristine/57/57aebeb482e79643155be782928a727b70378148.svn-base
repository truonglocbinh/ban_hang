<?php require("../functions/user.php");?>
<link href="styles/form.css" rel="stylesheet" type="text/css">
<style type="text/css">
#search{	
	background-color:#0F6;
	height:70px;
	padding-top:10px;
	padding-left:10px;
}
.table{
	padding:50px 50px 50px 150px;
	width: 700px;
	height: 200px;
	border-radius:10px;
}

table{
  border: 1px solid #dddddd;
  border-collapse: collapse;
  border-radius: 4px;
  box-shadow:10px 10px 10px #999999;

}
#tile{
	height:15px;
	margin-top:20px;
}
.title{
	background-color:#CCC 
}
a{
	text-decoration:none
}
.pt{	
	margin-left:350px;
	margin-right:130px;
	margin-top:250px;
    box-shadow:5px 2px 5px #999999;
}

#current{
	color:#F33
}
.pt a{  
	border:1px solid #666666;
	padding-top:1px; 
	padding-left:4px;
	padding-right:4px;
	margin-left:2px;
	border-radius:3px;
}
td:hover{
	background-color:#CCC;
}
.table input{
	height:31px;
}
#search input{
	width:120px;
	height:30px;
}
td input{
	border:0;
	background-color:#FAFAFA;
	color:#000
}
</style><body>
<script type="text/javascript">
	$(document).ready(function(e) {
     $("td").mouseover(function(e) {
        $(this).children().css("background-color","#CCC");
    }),
	$("td").mouseout(function(e){
		$(this).children().css("background-color","#FAFAFA")	
	})
	;
    });
</script>
<?php 
	$start=0;
	$limit=10;
	$user = new user();
	
if(isset($_GET['act'])){
	$data=array();
	$suser= $_GET['u'];
	$sname= $_GET['n'];
	$sgender= $_GET['g'];
	$sphone= $_GET['p'];
	$semail= $_GET['e'];
	$slevel= $_GET['l'];
	if(isset($_GET['start'])){
		if(isset($_POST['ok'])){
		}else{
			$start=$_GET['start'];
		}
	}
	$data=$user->search($suser,$sname,$sgender,$sphone,$semail,$slevel,$start,$limit);
	$title="DANH SÁCH TÌM KIẾM THÀNH VIÊN";
	$totalpage=ceil($user->numRowSearch($suser,$sname,$sgender,$sphone,$semail,$slevel)/$limit);
	if(isset($_POST['ok'])){	
			$suser=$_POST['suser'];
			$sname=$_POST['sname'];
			$sgender=$_POST['sgender'];
			$sphone=$_POST['sphone'];
			$semail=$_POST['semail'];
			$slevel=$_POST['slevel'];
			if($suser!=NULL||$sname!=NULL||$sgender!=0||$sphone!=NULL||$semail!=NULL||$slevel!=0)
			header("location:".baseurl."admin/index.php?page=user&act=search&u=$suser&n=$sname&g=$sgender&p=$sphone&e=$semail&l=$slevel");	
	}
}

?>
<div id="search" align="center">
<form  action="" method="post">
<input type="text" name="suser" placeholder="search user" />
<input type="text" name="sname" placeholder="search fullname" />
<select style="width:90px;height:27px;" name="sgender">gender
	<option name="gender" value=0>giới tính</option>
	<option name="gender" value=1>nam</option>
    <option name="gender" value=2>nữ</option>
</select>
<input type="text" name="sphone" placeholder="search phone" />
<input type="text" name="semail" placeholder="search email" />
<select style="width:90px;height:27px;" name="slevel">gender
	<option name="slevel" value=0>Level</option>
	<option name="slevel" value=1>Admin</option>
    <option name="slevel" value=2>Member</option>
</select>
<input type="submit" class="button" name="ok" style="height:30px;width:90px;border-radius:20px;" value="search"  />
</form>
</div>

<div id="tile"><h3 align='center'>
<?php echo $title;?>
</h3></div>

<div class="table">	
<table width="740" border="1">
 <tr class="title">
    <td width="31" height="29">STT</td>
    <td width="105">Tài khoản</td>
    <td width="148">Họ tên</td>
    <td width="62">Giới tính</td>
    <td width="66">Số ĐT</td>
    <td width="145">Email</td>
    <td width="51">Level</td>
    <td width="56">Cập nhật</td>
    <td width="30">Xóa</td>
  </tr>
   <?php  
   if($data==NULL) 
	echo "<tr style='height:30px;'><td align='center' colspan='9'><h3>Không có khách hàng</h3></td></tr>"; 
	else{
  $stt =1;
  foreach($data as $temp){
	  ?>
  <tr class="tr">
    <td height="33"><?php echo $stt; ?></td>
    <td><input style="width:100px;" disabled="disabled" value="<?php echo $temp['user_name'];?>" title="<?php echo $temp['user_name'];?>"/></td>
    <td><input disabled="disabled" value="<?php echo $temp['user_fullname'] ;?>" title="<?php echo $temp['user_fullname'] ;?>"/></td>
    <td><?php if($temp['user_gender']==1) {echo "Nam";} else{echo "Nữ";}?></td>
    <td><?php echo $temp['user_phone'];?></td>
    <td><input disabled="disabled" style="border:0" value="<?php echo $temp['user_email']; ?>" title="<?php echo $temp['user_email']; ?>" /></td>
    <td><?php if($temp['user_level']==1)echo "Admin"; else echo "Member";?></td>
    <td align="center"><a href="<?php echo baseurl;?>admin?page=user&act=edit&id=<?php echo $temp['user_id']?>"><img src="images/eye.png" width="30" height="22" title="edit"></a></td>
    <td><a class="del" name="<?php echo $temp['user_id']?>" href="javascript:void(0)"><img src="images/trash.png" width="30" height="22" title="del"></a></td>
  </tr>
  <?php $stt++; }}?>
</table>

</div>
<div class="pt" align="center"><?php 
if($totalpage >1){
	$current=($start/$limit +1);
	
	if($current>1){
		$newstart=($current-2)*$limit;
		echo "<a href='".baseurl."admin/index.php?page=user&act=search&u=$suser&n=$sname&g=$sgender&p=$sphone&e=$semail&l=$slevel&start=$newstart'>prev</a>";
	}else echo "<a>prev</a>";
	
	for($i=0;$i<$totalpage;$i++){
		$start=0;
		$start=$i*$limit;
		if($current!=($i+1)){
			echo "<a  href='".baseurl."admin/index.php?page=user&act=search&u=$suser&n=$sname&g=$sgender&p=$sphone&e=$semail&l=$slevel&start=$start'>".($i+1)."</a>";
		}else{
			echo "<a id='current'>".($i+1)."</a>";	
		}
	}
	
	if($current < $totalpage){
	$newstart=$current*$limit;
	//$newcurrent=$current+1;
	echo "<a href='".baseurl."admin/index.php?page=user&act=search&u=$suser&n=$sname&g=$sgender&p=$sphone&e=$semail&l=$slevel&start=$start'>next</a>";	
	}else echo "<a>next</a>";
}else echo "<a id='current'	>1</a>"
?></div>
