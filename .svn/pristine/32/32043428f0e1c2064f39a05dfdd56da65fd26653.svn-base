<?php
require '../database/products.php';
require '../database/categories.php';
require '../database/sales.php';
$cate=new categories();
$pro=new products();
$record=$pro->number_Record();
$curent=1;
$tongsotrang= ceil($record/10);
if(!isset($_GET['trang']))$_GET['trang']=1;
if(isset($_POST['jump'])){
    if($_POST['jump']>0 &&$_POST['jump']<=$tongsotrang){
        $curent=$_POST['jump'];
    }else{
        $curent=1;
    }
}else{
    $curent=$_GET['trang'];
}
$vitri=($curent-1)*10;
$data=$pro->page($vitri);
if(empty($data)){
    die("Không có dữ liệu");
    exit();
}
?>
 <script type="text/javascript">
        $(document).ready(function(){
            $(document).on("click","a.del",function(){
              if(confirm("Việc xóa sản phẩm này có thể ảnh hưởng tới một số dữ liệu khác!Bạn có muốn tiếp tục xóa ?")){
                  $id=$(this).attr("name"); 
                  $(this).parent().parent().fadeOut("slow");                 
                  $.ajax({
                      "url": "modules/products/deleteajax.php",                     "type":"post",
                      "data":"uid="+$id,
                      "async":"false",
                      success: function (data) {
                        if (data ==1) {
                        alert("Bạn đã xóa thành công");
                        window.location.href="index.php?page=products&act=list";
                      }else{
                        alert("Không thể xóa được");
                      }        
                    }
                  });
               } 
               return false;
            });
            
        });
        </script>
        <style type="text/css">
    #news{
            height: 715px;
          
        }
    #head{
        width: 1000px;
        height: 55px;
        
    }
    #head h1{
        color: #000;
    }
    #function{
        width: 450px;
        height: 44px;
        padding-top: 10px;
        padding-left: 50px;
        float: left;
      
    }    
    #infomation{
        width: 500px;
        height: 44px;
        padding-top: 10px;
        float: left;
    }
     #infomation input{
        height: 25px;
        padding: 3px;
        
        border:solid 1px #ccc; 
        -moz-box-shadow: inset 0 0 4px rgba(0,0,0,0.2); 
        -webkit-box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.2); 
        box-shadow: inner 0 0 4px rgba(0, 0, 0, 0.2);
        -webkit-border-radius: 3px; 
        -moz-border-radius: 3px; 
        border-radius: 8px;
    }
   #infomation input:focus {
    outline: none !important;
    border:1px solid #3fb8e8 ;
    box-shadow: 0 0 10px #3fb8e8;
}   
    #infomation input[type='button']{
        color: #ffffff;
        background-color: #1392e9;
        border-radius: 5px;
        border: 0;
        
  -moz-box-shadow: inset 0 0 4px rgba(0,0,0,0.2); 
    -webkit-box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.2); 
    box-shbackground-color: #1392e9;
        border-radius: 5px;
        border: 0;adow: inner 0 0 4px rgba(0, 0, 0, 0.2);
    }
    #infomation input[type='button']:hover{
    cursor: pointer;
    outline: none !important;
    border:1px solid #3fb8e8 ;
    box-shadow: 0 0 10px #3fb8e8;
}
#infomation table td{
    padding: 5px;
    padding-top: 10px;
    
}
    #infomation table td{
        height: 30px;
        padding:  5px;
    }
    #noidung{
        width: 900px;
        padding-left: 50px;
        padding-right: 50px;
        height: 620;
        padding-top: 20px;
        padding-bottom: 20px;
        
    }
    #noidung  table{
        padding: 5px;
        border-collapse: collapse;
    }
     #noidung  table td{
         border: 1px solid #CCCCCC;
         text-align: center;
         
    }
    #noidung  table tbody td{
        font-size: 18px;
        width: 890px;
        height: 45px;
