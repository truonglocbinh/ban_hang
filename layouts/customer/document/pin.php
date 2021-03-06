<?php
require_once("functions/document/pin.php");
?>
<?php 
$limit = 4;
$pin=new pin();
if (isset($_GET['start'])) {
    $start = $_GET['start'];
} else {
    $start = 0;
}
if (isset($_GET['totalpages'])) {
    $totalpages = $_GET['totalpages'];
} else {
    $totalrecord = $pin->numPin();
    $totalpages = ceil($totalrecord / $limit);
}
?> 
<div id="homelink">
    <a href="<?php echo baseurl; ?>">Trang chủ</a> &raquo; <a href="<?php echo baseurl; ?>">Tài liệu kỹ thuật</a> &raquo; <a href="#">Tài liệu về PIN</a>
</div>
<div id="homecontent">
    <?php
    require_once("functions/document/pin.php");
    $pin = new pin();
    $data = $pin->getdata($start,$limit);
    foreach ($data as $x) {
    ?>
        <div id="doc_title">
            <h2>
            <?php
            echo $x['doc_title'];
            ?>
            </h2>
        </div>
        <div id="doc_summary">
            <?php
            echo $x['doc_summary']."...";
            ?>
        </div>
        <div id="readmore">
            <a href="<?php echo baseurl . "?page=document&act=detail&id=$x[doc_id]"; ?>"><img src="images/news/readmore.png" width="90px"></a>
        </div>
    <?php
    }
    ?>
    <div class="page">
            <?php
        
if($totalpages > 1){ // số trang phải từ 2 trang trở lên
	$current = ($start/$limit) + 1; // trang hiện hành
	if($current != 1){ // Nút prev
		$newstart = $start - $limit;
		echo "<a class='current' href='".baseurl."?page=document&sub=pin&start=$newstart'>Prev</a>";
	}
	for($i=1;$i<=$totalpages;$i++){
		$newstart = ($i - 1)*$limit;
		if($i == $current){
			echo "<span class='rightnow'>".$i."</span>";
		}else{
			echo "<a class='current' href='".baseurl."?page=document&sub=pin&start=$newstart'>".$i."</a>";
		}
	}
	if($current != $totalpages){ // Nút next
		$newstart = $start + $limit;
		echo "<a class='current' href='".baseurl."?page=document&sub=pin&start=$newstart'>Next</a>";
	}
}
?>
        </div>
</div>