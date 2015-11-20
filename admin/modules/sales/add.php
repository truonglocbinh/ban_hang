<style>
      #error{
        width: 950px;
        padding-left: 50px;
        padding-top: 10px; 
        font-size: 20px;
        color: mediumblue;
        height: 40px;
        background-color: #faebcc;
       
    }
    #noidung{
        
        height: 710px;   
        
    }
    #form{
        width: 720px;
        padding-top: 20px;
        padding-left: 30px;
        float: left;
        height: 640px;
    }
     #form input{
        font-size: 20px;
        padding: 5px;
        width: 350px;
       
        border:solid 1px #ccc; 
        -moz-box-shadow: inset 0 0 4px rgba(0,0,0,0.2); 
        -webkit-box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.2); 
        box-shadow: inner 0 0 4px rgba(0, 0, 0, 0.2);
        -webkit-border-radius: 3px; 
        -moz-border-radius: 3px; 
        border-radius: 8px;
    }
    #form input:focus {
    outline: none !important;
    border:1px solid #3fb8e8 ;
    box-shadow: 0 0 10px #3fb8e8;
}   
    #form table td{
        padding-left: 2px;
        padding-bottom: 12px;
    }
  input[type='submit']{
  font-size: 20px;
  color: #ffffff;
  width: 80px;
  height: 100px; 
  background-color: #1392e9;
  border-radius: 5px;
  border: 0;
  -moz-box-shadow: inset 0 0 4px rgba(0,0,0,0.2); 
  -webkit-box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.2); 
   box-shadow: inner 0 0 4px rgba(0, 0, 0, 0.2);
}
input[type='submit']:hover{
    cursor: pointer;
    outline: none !important;
    border:1px solid #3fb8e8 ;
    box-shadow: 0 0 10px #3fb8e8;
}
textarea{
  font-size: 20px;
  width: 490px;
  height: 240px; 
  padding: 10px;
  border-radius: 10px;
  border: 0;
  -moz-box-shadow: inset 0 0 4px rgba(0,0,0,0.2); 
    -webkit-box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.2); 
    box-shadow: inner 0 0 4px rgba(0, 0, 0, 0.2);
}
textarea:focus{
    outline: none !important;
    border:1px solid #3fb8e8 ;
    box-shadow: 0 0 10px #3fb8e8;
}
 table tr td:first-child{
    font-size: 20px;
}
     #menunhanh{
        
        width: 229px;
        padding-left: 20px;
        float: left;
        height: 700px;
        padding-top: 10px;
        border-left: 1px solid #FAFAFA;
    }
    #search{
        width: 229px;
        height: 400px;
    }
    #information{
        height: 130px;
    }
    #information table td{    
        padding: 3px;
    }
    #information input[type='button']{
        color: #FFF;
        font-size: 15px;
        background-color: #0080FF;
        border-radius: 5px; 
    }
    #information input{
        
    }
    #re{
        width: 229px;
        height: 260px;
        padding-top: 10px;
       
    }
    #re table{
        border-collapse: collapse;
    }
    #re td{
        width: 200px;
        height: 30px;
        border: 1px solid #ccc;
    }
    #link{
        width: 229px;
        height: 299px;
        border-top: 1px solid #F2F2F2;
    }
     #menunhanh ul li{
        margin-bottom: 20px;
    }
    #menunhanh h3{
        margin-bottom: 20px;
    }
    #menunhanh ul li a{
        text-decoration: none;
        font-size: 19px;
        color: olive;
    }
    #menunhanh ul li a:hover{
        color: orangered;
        font-size: 25px;
    }
    ::-webkit-input-placeholder {
   color: #ccc;
}

:-moz-placeholder { /* Firefox 18- */
   color: #ccc;  
}

::-moz-placeholder {  /* Firefox 19+ */
   color: #ccc;  
}

:-ms-input-placeholder {  
   color: #ccc;  
}
  fieldset{
        border: 1px solid #ccc;
        padding-top: 10px;
    }
    legend{
        font-size: 20px;
        color: red;
    }