/*        background-color: rgb(238, 238, 238);*/
        background-color: #EFF5FB;
    }
     #noidung .title td{
        font-size: 18px;
        font-weight: normal;
        color: #ffffff;
        width: 890px;
        height: 50px;
/*        background-color:  rgb(112, 196, 105);*/
        background-color: #A5DF00;
    }    
    .sanpham{
        border: 0;
        background-color: #EFF5FB;
    }
    #pages{
        height: 44px;
        border-top: 1px solid #D8D8D8;
    }
   #pagination{
        width: 600px;
        float: left;
        height: 37px;
        padding-top: 7px;
    }
    
    #pagination ul li{
        height: 30px;
        line-height: 30px;
        padding: 0 10px;
        float: left;
        margin: 0px;
        list-style-type: none;
        border-right:1px solid #CCC;
        
    }
    #pagination ul li a{      
        font-size: 18px;
        color: #0099FF;      
        text-decoration: none;
    }
    #infor{
        height: 44px;
        width: 400px;
        float: left;
    }
    #infor p{
        float: left;
    }
        </style>
   <script language='javascript'>
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
       </script>
        <script>
   $(document).ready(function(){
      $("a#remove").click(function(){
        if (confirm("Bạn có muốn xóa các mục đã chọn")) {
            var myCheckboxes = new Array();
        $("input[class='case']:checked").each(function() {
           $(this).parent().parent().fadeOut("slow");
           myCheckboxes.push($(this).val());
        });
        $.ajax({
            type: "POST",
            url: "modules/products/del.php",
            data: 'myCheckboxes='+myCheckboxes,
            success: function(data){
              if(data==0) alert("Không thể xóa được !");
            }
        });
        return false;
        };
        
      }) ;
   });
</script>
      <script>
      $(document).ready(function() {
   //select and deselect
 $("#selectall").click(function () {
        $('input:checkbox').prop('checked', this.checked);
    });
    $(".case").click(function () {
        if (!$(this).is(':checked'))
            $("#selectall").prop('checked', false);
    });
    
});
        </script>
        <script>
       $(document).ready(function(){
    $('a#back').click(function(){
        parent.history.back();
        return false;
    });
    $("#tim").click(function(){
        $id=$("#id").val();
        if($id == ""){
            alert("Không được bỏ trống");
        }else{
            $.ajax({
                url: "modules/products/searchajax.php",
                data: "id="+$id,
                type: 'POST',
                async: false,
                success: function (data) {
                       if(data ==0 ){
                           alert("Không tìm thấy");
                       }else{
                           $("#tbody").html(data);
                       }
                    }
            })
        }
    });
     $("#delall").click(function(){
                  if (confirm("Bạn có muốn xóa tất cả dữ liệu ?")) {
                    $id=1;
                     $.ajax({
                          url:"modules/products/delall.php",
                          data:"id="+$id,
                          type: 'POST',
                          async: false,
                          success: function (data) {
                              if(data==0)alert("Không thể xóa được");
                              else{
                                   window.location.href="index.php?page=products&act=list";
                              }
                            
                    }
                      });
                  };
              
            });

});

        </script>
