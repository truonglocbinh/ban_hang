<?php require_once("../functions/orders.php");?>
<?php require_once("../functions/user.php");?>
<link href="../../styles/form.css" rel="stylesheet" type="text/css" />

<style type="text/css">
#table{
	border:1px solid #999;
	margin-top:20px;
	height:400px;
	width:680px;
	margin:0px 10px 0px 10px;
	box-shadow:5px 2px 5px #999999;
	border-radius:5px;

}

table{
	border-collapse:collapse;
}
.title{
	margin-top:50px;
	margin-bottom:10px;
}
.tile{
	background-color:#999;
}
#list{
	width:45px;
}
a{
	text-decoration:none;
}
#current{
	color:#F00;
}
#search{
	background-color:#0F3;
	height:70px;
	padding-top:10px;
	padding-left:10px;
}
#search input{
	height:30px;
	width:120px;
	margin-left:7px;
	border-radius:5px;
}
table input {
	border:0;
	height:27px;
	width:250px;
	background-color:#FAFAFA;
}
.pt{width:300px;
	margin-left:200px;
	margin-right:130px;
	margin-top:50px;
    box-shadow:5px 2px 5px #999999;
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
.duyet input{
	height:30px;
	width:70px;
	margin-top:10px;
}
#ttin{
	float:left;
	//display:none;
	width:70px;
	height:400px;
	background-color:#3F0
}
#lefto{
	float:left;
	margin-top:100px;
	border:1px solid #999;
	width:290px;
	height:400px;
	border-radius:5px;
}
#lefto select,input{
	height:27px;
	width:200px;
	margin-top:3px;
	border-radius:5px;
	background-color:#FFF;
	margin-top:5px;
	
}
label{
	display:inline-block;
	width:70px;
}
#righto{
	float:right;
	border:solid;
	width:700px;
	height:650px;	
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
<script type="text/javascript">
$(document).ready(function(e) {
    $(".del").click(function(){
		$d=$(this).attr("name");
		$(this).parent().parent().fadeOut("slow");
		$.ajax({
			"url": "modules/orders/del.php",
			"type": "POST",
			"data":"cid="+$d,
			async:false,
			success:function(result){	
			}
		});
	});
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
$sstart=0;
$limit=10;
if(isset($_GET['act'])){
	$lo=$_GET['lo'];
	$id=$_GET['pid'];
	$order=new orders();
	$m=array();
	$n=array();
	$errors="";
	$count=1;
	$data=array();
	$p=$_GET['p'];
	if($lo=="new"){
		if(isset($_GET['sstart'])){
			$sstart=$_GET['sstart'];
		}
		$data=$order->showNeworder($id,$p,$sstart,$limit);
		$totalpage=ceil($order->showNeworderRow($id,$p)/$limit);	
	 }elseif($lo=="old"){	 
		if(isset($_GET['sstart'])){
			$sstart=$_GET['sstart'];
		}
		$data=$order->showOldorder($id,$p,$sstart,$limit);
		$totalpage=ceil($order->showOldorderRow($id,$p)/$limit); 
	 }else header("location:".baseurl."admin/index.php");
	 if(isset($_POST['duyet'])){
		if($count==1) 
			$order->showProduct($id,$p);
			$order->updateHot($id,$p);
		header("location:".baseurl."admin/index.php?page=orders&act=list&lo=new");
	 }
	  if(isset($_POST['xem'])){
		$p=$_POST['sttorder'];
		header("location:".baseurl."admin/index.php?page=orders&act=listorder&lo=old&pid=".$id."&p=".$p);
	  }
	  if(isset($_POST['xoa'])){
		    $order = new orders();
			$order->delorder($id,$p);
			header("location:".baseurl."admin/index.php?page=orders&act=list&lo=old");
		}
	 $data1=array();
	 $user=new user();
	 $data1=$user->showOne($id);
	 $dem=$order->orderNum($id);
}

?>
<div>
<div id="lefto">
<h3 style="margin:20px 0px 20px 40px;">Thông tin người mua</h3>
<form action="" method="post">
<p><label>Tài khoản</label> <input type="text" name="user" disabled="disabled" value="<?php echo $data1['user_name']?>"/></p>
<p><label>Họ tên</label> <input type="text" name="fullname" disabled="disabled" value="<?php echo $data1['user_fullname']?>"/></p>
<p><label>Level</label> <input type="text" name="phone" disabled="disabled" value="<?php if($data1['user_gender']==1) echo "Nam"; else echo "Nữ"; ?>" /></p>
<p><label>Số ĐT</label>    <input type="text" name="phone" disabled="disabled" value="<?php echo $data1['user_phone']?>"/></p>
<p><label>Email</label>   <input type="text" name="email" disabled="disabled" value="<?php echo $data1['user_email']?>"/></p>
<p><label>Level</label> <input type="text" name="phone" disabled="disabled" value="<?php if($data1['user_level']==1) echo "Admin"; else echo "Member"; ?>" /></p>
<p><label>Tổng số đơn hàng</label>   <input type="text" name="email" disabled="disabled" value="<?php echo $dem; ?>"/></p>
<?php if($lo=="old"){
echo "<p><label>Đơn hàng thứ</label>	<select name='sttorder' >";
								$i=0;
								for($i=1;$i<=$dem;$i++){
								if($p==$i)
									echo "<option name='sttorder' value='$i' selected='selected'>$i</option>";
								else echo "<option name='sttorder' value='$i'>$i</option>";

								}
                                ?>
<?php echo "</select></p>

<p><input type='submit' style='margin:20px 0px 0px 90px;' class='button' name='xem' value='Xem'/></p>";
}?>
</form>
</div>
<div id="righto">
<div align="center" class="title"><h3>Danh sách sản phẩm mã đơn hàng : <?php echo "0".$data['0']['order_name']?></h3><br />
<?php echo "Người mua : <b>".$data['0']['user_name']."</b> -- Ngày mua :<b>".$data['0']['order_date']."</b>--Tổng tiền : <b>".$order->tongtien($id,$p)."</b><br>"; echo $errors;?>
</div>

<div id="table" align="center">

<table  class="table" width="682" border="1">
  <tr class="tile" align="center">
    <td width="48" height="31">stt</td>
    <td width="158">sản phẩm</td>
    <td width="129">giá</td>
    <td>Khuyến mãi</td>
    <td width="69">số lượng</td>
    <td width="168">thành tiền</td>
    <td width="70">xử lí</td>
  </tr>
 <?php 
 if($data==NULL){
	echo "<tr><td align='center' colspan='6'>Không có orders mới</td></tr>";
  }else{
	 $stt=1;
 	 foreach($data as $item){
 ?>
  <tr align="center">
    <td height="31"><?php echo $stt;?></td>
    <td><input style="width:130px;"  disabled="disabled" value="<?php echo $item['pro_name'];?>" title="<?php echo $item['pro_name'];?>" /></td>
    <td><?php echo $item['pro_price'];?></td>
    <td><?php $m=$order->sales($item['pro_id'],$item['order_date']); if($m!=NULL) echo $m['sale_percent']."%"; else echo 0;?></td>
    <td><?php  echo $item['order_number']?></td>
    <td><?php if($m!=NULL) echo ($item['order_number']*$item['pro_price']*(100-$m['sale_percent'])/100); else echo ($item['order_number']*$item['pro_price']); ?></td>
    <td><?php if($item['order_status']==0) echo "chờ duyệt"; else echo "đã duyệt";?></td>
  </tr>
  <?php 
  		if($item['order_number']>$item['pro_number']){
			$count=2;
			$n[$stt]=$item['pro_name'];
		}
		$stt++;
	}
   }
   ?>
</table>
</div>
<?php  echo "<div class='duyet' align='center'>
 <form action='' method='post'>";
if($lo=="new")	echo "<input type='submit' class='button' name='duyet' id='duyet' value='Duyệt' />";
echo "<input type='submit' class='button' name='xoa' value='Xóa' />
</form>
</div>"; ?>
<div class="pt" align="center"><?php //phan trang
if($totalpage >1){
	$current=($sstart/$limit +1);
	if($current>1){
		$newsstart=($current-2)*$limit;
		if($lo=="new")
			echo "<a href='".baseurl."admin/index.php?page=orders&act=listorder&lo=new&pid=$id&p=$p&sstart=$newsstart'>prev</a>";
		else echo "<a href='".baseurl."admin/index.php?page=orders&act=listorder&lo=old&pid=$id&p=$p&sstart=$newsstart'>prev</a>";
	}else echo "<a>prev</a>";
	for($i=0;$i<$totalpage;$i++){
		$sstart=0;
		$sstart=$i*$limit;
		if($current!=($i+1)){
			if($lo=="new")
				echo "<a  href='".baseurl."admin/index.php?page=orders&act=listorder&lo=new&pid=$id&p=$p&sstart=$sstart'>".($i+1)."</a>";
			else echo "<a  href='".baseurl."admin/index.php?page=orders&act=listorder&lo=old&pid=$id&p=$p&sstart=$sstart'>".($i+1)."</a>";
		}else{
			echo "<a id='current'>".($i+1)."</a>";	
		}
	}
	
	if($current < $totalpage){
	$newsstart=$current*$limit;
	$current=$current+1;
	if($lo=="new")
		echo "<a href='".baseurl."admin/index.php?page=orders&act=listorder&lo=new&pid=$id&p=$p&sstart=$newsstart'>next</a>";
	else echo "<a href='".baseurl."admin/index.php?page=orders&act=listorder&lo=old&pid=$id&p=$p&sstart=$newsstart'>next</a>";
	}else echo "<a>next</a>";
}else echo "<a id='current'	>1</a>";
?>
</div>
</div>
</div>

