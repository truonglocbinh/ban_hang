<?php
require '../database/intro.php';
$intro=new intro();
if(!isset($_GET['id'])||(empty($_GET['id']))){
    header("location:".baseurl."admin/index.php?page=intro&act=list");
    exit();
}
$id=$_GET['id'];

$data=$intro->showOne($id);
if(empty($data)){
    header("location:".baseurl."admin/index.php?page=intro&act=list");
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
        border-bottom: 1px solid #0099FF;
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
        margin-bottom: 50px;
    }
    tr td{
        text-align: center;
        width: 570px;
        border: 1px solid #ccc;
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
<div id="noidung">
    <div id="head"><h1>Chi tiết</h1></div>
    <div id="chitiet">
<table>
    <tr>
        <td class="thuoctinh">Mã </td>
        <td><?php echo $data['intro_id'];?></td>
    </tr>
    <tr>
        <td class="thuoctinh">Nội dung </td>
        <td class=""><div id="infor"><?php echo $data['intro_content'];?></div></td>
    </tr>    
</table>
        <span>
            <a href="<?php echo baseurl."admin/index.php";?>"><img src="images/home.png" width="50px" height="50px" title="Trang chủ"></a>
            <a href="#" ><img src="images/trash.png" width="50px" height="50px" title="Xóa"/></a>
            <a href="<?php echo baseurl."admin/index.php?page=intro&act=list";?>"><img src="images/list.png" width="50px" height="50px" title="Danh sách"/></a>
            <a href="<?php echo baseurl."admin/index.php?page=intro&act=edit&id=".$id;?>"><img src="images/pencil.png" width="50px" height="50px" title="Chỉnh sửa"></a>
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