</style>
<?php
require '../database/sales.php';
require '../database/products.php';
?>
<?php 
$pro=new products();
$sales=new sales();
?>
<script>
  $(function() {
    $( ".datepicker" ).datepicker({
      showOn: "button",
      buttonImage: "images/iconCalendar.gif",
      buttonImageOnly: true,
       "dateFormat":"yy-mm-dd"
    });
  });
  </script>
  <script>
       $(document).ready(function(){
           $(".sale").blur(function(){
             $price=$("input[name='sa']").val();
             $id=$("input[name='pro_id']").val();
             if($price == ""){
               document.getElementById("error1").innerHTML="Không được bỏ trống";             
             }else{
                   document.getElementById("error1").innerHTML=""; 
                   if(isNaN($price)){
                       document.getElementById("error1").innerHTML="Bạn chưa nhập số";  
                   }else{
                      if($id != ""){
                           $.ajax({
                           url:"modules/sales/priceajax.php",
                           type: 'POST',
                           data:"pro_id="+$id+"&km="+$price,
                           async: false,
                           success: function (data) {
                                $("#result").val(data);
                                $("#Km").show();
                           }
                       });
                      }
                   }
                   }
                
           });
           $("#num").blur(function(){
               $id=$("input[name='pro_id']").val();
               $a=$("#num").val();
               $.ajax({
                   url: "modules/sales/isCheck.php",
                   type: 'POST',
                   data: "num="+$a+"&id="+$id,
                   async: false,
                   success: function (data) {
                        $("#num_error").html(data);
                    }
               });
           });
           $("#tim").click(function(){
                $id=$("#id").val();
               if($id == ""){
                   alert("Ma id trong !");
               }else{
                           $.ajax({
                             url: "modules/sales/searchfast.php",
                             type: 'POST',
                             data: "id="+$id,
                             async: false,
                             success: function (data) {
                             $("#re").html(data);
                             }
                           });
               } 
           });
       });
  </script>
  <script language='javascript'>
 function isNumberKey(evt)
 {
 var charCode = (evt.which) ? evt.which : event.keyCode
 if (charCode > 31 && (charCode < 48 || charCode > 57))
 return false;
 return true;
 }
 </script>
 <div id="error">
      <?php 
           $er="";         
           $price_error="";
           if(isset($_POST['ok'])){               
               $pro_id=trim($_POST['pro_id']);              
               $pro_price=  trim($_POST['sa']);
               $pro_gia=trim($_POST['giakhuyenmai']);
               $start=$_POST['start'];
               $end=$_POST['end'];
               $notice=$_POST['notice'];
               if($pro_id==""||$pro_price == ""||$pro_gia == ""||$start == ""||$end ==""){
                   $er= "Không được bỏ trống phần có dấu *";
               }else{
                   if($pro->isExist($pro_id))
                   {                    
                           $exist=$sales->isExist($pro_id);

                            if($exist){
                                 $er="Sản phẩm đã là sản phẩm khuyễn mãi";
                            }else {
                               
                                if($pro_price> 0&&$pro_price <=100){
                               if(strtotime($start) > strtotime($end)){
                                 $er= 'Ngày kết thúc trước ngày bắt đầu';
                               }else{
                                  if($sales->insert($pro_id,$pro_price, $pro_gia, $start, $end, $notice)){
                                      $er= 'Thành công';
                                      $_POST['pro_id']="";             
                                      $_POST['sa']="";
                                      $_POST['start']="";
                                      $_POST['end']="";
                                      $_POST['notice']="";
                                  }else $er= 'Không thể thêm vào cơ sở dữ liệu';  
                               }                               
                           }else {
                              $price_error="Phải lớn 0 và nhỏ hơn hoặc bằng 100"; 
                            }
                            }
                              
                            
                                            
                                        
                   }else  $er= 'Không tồn tại mã sản phẩm như vậy';
                   
               }
           }
  ?>
     <strong><?php if(!empty($er)) echo $er; else echo 'Xin vui lòng điền đầy đủ thông tin dưới đây';;?></strong>
 </div>
 <div id="noidung">
 <div id="form">
<form action="" method="post">
    <fieldset>
        <legend>Thêm sản phẩm khuyến mãi</legend>
    <table>
        <tr>
            <td>Mã sản phẩm :</td>
            <td><input class="sale" type="text" placeholder="Mã sản phẩm" name="pro_id" id="proid" value="<?php 
            if(isset($_POST['pro_id'])){ echo $_POST['pro_id'];}
            ?>"/><span style="color:red">*</span></td>
        </tr>
        <tr>
            <td>Tỷ lệ % khuyến mãi :</td>
            <td><input type="text" placeholder="Tỷ lệ" name="sa" class="sale"
                       value="<?php if(isset($_POST['sa'])) echo $_POST['sa']; ?>"
                       ><span id="error1" style="color: red;">*<?php echo $price_error;?></span></td>
        </tr>
        <tr style="display: none;" id="Km">
            <td >Gia khuyen mai:</td>
            <td ><input type="text" readonly="true" value="" id="result" name="giakhuyenmai"/></td>
        </tr>
        <tr>
            <td>Ngày bắt đầu :</td>
            <td><input type="text" placeholder="Ngày bắt đầu" readonly="true" class="datepicker"  name="start" value="<?php if (isset($_POST['start'])) echo $_POST['start']; ?>"><span style="color: red;">*</span></td>
        </tr>
        <tr>
            <td>Ngày kết thúc :</td>
            <td><input type="text" placeholder="Ngày kết thúc" readonly="true" class="datepicker" name="end" value="<?php if(isset($_POST['end'])) echo $_POST['end']; ?>"><span style="color: red;">*</span></td>
        </tr>
        <tr>
        <td>Ghi chú :</td>
        <td><textarea name="notice" cols="10" placeholder="Ghi chú" rows="9"><?php if(isset($_POST['notice'])) echo $_POST['notice']; ?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-left: 100px;"><input type="submit" value="Thêm mới" name="ok" style="height: 50px; width: 110px;"></td>
        </tr>
    </table>
    </fieldset>
</form>
     </div>
     <div id="menunhanh">
         <div id="search">
             <div id="information">
             <h3>Tìm kiếm nhanh</h3>
             <form>
                 <table>
                     <tr>
                         <td>Nhập mã số</td>
                     </tr>
                     <tr>
                         <td><input type="text" id="id" onKeyPress="return isNumberKey(event)"></td>
                     </tr>
                     <tr><td><input type="button" value="Tra cứu" id="tim"></td></tr>
                 </table>
             </form>
             </div>
             <div id="re">
                 
             </div>
         </div>
         <div id="link">
         <h3>Menu nhanh</h3>
         <ul>
            <li><a href="index.php?page=category&act=list">Xem danh mục loại sản phẩm</a></li>
            <li><a href="index.php?page=products&act=list">Xem danh sách sản phẩm</a></li>
            <li><a href="index.php?page=products&act=search">Tìm kiếm đa năng</a></li>
            <li><a href="index.php?page=orders&act=listfull">Đơn hàng</a></li>
         </ul>
         </div>
     </div>
 </div>
