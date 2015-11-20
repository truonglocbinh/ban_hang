<?php require_once("../functions/orders.php"); ?>
<style type="text/css">
.table{
	border:1px solid #999;
	padding-top:20px;
	height:450px;
	width:600px;
	margin:20px 0px 0px 50px;
	box-shadow:5px 2px 5px #999999;
	border-radius:5px;
}
table{
	border-collapse:collapse;

}
.title{
	margin-top:50px;
}
.tile{
	background-color:#CCC;
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
.search{
	background-color:#0F3;
	height:70px;
	padding-top:10px;
	padding-left:10px;
}
.search input{
	height:30px;
	width:120px;
	margin-left:7px;
	border-radius:5px;
}
#lefto input{
	height:30px;
	width:120px;
	margin-top:5px;
	border-radius:5px;
}
table input {
	height:27px;
	width:150px;
	background-color:#FAFAFA;
}
.pt{
	width:300px;
	height:30px;
	margin-left:210px;
	margin-right:130px;
	margin-top:30px;
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
table input{
	border:0;
}
#lefto{
	float:left;
	border:1px solid #999;
	margin-top:100px;
	width:290px;
	height:400px;
}
#righto{
	float:right;
	border:solid;
	//background-color:#FF0;
	width:700px;
	height:650px;	
}
#lefto label{
	display:inline-block;
	width:120px;
	margin-top:20px;
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
<script>
    $(function() {
        $("#datepicker,#datepicke,#datepick").datepicker({
            showOn: "button",
            buttonImage: "images/iconCalendar.gif",
            buttonImageOnly: true,
            "dateFormat": "yy-mm-dd"
        });
    });
</script>
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
$data2="";
if(isset($_GET['act'])){
	$lo=$_GET['lo'];
	$loi="";
	if($lo=="new"){
		if(isset($_GET['start'])){
			if(isset($_POST['ok'])){
				$start=0;	
			}else
				$start=$_GET['start'];
		}
		
	$order=new orders();
	$data=array();
	$data=$order->showNewoderName($start,$limit);
	$totalpage=ceil($order->showNewoderRow()/$limit);
	if(isset($_POST['ok'])){
		$suser=trim($_POST['suser']);
		$sms=trim($_POST['sms']);
		$sdate=trim($_POST['sdate']);
		if($suser!=NULL||$sms!=NULL||$sdate!=NULL)
			header("location:".baseurl."admin/index.php?page=orders&act=search&lo=new&u=$suser&ds=$sms&d=$sdate");
	}
}elseif($lo=="old"){
		if(isset($_GET['start'])){
		if(isset($_POST['ok'])){
			$start=0;	
		}else
			$start=$_GET['start'];
		}
	$order=new orders();
	$data=array();
	$data=$order->showOldoderName($start,$limit);
	$totalpage=ceil($order->showOldoderRow()/$limit);
	
	if(isset($_POST['ok'])){
		$suser=trim($_POST['suser']);
		$sms=trim($_POST['sms']);
		$sdate=trim($_POST['sdate']);
		if($suser!=NULL||$sms!=NULL||$sdate!=NULL)
			header("location:".baseurl."admin/index.php?page=orders&act=search&lo=old&u=$suser&ds=$sms&d=$sdate");
	}
}else header("location:".baseurl."admin/index.php");
	
	/*$data1=array();
	$user=new users();
	$data1=$user->showOne();*/	
	if(isset($_POST['thongke'])){
			$datestart=$_POST['sdatestart'];
			$dateend=$_POST['sdateend'];
		if(($datestart!=NULL)&&($dateend!=NULL)){
			$sl=$_POST['soluong'];
			$tt=$_POST['tongtien'];
			$data2=$order->statisOrder($datestart,$dateend);
			$loi="";
		}else {$loi="Nhập đủ ngày bắt đầu, kết thúc";
		}
	}
}
?>
<div class="search" align="center">
<form action="" method="post">
<input type="text" name="suser" placeholder="tìm kiếm người mua" />
<input type="text" name="sms" placeholder="tìm kiếm đơn hàng số" />
<input type="text" id="datepicker" name="sdate" class="input" placeholder="Ngày nhập hàng" value="<?php if (isset($_POST['date'])) echo $_POST['date']; ?>" >
<input type="submit" class="button" style="width:70px;border-radius:20px;" name="ok" value="search" />
</form>
</div>
<div>