<div id="news">
    <div id="head">
        <div id="function">
            <span>
                <a href="javascript:void(0)" onclick="javascript:history.back();"><img src="images/previous.png" width="30" height="30"></a>
                <a href="javascript:void(0)" onclick="javascript:history.forward();"><img src="images/next.png" width="30" height="30"></a>
                <a href="<?php echo baseurl."admin/index.php?page=products&act=add";?>"><img src="images/home/add.png" width="30" height="30"></a>
                <a href="<?php echo baseurl."admin/index.php?page=products&act=thongke";?>"><img src="images/thongke.png" width="30" height="30"></a>
                <a href="<?php echo baseurl."admin/index.php?page=products&act=list";?>"><img src="images/list.png" width="30" height="30"></a>
                <a href="javascript:void(0)" id="remove"><img src="images/remove.png" width="30" height="30"></a>
                <a href="<?php echo baseurl."admin/index.php?page=products&act=search";?>"><img src="images/home/search.png" width="30" height="30"></a>
                <a href="javascript:void(0)" id="delall"><img src="images/delete.png" width="30" height="30"></a>
                <a><img src="images/information.png" width="30" height="30"></a>
            </span>
        </div>
        <div id="infomation">
            <table>
                <tr>
                    <td>Ma ID</td>
                    <td><input type="text" size="7" id="id"></td>
                    <td><input type="button" value="Tìm kiếm" id="tim"></td>
                    <td>Tổng số sản phẩm :</td>
                    <td><?php echo $pro->TotalProducts(); ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div id="noidung">
    <table >
        <tr class="title">
            <td><input type="checkbox" id="selectall"/></td>
            <td>Id</td>
            <td>Tên</td>
            <td>Giá</td>
            <td>Số lượng</td>
            <td>Ngày nhập</td>
            <td>Chủng loại</td>
            <td>Thao tác</td>
        </tr>
        <tbody id="tbody">
        <?php foreach ($data as $value) {?>
        <tr>
            <td><input type="checkbox" name="myCheckboxes[]" class="case" value="<?php echo $value['pro_id']; ?>" /></td>
            <td><?php echo $value['pro_id'];?></td>
            <td><input type="text" class="sanpham" value="<?php echo $value['pro_name'];?>" readonly="true" /></td>
            <td><?php echo $value['pro_price'];?></td>
            
<!--            <td><a href="javascript:void(0)" class="viewimg" name="<?php echo $value['pro_image'];?>">Xem anh</a></td>-->
            <td><?php echo $value['pro_number'];?></td>
            <td><?php echo strftime("%d-%m-%Y", strtotime($value['pro_import']));?></td>
            <td><?php echo $cate->getName($value['cate_id']);?></td>
              <td> 
            <a href="<?php echo baseurl."admin/index.php?page=products&act=detail&id=".$value['pro_id'];?>">
                <img src="images/eye.png" width="20" height="20" title="Chi tiet"></a>
            <a href="javascript:void(0)" class="del" name="<?php echo $value['pro_id'];?>">
                <img src="images/trash.png" width="20" height="20"title="Xoa"></a>
            <a href='<?php echo baseurl."admin/index.php?page=products&act=edit&id=".$value['pro_id'];?>'>
                <img src="images/pencil.png"width="20" height="20" title="Cap nhat"></a>
        </td>
        </tr>      
        <?php }?>
         </tbody>
    </table>
</div>
</div>
<div id="pages">
     <div id="pagination">
   <?php 
    
    echo "<ul>";
    if(($curent!=1)&&($curent >1)){
       $i=$curent-1;
       echo "<li><a href='index.php?page=products&act=list&trang=$i' style=''>"."Previous"."</a></li>";
    }?>
    <?php 
        $less=$curent-1;
        $more=$curent+1;
        if($less <= 1)$less=1;
        if($more> $tongsotrang){ $more=$tongsotrang;
        
        }
        for($i=$less;$i<=$more;$i++){
    ?> 
         <li><a href="index.php?page=products&act=list&trang= <?php echo $i; ?>"
            <?php if($curent == $i) echo "style='font-weight:bold;color:red;'" ?>
            ><?php echo $i;?></a></li>
        <?php } ?>
   <?php  if(($curent !=$tongsotrang)){
       $i=$curent + 1;
       echo "<li><a href='index.php?page=products&act=list&trang=$i'>"."Next"."</a></li>";
    }
    echo "</ul>";?>
     </div>
     <div id="infor">
         <p style="padding-right:  25px;">Tổng số trang : <?php echo $tongsotrang; ?>  
         <form method="post" action="">
             Tới:<input type="text" name="jump" size="7" onKeyPress="return isNumberKey(event)"><input type="submit" value="Go">
         </form>
         </p>
         <p>Bạn đang ở trang số <?php echo $curent; ?></p>         
     </div>
</div>
