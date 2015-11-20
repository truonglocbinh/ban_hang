<?php
session_start();
require '../../../database/cauhinh.php';
require '../../../database/database.php';
require '../../../database/categories.php';
//if(isset($_SESSION['data'])) session_destroy ();
$cate=new categories();
$id=trim($_POST['id']);
$name=trim($_POST['name']);
$status=trim($_POST['status']);
$data=$cate->search($id, $name, $status);
$_SESSION['data']=$data;
$num=count($data);
if(!isset($_GET['page']))$_GET['page']=1;
$page_number=  ceil($num/3);
$data_page=array();
$vitri=($_GET['page']-1)*10;
$j=0;
for($i=$vitri;$i<$num;$i++){
   $data_page[]=$data[$i];
   $j++;
   if($j==3)
              break;
}
if($data!=NULL){ ?>
      <table border="1px">
            <tr>
                 <th>Id</th>
                 <th>Ten </th>
                 <th>Thong tin </th>
                 <th>Trang thai</th>
            </tr>
        <?php 
       
        foreach ($data as $value) {   
         ?>
            <tr>
                <td><?php echo $value['cate_id']?></td>
                <td><?php echo $value['cate_name']?></td>
                <td><?php echo $value['cate_info']?></td>
                <td><?php echo $value['cate_status']?></td>
                <td> 
                    <a href="<?php echo baseurl."admin/index.php?page=category&act=detail&id=".$value['cate_id'];?>"><img src="images/detail.png" width="15" height="15" title="Chi tiet"></a><a href="javascript:void(0)" class="del" name="<?php echo $value['cate_id'];?>">
                            <img src="images/delete.png" width="15" height="15"title="Xoa"></a>
                        <a href='<?php echo baseurl."admin/index.php?page=category&act=edit&id=".$value['cate_id'];?>'><img src="images/update.png"width="15" height="15" title="Cap nhat"></a>
                </td>
            </tr>
        <?php } ?>

        </table>
<div id="page">
    <?php 
for($i=1;$i<=$page_number;$i++){
     echo "<a href='index.php?page=category&act=list&page=$i'>$i</a>";
}
    ?>
</div>
<?php }else{
    echo 'NO RESULT ';
}?>