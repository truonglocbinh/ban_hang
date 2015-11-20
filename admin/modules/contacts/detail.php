<?php
require '../database/contacts.php';
if(!isset($_GET['id'])||(empty($_GET['id']))){
    header("location:".baseurl."admin/index.php?page=contacts&act=list");
    exit();
}
$id=$_GET['id'];
$cate=new contacts();
$data=$cate->showOne($id);
if(empty($data)){
    header("location:".baseurl."admin/index.php?page=contacts&act=list");
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
        border-bottom: 1px solid #ccc;
        text-align: center;
    }
    #head h2{
        color: #024457;
    }
    #chitiet{
       
        width: 700px;
        height: 640px;
        padding-left: 50px;
        padding-top: 50px;
    }
    #chitiet table{
        border-collapse: collapse;
        margin-bottom: 50px;
    }
    tr td{
        text-align: center;
        width: 570px;
        border: 1px solid #ccc;
    }
    tr td.binhthuong{
        height: 50px;
    }
    table tr td.thuoctinh{
        font-size: 20px;
        width: 100px;
        border: 1px solid #ccc;
    }
    div#infor{
        height: 300px;
        overflow: scroll;
        text-align: left;
        
    }
     #menunhanh{
        width: 210px;
        height: 730px;
        float: left;
        padding-top: 30px;
        padding-left: 40px;
           
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
<script type="text/javascript">
        $(document).ready(function(){
            $("#del").click(function(){
               if(confirm("Bạn có muốn xóa ?")){
                  $id=$(this).attr("name"); 
                           
                  $.ajax({
                      "url": "modules/contacts/deleteajax.php",             
                      "type":"post",
                      "data":"uid="+$id,
                      "async":"false",
                      success: function (data) {
                       if (data == 0) {alert("Không thể xóa !");}else{
                        window.location.href="index.php?page=contacts&act=list";
                       }
                    }
                  });
               } 
               return false;
            });
            
        });
        </script>
<div id="noidung">
    <div id="head"><h2>Chi tiết</h2></div>
    <div id="chitiet">
<table>
   
    <tr>
        <td class="thuoctinh">Mã :</td>
        <td  class="binhthuong"><?php echo $data['con_id'];?></td>
    </tr>
     <tr>
        <td class="thuoctinh">Tên :</td>
        <td class="binhthuong"><?php echo $data['con_name'];?></td>
    </tr>
     <tr>
        <td class="thuoctinh">Số điện thoại :</td>
        <td><?php echo $data['con_phone'];?></td>
    </tr>
     <tr>
        <td class="thuoctinh">Email</td>
        <td class="binhthuong" style="text-align: left;"><?php echo $data['con_email'];?></td>
    </tr>
    <tr>
        <td class="thuoctinh">Nội dung </td>
        <td class=""><div id="infor"><?php echo $data['con_content'];?></div></td>
    </tr>   
</table>
        <span >
            <a href="<?php echo baseurl."admin/index.php";?>"><img src="images/home.png" width="50px" height="50px" title="Trang chủ"></a>
            <a href="null" id="del" name="<?php echo $_GET['id']; ?>"><img src="images/trash.png" width="50px" height="50px" title="Xóa"/></a>
            <a href="<?php echo baseurl."admin/index.php?page=contacts&act=list";?>"><img src="images/list.png" width="50px" height="50px" title="Danh sách"/></a>
           
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
