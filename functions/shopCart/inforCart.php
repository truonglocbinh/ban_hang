<?php //session_start(); ?>
<?php require("functions/orders.php");?>
<?php require("functions/user.php");?>
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

#table input {
	border:0;
	height:27px;
	width:250px;
	background-color:#FFF;
}
.pt{	
	margin-left:150px;
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
.lefto{
	margin:30px 0px 20px 200px;
	border:1px solid #999;
	width:290px;
	height:400px;
	border-radius:5px;
}
#ip{
	height:27px;
	width:200px;
	margin-top:3px;
	border-radius:5px;
	background-color:#FFF;
	margin-top:5px;
	
}
.lefto label{
	display:inline-block;
	width:70px;
}
#righto{
	margin-left:20px;
	border:1px solid;
	width:700px;
	height:650px;	
	border-radius:5px;
}
</style>
<script type="text/javascript">
$(document).ready(function(e) {

     $("td").mouseover(function(e) {
        $(this).children().css("background-color","#CCC");
    }),
	$("td").mouseout(function(e){
		$(this).children().css("background-color","#FFF")	
	})
	;
});
</script>
<?php 
$sstart=0;
$limit=10;
if(isset($_GET['page'])){
	$user=new user();
	$id=$_SESSION['ses_userid'];
	$data1=array();
	$data1=$user->showOne($id);
	$order=new orders();
	$dem=$order->orderNum($id);
	$m=array();
	$data=array();
	if(isset($_GET['sstart'])){
		$sstart=$_GET['sstart'];
	}
	if($dem>0){
		if(isset($_GET['p']))
			$p=$_GET['p'];
		else
			$p=$dem;
		$data=$order->showNeworder($id,$p,$sstart,$limit);
		$totalpage=ceil($order->showNeworderRow($id,$p)/$limit);
	}
	  if(isset($_POST['xem'])){
		$p=$_POST['sttorder'];
		header("location:".baseurl."index.php?page=order&p=".$p);
	  }
	 
	 
}

?>
<div>
<div class="lefto">
<h3 >Thông tin người mua</h3>
<form action="" method="post">
<p><label>Tài khoản</label> <input id="ip" type="text" name="user" disabled="disabled" value="<?php echo $data1['user_name']?>"/></p>
<p><label>Họ tên</label> <input id="ip" type="text" name="fullname" disabled="disabled" value="<?php echo $data1['user_fullname']?>"/></p>
<p><label>Level</label> <input id="ip" type="text" name="phone" disabled="disabled" value="<?php if($data1['user_gender']==1) echo "Nam"; else echo "Nữ"; ?>" /></p>
<p><label>Số ĐT</label>    <input id="ip" type="text" name="phone" disabled="disabled" value="<?php echo $data1['user_phone']?>"/></p>
<p><label>Email</label>   <input id="ip" type="text" name="email" disabled="disabled" value="<?php echo $data1['user_email']?>"/></p>
<p><label>Level</label> <input id="ip" type="text" name="phone" disabled="disabled" value="<?php if($data1['user_level']==1) echo "Admin"; else echo "Member"; ?>" /></p>
<p><label>Tổng số đơn hàng</label>   <input id="ip" type="text" name="email" disabled="disabled" value="<?php echo $dem; ?>"/></p>
<?php 
echo "<p><label>Đơn hàng thứ</label>	<select id='ip' name='sttorder' >";
								$i=0;
								for($i=1;$i<=$dem;$i++){
								if($p==$i)
									echo "<option name='sttorder' value='$i' selected='selected'>$i</option>";
								else echo "<option name='sttorder' value='$i'>$i</option>";
								}?>
<?php echo "</select></p>

<p><input type='submit' style='width:70px;margin-left:80px;margin-top:20px;' name='xem' value='Xem'/></p>";
?>
</form>
</div>
<div id="righto">
<div align="center" class="title" style="margin-bottom:20px"><h3>Danh sách sản phẩm mã đơn hàng : <?php if($data!=NULL) echo "0".$data['0']['order_name']?></h3><br />
<?php if($data!=NULL) echo "Người mua : <b>".$data['0']['user_name']."</b> -- Ngày mua :<b>".$data['0']['order_date']."</b>--Tổng tiền : <b>".$order->tongtien($id,$p)."</b>";?>
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
	echo "<tr><td align='center' colspan='7'>Không có orders</td></tr>";
  }else{
	 $stt=1; $count=0;
 	 foreach($data as $item){
 ?>
  <tr align="center">
    <td height="31"><?php echo $stt;?></td>
    <td><input style="width:130px;"  disabled="disabled" value="<?php echo $item['pro_name'];?>" title="<?php echo $item['pro_name'];?>" /></td>
    <td><?php echo $item['pro_price'];?></td>
    <td><?php $m=$order->sales($item['pro_id'],$item['order_date']); if($m!=NULL) echo $m['sale_percent']; else echo 0;?></td>
    <td><?php echo $item['order_number']?></td>
    <td><?php if($m!=NULL) echo ($item['order_number']*$item['pro_price']*(100-$m['sale_percent'])/100); else echo ($item['order_number']*$item['pro_price']); ?></td>
    <td><?php if($item['order_status']==0) echo "chờ duyệt"; else echo "đã duyệt";?></td>
  </tr>
  <?php $stt++;
  		$count=$count+($item['order_number']*$item['pro_price']);
	}
   }
   ?>
</table>
</div>
<div class="pt" align="center"><?php //phan trang
if($totalpage >1){
	$current=($sstart/$limit +1);
	if($current>1){
		$newsstart=($current-2)*$limit;
			echo "<a href='http://localhost/bksun/index.php/?page=order&p=$p&sstart=$newsstart'>prev</a>";
	}else echo "<a>prev</a>";
	for($i=0;$i<$totalpage;$i++){
		$sstart=0;
		$sstart=$i*$limit;
		if($current!=($i+1)){
			 echo "<a  href='http://localhost/bksun/admin/index.php?page=order&p=$p&sstart=$sstart'>".($i+1)."</a>";
		}else{
			echo "<a id='current'>".($i+1)."</a>";	
		}
	}
	
	if($current < $totalpage){
	$newsstart=$current*$limit;
	$current=$current+1;
	 echo "<a href='http://localhost/bksun/admin/index.php?page=order&p=$p&sstart=$newsstart'>next</a>";
	}else echo "<a>next</a>";
}
?>
</div>
</div>
</div>

