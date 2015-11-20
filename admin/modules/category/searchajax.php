<?php
require '../../../database/cauhinh.php';
require '../../../database/database.php';
require '../../../database/categories.php';
$cate=new categories();
$id=$_POST['id'];
$name=$_POST['name'];
$data=$cate->search($id, $name);
if(empty($data)){
    echo '0';
    ?>
<?php }else{        
        foreach ($data as $value) {   
         ?>
            <tr>
                <td><input type="checkbox" name="myCheckboxes[]" class="case" value="<?php echo $value['cate_id']; ?>" /></td>
                <td><?php echo $value['cate_id']?></td>
                <td><?php echo $value['cate_name']?></td>
                
                <td><?php echo $value['cate_status']?></td>
                <td> 
                    <a href="<?php echo baseurl."admin/index.php?page=category&act=detail&id=".$value['cate_id'];?>"><img src="images/eye.png" width="20" height="20" title="Chi tiet"></a><a href="javascript:void(0)" class="del" name="<?php echo $value['cate_id'];?>">
                            <img src="images/trash.png" width="20" height="20"title="Xoa"></a>
                    <a href='<?php echo baseurl."admin/index.php?page=category&act=edit&id=".$value['cate_id'];?>'><img src="images/pencil.png"width="20" height="20" title="Cap nhat"></a>
                </td>
            </tr>
<?php }} ?>

