<h3>Giỏ Hàng Của Bạn</h3>
        
<div style="height:30px"></div>
<?php
if($_GET['act']=="addToCart"){
	require("addToCart.php");
}
require("updateCart.php");
//if(!isset($_SESSION['sum'])) $_SESSION['sum'] = 0;
?>
<form action="" method="post">
<table width="673" border="0">
  <tr>
    <td width="180" class="title">Hình ảnh</td>
    <td width="117" class="title">Đơn giá(VND)</td>
    <td width="123" class="title">Số lượng</td>
    <td width="156" class="title">Thành tiền(VND)</td>
    <td width="75" class="title">Xoá</td>
  </tr>
  <?php $sum = 0;
  		$val =array();
  		if(isset($_SESSION['cart']) && $_SESSION['cart'] != NULL){ ?>
  <?php foreach($_SESSION['cart'] as $key => $val){ ?>
  <tr>
    <td>
    	<img src="<?php echo baseurl."images/products/".$val['image']; ?>" width="90" />
        <h3><?php echo $val['name']; ?></h3>
    </td>
    <td><?php echo $val['price']; ?></td>
    <td><input type="text" name="qty[<?php echo $key; ?>]" value="<?php echo $val['qty']; ?>" size="5" /></td>
    <td><?php $sumPrice=$val['qty']*$val['price']; echo $sumPrice; ?></td>
    <td><a href="<?php echo baseurl."?page=delCart&pid=".$key; ?>">Delete</a></td>
  </tr>
  <?php $sum= $sum + $sumPrice; /*$_SESSION['sum'] = $_SESSION['sum'] + 1;*/ } }else{ ?>
  <tr>
    <td colspan="5" height="70">Giỏ hàng của bạn hiện tại không có gì!</td>
  </tr>
  <?php } ?>
  <tr>
  	<td colspan="3" style="font-weight:bold">Tổng tiền:</td>
    <td style="font-weight:bold"><?php echo number_format($sum); ?></td>
  </tr>
  
</table>
	<input style="font-weight:bold" type="submit" name="update" value="Cập nhật" style="margin-top:10px;padding:3px 5px" />

    <input style="font-weight:bold" type="submit" name="order" value="Đặt hàng" style="margin-top:10px;padding:3px 5px" />
    <?php require("orders.php");?>
</form>
<div style="height:30px"></div>
<a href="<?php echo baseurl."?page=delCart&type=all";?>" style="font-weight:bold">Xoá giỏ hàng</a> <a href="<?php echo baseurl;?>" style="margin-left:20px;font-weight:bold">Mua thêm hàng</a>

