<?php
require '../../../database/cauhinh.php';
require '../../../database/database.php';
require '../../../database/customers.php';
$cate=new customers();
$id=$_POST['id'];
$data=$cate->search($id);
if(empty($data)){
    echo '0';
    ?>
<?php }else{  
      foreach ($data as $value) {?>
            <tr>
                <td><input type="checkbox" name="myCheckboxes[]" class="case" value="<?php echo $value['cus_id']; ?>" /></td>
                <td><?php  echo $value['cus_id'];?></td>
                <td><div class="nd"><?php  echo $value['cus_content']; ?></div></td>
                <td>  <a href="<?php echo baseurl."admin/index.php?page=customers&act=detail&id=".$value['cus_id'];?>">
                         <img src="images/eye.png" width="20" height="20" title="Chi tiet"></a>
                      <a href="javascript:void(0)" class="del" name="<?php echo $value['cus_id'];?>">
                        <img src="images/trash.png" width="20" height="20"title="Xoa"></a>
                      <a href='<?php echo baseurl."admin/index.php?page=customers&act=edit&id=".$value['cus_id'];?>'>
                        <img src="images/pennew.png"width="18" height="18" title="Cap nhat"></a></td>
            </tr>
<?php  }}?>
     



