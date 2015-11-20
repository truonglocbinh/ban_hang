<?php
require '../../../database/cauhinh.php';
require '../../../database/database.php';
require '../../../database/contacts.php';
$cate=new contacts();
$id=$_POST['id'];
$value=$cate->showOne($id);

if(empty($value)){
    echo '0';
    ?>
<?php }else{        
        
         ?>
            <tr>
                <td><input type="checkbox" name="myCheckboxes[]" class="case" value="<?php echo $value['con_id']; ?>" /></td>
                <td><?php echo $value['con_id'];?></td>
                <td><input type="text" value="<?php echo $value['con_name'];?>" readonly="true" title="<?php echo $value['con_name'];?>"></td>
                <td><?php echo $value['con_phone'];?></td>
                <td><?php echo $value['con_email'];?></td>
                <td> 
                    <a href="<?php echo baseurl."admin/index.php?page=contacts&act=detail&id=".$value['con_id'];?>">
                      <img src="images/eye.png" width="20" height="20" title="Chi tiet"></a>
                    <a href="javascript:void(0)" class="del" name="<?php echo $value['con_id'];?>">
                    <img src="images/trash.png" width="20" height="20" title="Xoa"></a>                     
                </td>
            </tr>
<?php } ?>

