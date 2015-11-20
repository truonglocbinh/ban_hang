<?php
require '../../../database/cauhinh.php';
require '../../../database/database.php';
require '../../../database/documents.php';
$cate=new documents();
$id=$_POST['id'];
$value=$cate->showOne($id);
if(empty($value)){
    echo '0';
    ?>
<?php }else{  
     ?>
         <tr>
        <td><input type="checkbox" name="myCheckboxes[]" class="case" value="<?php echo $value['doc_id']; ?>" /></td>
        <td><?php echo $value['doc_id'] ?></td>
        <td><?php echo $value['doc_title'] ?></td>
        <td><?php echo $value ['doc_type'];?></td>
        <td><?php if($value['doc_vip']==1) echo 'Có';else echo 'Không'; ?></td>
        <td> 
            <a href="<?php echo baseurl."admin/index.php?page=documents&act=detail&id=".$value['doc_id'];?>">
                <img src="images/eye.png" width="20" height="20" title="Chi tiet"></a>
            <a href="javascript:void(0)" class="del" name="<?php echo $value['doc_id'];?>">
                <img src="images/trash.png" width="20" height="20"title="Xoa"></a>
            <a href='<?php echo baseurl."admin/index.php?page=documents&act=edit&id=".$value['doc_id'];?>'>
                <img src="images/pen.png"width="25" height="25" title="Cap nhat"></a>
        </td>
    </tr>
<?php  }?>
     

