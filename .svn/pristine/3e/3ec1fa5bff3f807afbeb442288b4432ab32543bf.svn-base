<?php require_once("../functions/comments.php");?>
 <link href="styles/form.css" rel="stylesheet" type="text/css">
<style type="text/css">
#table{
	border:1px solid #999;
	padding:0px 0px 0px 0px;
	height:400px;
	width:833px;
	margin:20px 0px 0px 80px;
	box-shadow:5px 2px 5px #999999;
	border-radius:5px;
}

table{
	border-collapse:collapse;
}
#title{
	margin-top:50px;
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
.pt a{
	border:1px solid #666666;
	padding-top:1px; 
	padding-left:4px;
	padding-right:4px;
	margin-left:2px;
	border-radius:3px;
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
table input {
	border:0;
	height:60px;
	width:155px;
	background-color:#FFF;
}
.pt{	
	margin-left:350px;
	margin-right:130px;
	margin-top:70px;
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
td input{
	outline:none;
	border:0;
	background-color:#FAFAFA;
}
</style>
<script>
    $(function() {
        $("#datepicker").datepicker({
            showOn: "button",
            buttonImage: "images/iconCalendar.gif",
            buttonImageOnly: true,
            "dateFormat": "yy-mm-dd"
        });
    });
</script>
<script type="text/javascript">
$(document).ready(function(e) {
    $(".del").click(function(){
		$d=$(this).attr("name");
		$(this).parent().parent().fadeOut();
		$.ajax({
			"url": "modules/comments/del.php",
			"type": "POST",
			"data":"cid="+$d,
			async:false,
			success:function(result){
				alert(result);	
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
$limit=5;
if(isset($_GET['act'])){
$lo=$_GET['lo'];
$id=$_GET['pid'];
$cmt=new comments();
$data=array();
$data2=array();
$data2=$cmt->showPro($id);
if($lo=="new"){
	if(isset($_GET['sstart'])){
		$sstart=$_GET['sstart'];
	}
	$data=$cmt->showNewcmt($id,$sstart,$limit);
	$totalpage=ceil($cmt->showNewcmtRow($id)/$limit);	
}elseif($lo=="old"){
	if(isset($_GET['sstart'])){
		
		$sstart=$_GET['sstart'];
	}
	$data=$cmt->showOldcmt($id,$sstart,$limit);
	$totalpage=ceil($cmt->showOldcmtRow($id)/$limit);	
}

} 
if(isset($_POST['duyet'])){
  	$cmt->updateHot($id);
	header("location:".baseurl."admin/index.php?page=comments&act=list&lo=new");
}
if(isset($_POST['ok'])){
	$suser=trim($_POST['suser']);
	$scmt=trim($_POST['scmt']);
	$svote=$_POST['svote'];
	$sdate=trim($_POST['sdate']);
	if($suser!=NULL||$scmt!=NULL||$svote!=NULL||$sdate!=NULL)
		if($lo=="new") header("location:".baseurl."admin/index.php?page=comments&act=searchcmt&lo=new&pid=$id&u=$suser&c=$scmt&v=$svote&d=$sdate");
		else header("location:".baseurl."admin/index.php?page=comments&act=searchcmt&lo=old&pid=$id&u=$suser&c=$scmt&v=$svote&d=$sdate");
}
?>
<div id="search" align="center">
<form action="" method="post">
<input type="text" name="suser" placeholder="Tìm kiếm theo username" />
<input type="text" name="scmt" placeholder="Tìm kiếm comments" />
<select name="svote" style="width:90px;">
	<option name="svote" value=0>đánh giá</option>
    <option name="svote" value=1>xấu</option>
    <option name="svote" value=2>bình thường</option>
    <option name="svote" value=3>tốt</option>
</select>
<input type="text" name="sdate" id="datepicker" placeholder="Tìm kiếm date" />
<input style="width:90px;height:30px;border-radius:20px;" class="button" type="submit" name="ok" value="search" />
</form>
</div>
<div align="center" id="title" ><h3>Danh sách comments mới</h3></div>
<div align="center" ><?php echo $data2['pro_name']." loại ".$data2['cate_name'];?></div>
<div id="table">
<table width="832" height="118" border="1">
  <tr class="tile">
    <td width="37" height="36">stt</td>
    <td width="151">username</td>
    <td width="360">comments</td>
    <td width="79">vote</td>
    <td width="130">date</td>
    <td width="35">del</td>
  </tr>
 <?php 
 if($data==NULL){
	echo "<tr><td align='center' colspan='6'>Không có comments</td></tr>";
  }else{
	 $stt=1;
 	 $pro_name="";
 	 foreach($data as $item){
 ?>
  <tr>
    <td height="74"><?php echo $stt;?></td>
    <td><input  type="text" disabled="disabled" value="<?php echo $item['cmt_name'];?>" title="<?php echo $item['cmt_name'];?>"/></td>
    <td title="<?php echo $item['cmt_content']?>"><div style="width:360px;height:70px;overflow:scroll;"><?php echo $item['cmt_content']?></div></td>
    <td><?php if($item['cmt_vote']==1) echo "Xấu"; elseif($item['cmt_vote']==2) echo "Bình thường"; else echo "Tốt"; ?></td>
    <td><?php echo $item['cmt_date']?></td>
    <td ><a class="del" name="<?php echo $item['cmt_id'];?>" href="javascript:void(0)"><img src="images/trash.png" width="30" height="22" title="del"><a></td>
  </tr>
  <?php $stt++;
   }}?>
</table>
</div>
<?php if($lo=="new") echo "<div class='duyet' align='center'>
 <form action='' method='post'>
	<input type='submit' style='width:90px;height:30px;border-radius:20px;' class='button' name='duyet' id='duyet' value='Duyệt' /> 
</form>
</div>"?>
<div class="pt" align="center"><?php //phan trang
if($totalpage >1){
	$current=($sstart/$limit +1);
	if($current>1){
		$newsstart=($current-2)*$limit;
		if($lo=="new")
			echo "<a href='".baseurl."admin?page=comments&act=listcmt$lo=new&pid=$id&sstart=$newsstart'>prev</a>";
		else echo "<a href='".baseurl."admin?page=comments&act=listcmt$lo=old&pid=$id&sstart=$newsstart'>prev</a>";
	}else echo "<a>prev</a>";
	for($i=0;$i<$totalpage;$i++){
		$sstart=0;
		$sstart=$i*$limit;
		if($current!=($i+1)){
			if($lo=="new")
				echo "<a  href='".baseurl."admin?page=comments&act=listcmt&lo=new&pid=$id&sstart=$sstart'>".($i+1)."</a>";
			else echo "<a  href='".baseurl."admin?page=comments&act=listcmt&lo=old&pid=$id&sstart=$sstart'>".($i+1)."</a>";
		}else{
			echo "<a id='current'>".($i+1)."</a>";	
		}
	}
	
	if($current < $totalpage){
		$newsstart=$current*$limit;
		$newcurrent=$current+1;
		if($lo=="new")
			echo "<a href='".baseurl."admin?page=comments&act=listcmt$lo=new&pid=$id&sstart=$newsstart'>next</a>";
		else echo "<a href='".baseurl."admin?page=comments&act=listcmt$lo=old&pid=$id&sstart=$newsstart'>next</a>";
	}else echo "<a>next</a>";
}else echo "<a id='current'	>1</a>";
?></div>

</body>
</html>
