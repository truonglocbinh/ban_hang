<?php
require '../../../database/cauhinh.php';
require '../../../database/database.php';
require '../../../database/intro.php';
$cate=new intro();
$id=$_POST['id'];
$data=$cate->search($id);
if(empty($data)){
    echo '0';
    ?>
<?php }else{  
    foreach ($data as $value) {?>
            <tr>
                <td><input type="checkbox" name="myCheckboxes[]" class="case" value="<?php echo $value['intro_id']; ?>" /></td>
                <td class="id"><?php  echo $value['intro_id'];?></td>
                <td class="noi"><div class="scoll"><?php
                    echo $value['intro_content'];
                ?></div></td>
                <td class="thaotac">  <a href="<?php echo baseurl."admin/index.php?page=intro&act=detail&id=".$value['intro_id'];?>">
                        <img src="images/eye.png" width="20" height="20" title="Chi tiet"></a>
                      <a href="javascript:void(0)" class="del" name="<?php echo $value['intro_id'];?>">
                       <img src="images/trash.png" width="20" height="20"title="Xoa"></a>
                      <a href='<?php echo baseurl."admin/index.php?page=intro&act=edit&id=".$value['intro_id'];?>'>
                        <img src="images/pennew.png"width="18" height="18" title="Cap nhat"></a></td>
            </tr>
<?php  }}?>
     




