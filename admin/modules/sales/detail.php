<?php
require '../database/products.php';
require '../database/sales.php';
$pro=new products();
if((!isset($_GET['id']))||(empty($_GET['id']))){
    header("location:".baseurl."admin/index.php?page=sales&act=list");
    exit();
}
$id=$_GET['id'];
$sales=new sales();
$data=$sales->showOne($id);
if(empty($data)){
     header("location:".baseurl."admin/index.php?page=sales&act=list");
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
        border-bottom: 1px solid #F2F2F2;
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
    }
    tr td{
        text-align: center;
        width: 520px;
        height: 60px;
        border: 1px solid #ccc;
        font-size: 22px;
    }
   
    table tr td.thuoctinh{
        font-size: 20px;
        width: 150px;
        border: 1px solid #ccc;
    }
    #ghichu{
        height: 70px;
        overflow:  scroll;
        text-align: left;
        font-size: 16px;
    }
       #menunhanh{
        width: 220px;
        height: 760px;
        float: left;
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
    textarea{
        width: 500px;
        height: 400px;
    }
    h2{
        font-size: 30px;
       margin-bottom: 5px;
        
    }
    fieldset{
        border: 1px solid #CCC;
       
    }
    legend{
        color:  royalblue;
        font-size: 20px;
    }
    table td{
        font-size: 20px;
        padding: 10px;
    }
    input{
        box-shadow:1px 1px 5px #B6B6B6;
        text-shadow:1px 1px 1px #9E3F3F;
        border-radius: 8px;
        background-color: #E27575;
        color: #00ffffff;
        font-size: 20px;
        width: 90px;
        height: 45px;
    }
    input:hover{
        background-color: #CF7A7A;
       
        cursor:pointer;
        
    }
</style>
</script>
<script type="text/javascript">
        $(document).ready(function(){
            $("a.del").click(function(){
               if(confirm("Bạn có muốn xóa không ?")){
                  $id=$(this).attr("name"); 
                  $(this).parent().parent().fadeOut("slow");                 
                  $.ajax({
                      "url": "modules/sales/deleteajax.php",                     
                      "type":"post",
                      "data":"uid="+$id,
                      "async":"false",
                      success: function (data) { 
                      if (data == 1) {
                        window.location.href="index.php?page=sales&act=list";
                      }else{
                        alert("Không the xoa !");
                      }                    
                    }
                  });
               } 
               return false;
              
            });
        });
        </script>
<div id="noidung">
    <div id="head"><h1>Chi tiết sản phẩm</h1></div>
    <div id="chitiet">
        <table>
    <tr>
    <td class="thuoctinh">Mã khuyến mãi</td>
    <td ><?php echo $data['sale_id'];?></td>
    </tr>
    <tr>
        <td class="thuoctinh">Mã-Tên sản phẩm</td>
        <td><?php echo $pro->getName($data['pro_id']);?></td>
    </tr>
    <tr>
        <td class="thuoctinh">Số lượng</td>
        <td><?php 
           $prodata=$pro->showOne($data['pro_id']);
           if($prodata != NULL){
               echo $prodata['pro_number'];
           }else echo "Không rõ";
        ?></td>
    </tr>
    <tr>
        <td class="thuoctinh">Tỷ lệ khuyến mãi</td>
        <td><?php echo $data['sale_percent'];?>%</td>
    </tr>
    <tr>
        <td class="thuoctinh">Gía khuyến mãi</td>
        <td><?php echo $data['sale_price'];?> VNĐ</td>
    </tr>
    <tr>
        <td class="thuoctinh">Ngày bắt đầu</td>
        <td><?php echo $data['sale_start'];?></td>
    </tr>
    <tr>
        <td class="thuoctinh">Ngày kết thúc</td>
        <td><?php echo $data['sale_end'];?></td>
    </tr>
    <tr>
        <td class="thuoctinh">Ghi chú</td>
        <td><div id="ghichu"><?php if($data['sale_notice']== "")  echo 'Không có gì';
        else {echo $data['sale_notice'];}?></div></td>
    </tr>
</table>
        <span>
            <a href="<?php echo baseurl."admin/index.php";?>"><img src="images/home.png" width="50px" height="50px" title="Trang chủ"></a>
            <a href="javascript:void(0)"  class="del" name="<?php echo $_GET['id'] ?>"><img src="images/trash.png" width="50px" height="50px" title="Xóa"/></a>
            <a href="<?php echo baseurl."admin/index.php?page=sales&act=list";?>"><img src="images/list.png" width="50px" height="50px" title="Danh sách"/></a>
            <a href="<?php echo baseurl."admin/index.php?page=sales&act=edit&id=".$id;?>"><img src="images/pencil.png" width="50px" height="50px" title="Chỉnh sửa"></a>
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
