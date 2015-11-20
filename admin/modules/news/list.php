<?php 
require '../database/news.php';
$news=new news();
//$data=$news->showAll();
$recordnumber=$news->getRecordNumber();
echo $recordnumber;
if(!isset($_GET['trang']))$_GET['trang']=1;
$vitri=($_GET['trang']-1)*10;
$data=$news->page($vitri);
?>
<style>
    #news{
        height: 700px;
    }
    #pages{
        height: 60px;
    }
</style>
  <script type="text/javascript">
        $(document).ready(function(){
            $("a.del").click(function(){
               if(confirm("Bạn có muốn xóa không ?")){
                  $id=$(this).attr("name"); 
                  $(this).parent().parent().fadeOut("slow");                 
                  $.ajax({
                      "url": "modules/news/deleteajax.php",                     "type":"post",
                      "data":"uid="+$id,
                      "async":"false",
                      success: function (data) {                     
                    }
                  });
               } 
               return false;
              
            });
        });
        </script>
<div id="news">
    <table border="1px">
    <tr>
        <td>
          Id
        </td>
        <td>Tiêu đề</td>
        <td>Tác giả</td>
        <td>Chi tiết</td>
        <td>Hình ảnh </td>
        <td>Ngày tháng</td>
         
    </tr>
    <?php foreach ($data as $value) {?>
    <tr>
        <td><?php echo $value['news_id'] ?></td>
        <td><?php echo $value['news_title'] ?></td>
        <td><?php echo $value['news_author'] ?></td>
        <td><?php echo 'noi dung'?></td>
        <td><?php echo 'hinh anh' ?></td>
        <td><?php echo $value['news_date'] ?></td>
        <td> 
            <a href="#">
                <img src="images/detail.png" width="30" height="30" title="Chi tiet"></a>
            <a href="javascript:void(0)" class="del" name="<?php echo $value['news_id'];?>">
                <img src="images/delete.png" width="30" height="30"title="Xoa"></a>
            <a href='<?php echo baseurl."admin/index.php?page=news&act=edit&id=".$value['news_id'];?>'>
                <img src="images/update.png"width="30" height="30" title="Cap nhat"></a>
        </td>
    </tr>
  <?php   }?>   
</table>

</div>
<div id="pages">
      <?php $tongsotrang= ceil($recordnumber/10);
    for($i=1;$i<=$tongsotrang;$i++)
        echo "<a href='index.php?page=news&act=list&trang=$i'>$i</a>";
    ?>
</div>