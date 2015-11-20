<?php require_once("../functions/comments.php"); ?>
 <link href="styles/form.css" rel="stylesheet" type="text/css">
 <style type="text/css">
#table{
	border:1px solid #999;
	padding:10px 0px 0px 0px;
	height:400px;
	width:833px;
	margin:20px 0px 0px 80px;
	box-shadow:5px 2px 5px #999999;
	border-radius:5px;
}

table{
	border-collapse:collapse;
}
.pt{	
	margin-left:320px;
	margin-right:130px;
	margin-top:130px;
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
</style>
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
if(isset($_GET['act'])){
	$lo=$_GET['lo'];
if($lo=="new"){
	if(isset($_GET['start'])){
		if(isset($_POST['ok'])){
			$start=0;	
		}else
			$start=$_GET['start'];
	}
	$cmt=new comments();
	$data=array();
	$data=$cmt->showPronewOnepro($start,$limit);
	$totalpage=ceil($cmt->showPronewRow()/$limit);
	
	if(isset($_POST['ok'])){
		$spro=trim($_POST['products']);
		$scate=trim($_POST['categoris']);
		if($spro!=NULL||$scate!=NULL)
		header("location:".baseurl."admin/index.php?page=comments&act=searchp&lo=new&p=$spro&c=$scate");
	}
}elseif($lo=="old"){
		if(isset($_GET['start'])){
		if(isset($_POST['ok'])){
			$start=0;	
		}else
			$start=$_GET['start'];
	}
	$cmt=new comments();
	$data=array();
	$data=$cmt->showAllOnepro($start,$limit);
	$totalpage=ceil($cmt->showAllRow()/$limit);
	
	if(isset($_POST['ok'])){
		$spro=trim($_POST['products']);
		$scate=trim($_POST['categoris']);
		if($spro!=NULL||$scate!=NULL)
		header("location:".baseurl."admin/index.php?page=comments&act=searchp&lo=old&p=$spro&c=$scate");
	}
}else header("location:".baseurl."admin/index.php");
} 
?>
<div>
<div id="search" align="center">
<form  action="" method="post">

<input type="text" name="products" placeholder="Tìm kiếm theo products" />
<input type="text" name="categoris" placeholder="Tìm kiếm categories" />
 <input  type="submit" class="button" style="width:90px;height:30px;border-radius:20px;" name="ok" id="ok" value="search" />
 </form>
 </div>
<div id="title" align="center"><h3> Danh sách comment sản phẩm</h3></div>
<div id="table" align="center">
<table  width="405" border="1">
  <tr class="tile">
    <td width="30" height="25">stt</td>
    <td width="150">products</td>
    <td width="156">categoris</td>
    <td width="41">detail</td>
  </tr>
 <?php 
 if($data==NULL){
	echo "<tr><td align='center' colspan='4'>Không có comments mới</td></tr>";
  }else{
 	$stt=1;
 	foreach($data as $item){
 ?>
 	 <tr>
  	  	<td height="34"><?php echo $stt;?></td>
 	   <td><input style="width:170px;" disabled="disabled" value="<?php echo $item['pro_name'];?>" title="<?php echo $item['pro_name'];?>"></td>
   	 	<td><?php echo $item['cate_name']?> </td>
   		<td><a href="<?php if($lo=="new")echo baseurl."admin/index.php?page=comments&act=listcmt&lo=new&pid=".$item['pro_id'];
		else echo baseurl."admin/index.php?page=comments&act=listcmt&lo=old&pid=".$item['pro_id'];  ?>"><img src="images/eye.png" width="30" height="22" title="edit"></a></td>
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
			echo "<a href='".baseurl."admin?page=comments&act=list&lo=new&start=$newstart'>prev</a>";
		else echo "<a href='".baseurl."admin?page=comments&act=list&lo=old&start=$newstart'>prev</a>";
	}else echo "<a>prev</a>";
	for($i=0;$i<$totalpage;$i++){
		$start=0;
		$start=$i*$limit;
		if($current!=($i+1)){
			if($lo=="new")
				echo "<a  href='".baseurl."admin?page=comments&act=list&lo=new&start=$start'>".($i+1)."</a>";
			else echo "<a  href='".baseurl."admin?page=comments&act=list&lo=old&start=$start'>".($i+1)."</a>";
		}else{
			echo "<a id='current'>".($i+1)."</a>";	
		}
	}
	
	if($current < $totalpage){
	$newstart=$current*$limit;
	$newcurrent=$current+1;
	if($lo=="new")
		echo "<a href='".baseurl."admin?page=comments&act=list&lo=new&start=$newstart'>next</a>";
	else echo "<a href='".baseurl."admin?page=comments&act=list&lo=old&start=$newstart'>next</a>";
	}else echo "<a>next</a>";
}else echo "<a id='current'	>1</a>";
?></div></div>