<div id="lefto">
<h3 style="margin:20px 0px 20px 90px;">Thống kê</h3>
<h4 align="center" style="color:#F00"><?php echo $loi; ?></h4>
<form action="" method="post">
<p><label>Ngày bắt đầu</label><input type="text" id="datepicke" name="sdatestart" class="input" placeholder="Ngày nhập hàng" value="<?php if (isset($_POST['sdatestart'])) echo $_POST['sdatestart']; ?>" ></p>
<p><label>Ngày kết thúc</label><input type="text" id="datepick" name="sdateend" class="input" placeholder="Ngày nhập hàng" value="<?php if (isset($_POST['sdateend'])) echo $_POST['sdateend']; ?>" ></p>
<p><label>Số lượng đơn hàng</label><input type="text" name="soluong" placeholder="Số lượng đơn hàng" value="<?php if(isset($_POST['sdatestart'])&&isset($_POST['sdateend'])) if(($_POST['sdatestart']!=NULL)&&($_POST['sdateend']!=NULL)) echo $data2;?>"></p>
<p><label>Tổng tiền thu vào</label><input type="text" name="tongtien" placeholder="Tổng tiền thu vào" value="<?php if(isset($_POST['sdatestart'])&&isset($_POST['sdateend'])) if(($_POST['sdatestart']!=NULL)&&($_POST['sdateend']!=NULL))echo $order->thongketien($datestart,$dateend); ?>"></p>
<p><input type="submit" class="button" name="thongke" style="width:70px;height:27px;margin:20px 0px 0px 100px;border-radius:20px;" value="Thống kê"></p>
</form>
</div>
<div id="righto">
<div class="title" align="center"><h3> Danh sách khách hàng order</h3>
</div>
<div class="table" align="center">
<table  width="432" border="1">
  <tr class="tile">
    <td width="25" height="30">stt</td>
    <td width="63">Đơn hàng</td>
    <td width="146" align="center">Người mua</td>
    
    <td width="126">Ngày tháng</td>
    <td width="38">detail</td>
  </tr>
 <?php 
 if($data==NULL){
	echo "<tr><td align='center' colspan='5'>Không có orders mới</td></tr>";
  }else{
 	$stt=1;
 	foreach($data as $item){
 ?>
 	 <tr>
  	  	<td height="41" align="center"><?php echo $stt;?></td>
        <td align="center"><?php echo $item['order_name'];?></td>
   	 	<td><input style="width:130px;"  disabled="disabled" value="<?php echo $item['user_name'];?>" title="<?php echo $item['user_name'];?>"/></td>
        
        <td><?php echo $item['order_date'];?></td>
   		<td><a href="<?php if($lo=="new") echo baseurl."admin/index.php?page=orders&act=listorder&lo=new&pid=".$item['user_id']."&p=".$item['order_notice']; 									else	echo baseurl."admin/index.php?page=orders&act=listorder&lo=old&pid=".$item['user_id']."&p=".$item['order_notice'];?>"><img src="images/eye.png" width="30" height="22" title="detail"></a></td>
 	 </tr>
  <?php $stt++;

   }}?>
</table>
</div>
<div class="pt" align="center"><?php 
if($totalpage >1){
	$current=($start/$limit +1);
	if($current>1){
		$newstart=($current-2)*$limit;
		if($lo=="new")
			echo "<a href='".baseurl."admin?page=orders&act=list&lo=new&start=$newstart'>prev</a>";
		else echo "<a href='".baseurl."admin?page=orders&act=list&lo=old&start=$newstart'>prev</a>";
	}else echo "<a>prev</a>";
	for($i=0;$i<$totalpage;$i++){
		$start=0;
		$start=$i*$limit;
		if($current!=($i+1)){
			if($lo=="new")
				echo "<a  href='".baseurl."admin?page=orders&act=list&lo=new&start=$start'>".($i+1)."</a>";
			else echo "<a  href='".baseurl."admin?page=orders&act=list&lo=old&start=$start'>".($i+1)."</a>";
		}else{
			echo "<a id='current'>".($i+1)."</a>";	
		}
	}
	
	if($current < $totalpage){
	$newstart=$current*$limit;
	$newcurrent=$current+1;
	if($lo=="new")
		echo "<a href='".baseurl."admin?page=orders&act=list&lo=new&start=$newstart'>next</a>";
	else echo "<a href='".baseurl."admin?page=orders&act=list&lo=old&start=$newstart'>next</a>";
	}else echo "<a>next</a>";
}else echo "<a id='current'	>1</a>";
?></div>
</div>
</div>

