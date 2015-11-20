<?php
require '../database/products.php';
require '../database/categories.php';
$cate=new categories();
if(!isset($_GET['id'])||(empty($_GET['id']))){
    header("location:".baseurl."admin/index.php?page=products&act=list");
    exit();
}
$id=$_GET['id'];
$pro= new products();
$data=$pro->showOne($id);
if(empty($data)){
    header("location:".baseurl."admin/index.php?page=products&act=list");
    exit();
}
?>
  <script src="libraries/fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
  <script src="libraries/fancybox/jquery.fancybox-1.3.1.pack.js"></script>
  <script src="libraries/fancybox/jquery.fancybox-1.3.1.css"></script>
<style>
      #noidung{
        width: 750px;
        height: 760px;
        float: left;
        
         position: relative;
    }
    #head{
         font-size: 20px;
        height: 48px;
        padding-top: 12px;
       
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
        text-align: center;
        width: 520px;
        height: 60px;
        border: 1px solid #ccc;
        font-size: 22px;
    }
    #pro_infor{
        height: 60px;
        overflow: scroll;
    }
    #pro_full{
        height: 60px;
        overflow: scroll;
    }
   
    table tr td.thuoctinh{
        font-size: 20px;
        width: 150px;
        border: 1px solid #ccc;
    }
      #menunhanh{
        width: 250px;
        height: 760px;
        float: left;
           
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
     #fancybox-wrap {
      position: absolute;
      top: 200px !important; 
      left: 400px !important;
      width: 300px !important;
      height: 300px !important; 
}
     #fancybox-inner{
        width: 300px !important;
        height:300px !important;
     } 
</style>   

<script>
$(document).ready(function(){
    $(".fancybox").fancybox({
    fitToView: false,
    beforeShow: function () {
        // apply new size to img
        
        $("img #fancybox-image").css({
            "width": 800,
            "height": 600
        });
       
      
    }
});
   $("a#viewimage").fancybox({
      'titleShow'		: false
			}); 
});
</script>
<script type="text/javascript">
        $(document).ready(function(){
            $("#del").click(function(){
               if(confirm("Việc xóa sản phẩm này có thể ảnh hưởng tới một số dữ liệu khác!Bạn có muốn tiếp tục xóa ?")){
                  $id=$(this).attr("name"); 
                  $(this).parent().parent().fadeOut("slow");                 
                  $.ajax({
                      "url": "modules/products/deleteajax.php",               
                      "type":"post",
                      "data":"uid="+$id,
                      "async":"false",
                      success: function (data) {
                       if (data == 0) {alert("Không thể xóa !");}else{
                        window.location.href="index.php?page=products&act=list";
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
        <td class="thuoctinh"></td>
        <td><a  id="viewimage" href="<?php echo $pro->isImage($data['pro_image']); ?>">Xem anh</a></td>
    </tr>
    <tr>
        <td class="thuoctinh">Mã sản phẩm : </td>
        <td><?php echo $data['pro_id'];?></td>
    </tr>
     <tr>
        
        <td class="thuoctinh">Tên sản phẩm: </td>
        <td><?php echo $data['pro_name'];?></td>
    </tr>
    <tr>
        
        <td class="thuoctinh">Giá sản phẩm: </td>
        <td><?php echo $data['pro_price'];?></td>
    </tr>
    <tr>
        <td class="thuoctinh">Thông tin  sản phẩm : </td>
        <td><div id="pro_infor"><?php echo $data['pro_info'];?></div></td>
    </tr>
    <tr>
        <td class="thuoctinh">Đặc tính kỹ thuật: </td>
        <td><div id="pro_full"><?php echo $data['pro_full'];?></div></td>
    </tr>
   
    <tr>
        <td class="thuoctinh">Số lượng:</td>
        <td><?php echo $data['pro_number'];?></td>
    </tr>
    <tr>
        <td class="thuoctinh">Ngày nhập kho :</td>
        <td><?php echo $data['pro_import'];?></td>
    </tr>
     <tr>
        <td class="thuoctinh">Loại-Mặt hàng</td>
        <td><p><?php echo $cate->getName($data['cate_id']);?><?php 
           if($data['pro_hot']==1) echo "<img src='images/hot.png' width='30' height='30'>";
           if($data['pro_new']==1) echo "<img src='images/new.png' width='50' height='50'>";
           ?></p></td>
    </tr>
</table>
        <span style="margin-top:30px;">
            <a href="<?php echo baseurl."admin/index.php";?>"><img src="images/home.png" width="50px" height="50px" title="Trang chủ"></a>
            <a href="javascript:void(0)" id="del" name="<?php echo $_GET['id']; ?>" ><img src="images/trash.png" width="50px" height="50px" title="Xóa"/></a>
            <a href="<?php echo baseurl."admin/index.php?page=products&act=list";?>"><img src="images/list.png" width="50px" height="50px" title="Danh sách"/></a>
            <a href="<?php echo baseurl."admin/index.php?page=products&act=edit&id=".$id;?>"><img src="images/pencil.png" width="50px" height="50px" title="Chỉnh sửa"></a>
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

