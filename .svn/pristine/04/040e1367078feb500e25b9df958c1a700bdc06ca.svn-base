<?php
require '../database/documents.php';
$doc=new documents();
if(!isset($_GET['id'])||(empty($_GET['id']))){
    header("location:".baseurl."admin/index.php?page=documents&act=list");
    exit();
}
$id=$_GET['id'];
$data=$doc->showOne($id);
if(empty($data)){
    header("location:".baseurl."admin/index.php?page=documents&act=list");
    exit();
}
?>
<style>
    #noidung{
        width: 750px;
        height: 760px;
        float: left;
         
    }
    #head{
         font-size: 20px;
        height: 47px;
        padding-top: 12px;
        border-bottom: 1px solid  #D8D8D8;
        text-align: center;
    }
    #chitiet{      
        width: 700px;
        height: 640px;
        padding-left: 50px;
        padding-top: 50px;
    }
    #chitiet table{
        border-collapse: collapse;
        margin-bottom: 40px;
    }
    tr td{
        font-size: 20px;
        text-align: center;
        width: 570px;
        height: 50px;
        border: 1px solid #ccc;
    }
    table tr td.thuoctinh{
        font-size: 20px;
        width: 100px;
        border: 1px solid #ccc;
    }
    .tieude{
        text-align: left;

    }
    .title{
        width: 570px;
        border: 0;
       font-size: 20px;
    }
    div#infor{
        height: 300px;
        overflow: scroll;
        text-align: left;
        
    } 
     #menunhanh{
        width: 220px;
        height: 730px;
        float: left;
        padding-top: 30px;
        padding-left: 30px;
           
    }
    #menunhanh ul li{
        margin-bottom: 20px;
    }
    #menunhanh h3{
        margin-bottom: 20px;
    }
    #menunhanh ul li a{
        text-decoration: none;
        font-size: 15px;
        color: olive;
    }
    #menunhanh ul li a:hover{
        color: orangered;
        font-size: 25px;
    }
</style>
<script>
    $(document).ready(function(){
        $("a.del").click(function(){
            $id=$(this).attr("name");
            if(confirm("Bạn có muốn xóa không ?")){
                  $.ajax({
               url: "modules/documents/deleteajax.php",
               type: 'POST',
               data: "uid="+$id,
               async: false,
               success: function (data) {
                      if(data==1) window.location.href="index.php?page=documents&act=list";
                    }
            });
            }
          
        });
    });
</script>
<div id="noidung">
    <div id="head"><h2>Chi tiết tài liệu <?php echo $data['doc_title'];?></h2></div>
    <div id="chitiet">
    <table>
    <tr>
        <td class="thuoctinh">Mã</td>
        <td><?php echo $data['doc_id'];?></td>
    </tr>
    <tr>
        <td class="thuoctinh">Tiêu đề </td>
        <td class="tieude"><input type="text" class="title" size=20 value="<?php echo $data['doc_title'];?>" readonly="true"></td>
    </tr>  
    <tr>
        <td class="thuoctinh">Nội dung</td>
        <td><div id="infor"><?php echo $data['doc_content'];?></div></td>
    </tr>
    <tr>
        <td class="thuoctinh">Loại</td>
        <td><?php echo $data['doc_type'];?></td>
    </tr>
    <tr>
        <td class="thuoctinh">Vip</td>
        <td><?php if($data['doc_vip']==1) echo 'Có'; else echo "Không"; ?></td>
    </tr>
</table>
        <span >
            <a href="<?php echo baseurl."admin/index.php";?>"><img src="images/home.png" width="50px" height="50px" title="Trang chủ"></a>
            <a href="javascript:void(0)" class="del" name="<?php echo $data['doc_id']; ?>"><img src="images/trash.png" width="50px" height="50px" title="Xóa" /></a>
            <a href="<?php echo baseurl."admin/index.php?page=documents&act=list";?>"><img src="images/list.png" width="50px" height="50px" title="Danh sách"/></a>
            <a href="<?php echo baseurl."admin/index.php?page=documents&act=edit&id=".$id;?>"><img src="images/pencil.png" width="50px" height="50px" title="Chỉnh sửa"></a>
        </span>
       
    </div>
  
</div>
<div id="menunhanh">
    <h3>Menu nhanh</h3>
         <ul>
            <li><a href="index.php?page=category&act=list">Xem danh mục loại sản phẩm</a></li>
            <li><a href="index.php?page=products&act=list">Xem danh sách sản phẩm</a></li>
            <li><a href="index.php?page=products&act=search">Tìm kiếm đa năng</a></li>
            <li><a href="index.php?page=orders&act=listfull">Đơn hàng</a></li>
         </ul>
</div>



