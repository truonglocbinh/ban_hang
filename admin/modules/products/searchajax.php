<?php
require '../../../database/cauhinh.php';
require '../../../database/database.php';
require '../../../database/products.php';
require '../../../database/categories.php';
$cate=new categories();
$pro=new products();
$id=$_POST['id'];
$value=$pro->showOne($id);
if(empty($value)){
    echo '0';
}else{?>
            <tr>
            <td><input type="checkbox" name="myCheckboxes[]" class="case" value="<?php echo $value['pro_id']; ?>" /></td>
            <td><?php echo $value['pro_id'];?></td>
            <td><?php echo $value['pro_name'];?></td>
            <td><?php echo $value['pro_price'];?></td>
            
<!--            <td><a href="javascript:void(0)" class="viewimg" name="<?php echo $value['pro_image'];?>">Xem anh</a></td>-->
            <td><?php echo $value['pro_number'];?></td>
            <td><?php echo strftime("%d-%m-%Y", strtotime($value['pro_import']));?></td>
            <td><?php echo $cate->getName($value['cate_id']);?></td>
              <td> 
            <a href="<?php echo baseurl."admin/index.php?page=products&act=detail&id=".$value['pro_id'];?>">
                <img src="images/eye.png" width="20" height="20" title="Chi tiet"></a>
            <a href="javascript:void(0)" class="del" name="<?php echo $value['pro_id'];?>">
                <img src="images/trash.png" width="20" height="20"title="Xoa"></a>
            <a href='<?php echo baseurl."admin/index.php?page=products&act=edit&id=".$value['pro_id'];?>'>
                <img src="images/pencil.png"width="20" height="20" title="Cap nhat"></a>
        </td>
        </tr>
<?php } ?>