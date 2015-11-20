<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
require_once("functions/products.php");
?>
<?php 
$product = new products();
$limit=2;
 $pid= $_GET['pid'];

if(isset($_GET['start'])){
	$start = $_GET['start'];
}else{
	$start = 0;
}
if(isset($_GET['totalpages'])){
	$totalpages = $_GET['totalpages'];
}else{
	$totalrecord = $product->numCom($pid);
	$totalpages = ceil($totalrecord/$limit);
}
$view=$product->getView($pid,$start,$limit);
	  if($view != NULL){
	  ?>
      <?php foreach($view as $item){ ?>
     <div class="viewname">
     <?php echo $item['cmt_name'];?>
      </div>
      <div class="viewdate">
     <?php echo $item['cmt_date'];?>
      </div>
       <div class="viewcontent">
     <?php echo $item['cmt_content'];?>       
      </div>
      <hr />
       
  <?php } ?>
       <div style=" margin-bottom:2px; width:713px; height:32px; float:left;">
      
  <?php
if($totalpages > 1){ // số trang phải từ 2 trang trở lên
	
	$current = ($start/$limit) + 1; // trang hiện hành
	if($current != 1){ // Nút prev
		$newstart = $start - $limit;
		$new=$current-1;
		$starthome=0;
		$newhome=1;
		echo "<a  class='current'href='".baseurl."?page=product&act=detail&pid=$pid&work=comment&start=$starthome&numpage=$newhome'>Hom</a>";
	
		echo "<a  class='current'href='".baseurl."?page=product&act=detail&pid=$pid&work=comment&start=$newstart&numpage=$new'>Pre</a>";
	}	
	for($i=1;$i<=$totalpages;$i++){
		
		if($i == $current&&$i==1)
		{  $newstart = ($i-1)*$limit;
		   $newstart1 = ($i)*$limit;
           $newstart2= ($i+1)*$limit;

		$new1=$current+1;
		$new2=$current+2;
		$k=$i+1;
		$l=$i+2;		
		echo "<span class='rightnow'>".$i."</span>";
		echo "<a class='current' href='".baseurl."/?page=product&act=detail&pid=$pid&work=comment&start=$newstart1&numpage=$new1'>".$k."</a>";
		echo "<a class='current' href='".baseurl."/?page=product&act=detail&pid=$pid&work=comment&start=$newstart2&numpage=$new2'>".$l."</a>"; }
		else
		if($i == $current&&$current>1 &&$current<$totalpages){
			$new=$current;
			$new1=$current-1;
			$new2=$current+1;
			$newstart = ($i-1 )*$limit;
			$newstart1 = ($i-2 )*$limit;
			$newstart2 = ($i)*$limit;
			$j=$i-1;
			$k=$i+1;
			
		echo "<a class='current' href='".baseurl."/?page=product&act=detail&pid=$pid&work=comment&start=$newstart1&numpage=$new1'>".$j."</a>";
		echo "<span class='rightnow'>".$i."</span>";
		echo "<a class='current' href='".baseurl."/?page=product&act=detail&pid=$pid&work=comment&start=$newstart2&numpage=$new2'>".$k."</a>";
		}else	
		if($i == $current&&$i==$totalpages)
		{  
		$new=$current+1;
		$new1=$current-2;
		$new2=$current-1;
		$k=$i-1;
		$l=$i-2;	
		$newstart = ($i-1 )*$limit;
		$newstart1 = ($i-3)*$limit;	
		$newstart2 = ($i-2)*$limit;		
		echo "<a class='current' href='".baseurl."/?page=product&act=detail&pid=$pid&work=comment&start=$newstart1&numpage=$new1'>".$l."</a>";
    	echo "<a class='current' href='".baseurl."/?page=product&act=detail&pid=$pid&work=comment&start=$newstart2&numpage=$new2'>".$k."</a>";
		echo "<span class='rightnow'>".$i."</span>";
		} 
	}

	if($current != $totalpages){ // Nút next
		$newstart = $start + $limit;
		$new=$current+1;
		$last=($totalpages-1)*$limit;
		echo "<a  class='current'href='".baseurl."/?page=product&act=detail&pid=$pid&work=comment&pages=$current&start=$newstart&numpage=$new'>Nex</a>";
		echo "<a  class='current'href='".baseurl."/?page=product&act=detail&pid=$pid&work=comment&pages=$current&start=$last&numpage=$totalpages'>Las</a>";
	}
	}
?>
      </div>   
      <hr />
  <?php } else { ?>
  <?php 
  echo "Chưa đánh giá sản phẩm ";
  
  }?>
  
  
</div>