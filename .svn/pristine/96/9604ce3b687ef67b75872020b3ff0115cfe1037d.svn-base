<?php
require '../../../database/cauhinh.php';
require '../../../database/database.php';
require '../../../database/products.php';
require '../../../database/sales.php';
$sale=new sales();
$pro=new products();
$id=$_POST['id'];
$data=$sale->showOne($id);
if(empty($data)){
echo '1';}  else {
    ?>
        <tr>
            <td><input type="checkbox" name="myCheckboxes[]" class="case" value="<?php echo $data['sale_id']; ?>" /></td>
            <td><?php echo $data['sale_id'];?></td>
            <td><?php echo $pro->getName($data['pro_id']) ;?></td>
            <td><?php               
           $prodata=$pro->showOne($data['pro_id']);
           if($prodata != NULL){
               echo $prodata['pro_number'];
           }else echo "Không rõ";
        ?>
           </td>
            <td><?php echo $data['sale_percent'];?></td>
            <td><?php echo $data['sale_price'];?></td>
            <td><?php echo strftime("%d-%m-%Y", strtotime($data['sale_start']));?></td>
            <td><?php echo strftime("%d-%m-%Y", strtotime($data['sale_end']));?></td>
            
            <td> 
            <a href="<?php echo baseurl."admin/index.php?page=sales&act=detail&id=".$data['sale_id'];?>">
                <img src="images/eye.png" width="15" height="15" title="Chi tiet"></a>
            <a href="javascript:void(0)" class="del" name="<?php echo $data['sale_id'];?>">
                <img src="images/trash.png" width="15" height="15"title="Xoa"></a>
            <a href='<?php echo baseurl."admin/index.php?page=sales&act=edit&id=".$data['sale_id'];?>'>
                <img src="images/pencil.png"width="15" height="15" title="Cap nhat"></a>
            </td>    
        </tr>    
<?php }?>