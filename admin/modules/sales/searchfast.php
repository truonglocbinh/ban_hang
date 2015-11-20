<?php
require '../../../database/cauhinh.php';
require '../../../database/database.php';
require '../../../database/products.php';
$id=  trim($_POST['id']);
$pro=new products();
$data=$pro->showOne($id);
if($data!= NULL){?>
<table>
    <tr><td>Mã sản phẩm</td></tr>
    <tr><td><?php echo $data['pro_id']; ?></td></tr>
    <tr><td>Tên</td></tr>
    <tr><td><?php echo $data['pro_name']; ?></td></tr>
    <tr><td>Gía</td></tr>
    <tr><td><?php echo $data['pro_price']; ?> VNĐ</td></tr>
    <tr><td>Số lượng</td></tr>
    <tr><td><?php echo $data['pro_number']; ?></td></tr>
</table>
 
<?php }else{
    echo 'Không tìm thấy';
}?>


