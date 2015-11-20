<?php
require ("../database/categories.php");
?>
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
     #form .input{
        font-size: 20px;
        padding: 5px;
        width: 200px;
        
        border:solid 1px #ccc; 
        -moz-box-shadow: inset 0 0 4px rgba(0,0,0,0.2); 
        -webkit-box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.2); 
        box-shadow: inner 0 0 4px rgba(0, 0, 0, 0.2);
        -webkit-border-radius: 3px; 
        -moz-border-radius: 3px; 
        border-radius: 8px;
    }
    #form .input:focus {
    outline: none !important;
    border:1px solid #3fb8e8 ;
    box-shadow: 0 0 10px #3fb8e8;
}   
    #form table td{
        padding-left: 2px;
        padding-bottom: 15px;
    }
    input[type='submit']{
  font-size: 20px;
  color: #ffffff;
  width: 100px;
  height: 50px; 
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
        border-left: 1px solid #139ff7;
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
 <div id="error">
     <?php 
  $er="";
  if(!isset($_GET['id'])||(empty($_GET['id']))){
    header("location:".baseurl."admin/index.php?page=category&act=list");
    exit();
}
  $id=$_GET['id'];
  $cate1=new categories();
  $data=$cate1->showOne($id);
  if(empty($data)){
    header("location:".baseurl."admin/index.php?page=category&act=list");
    exit();
}
  $error_name="";
  $error_infor="";
  $error_status="";
  $cate=new categories();
  if(isset($_POST['ok'])){   
      if($_POST['name']==""){
          $error_name="Không được bỏ trống !";       
      }else {
         if(trim($_POST['name'])==$data['cate_name']){
            if($cate->update($id,trim($_POST['name']), trim($_POST['infor']),trim( $_POST['status']))){
             $er="Bạn đã cập nhật thành công !";
         }  else {
            $er="Cập nhật thất bại !";
         }
         }else{
             if($cate->isExistName(trim($_POST['name'])))$error_name="Đã tồn tại!";
         else {
         if($cate->update($id,trim($_POST['name']), trim($_POST['infor']),trim( $_POST['status']))){
           $er="Bạn đã cập nhật thành công";
         }  else {
            $er="Cập nhật thất bại";
         }
            
         }
      }
  }
  }?>
     <strong style="color: #8a6d3b;"><?php if (!empty($er))echo $er;
                   else echo 'Vui lòng điền đầy đủ thông tin';
     ?></strong>
 </div>
<div id="noidung">
    
    <div id="form">
        <h2 style="margin-bottom: 20px;">Cập nhật thông tin danh mục sản phẩm</h2>
        <form method="post" action="">
   <fieldset>
       <legend>Cập nhật danh mục</legend>
<table >
    <tr>
        <td>Tên danh mục :</td>
        <td><input type="text"size="30" name="name" class="input" placeholder="Tên danh mục"
                                              value="<?php if(isset($_POST['name'])) echo $_POST['name']; 
                                              else echo $data['cate_name'];
                                              ?>" class="input"     
                   > <span style="color: red; font-size: 18px;">*<?php echo $error_name;?></span></td>
    </tr>
    <tr>
        <td>Thông tin mô tả: </td>
        <td><textarea rows="10" cols="30" name="infor" placeholder="Thông tin mô tả"><?php if(isset($_POST['infor']))echo $_POST['infor'];
               else echo $data['cate_info'];
        ?></textarea> <span><?php echo $error_infor;?></span></td>
    </tr>
    <tr>
        <td>Trạng thái:</td>
        <td><input type="text" size="50" name="status" class="input" placeholder="Trạng thái"
                                             value="<?php if(isset($_POST['status'])) echo $_POST['status']; else echo $data['cate_status'];?>" class="input"
                   > <span><?php echo $error_status;?></span></td>
    </tr>
    <tr>
        <td></td>
        <td style="padding-left: 110px;"><input type="submit" name="ok" value="Cập nhật"></td>
    </tr>
</table>
   </fieldset>          
</form>
    </div>
     <div id="menunhanh">
         <h3>Menu nhanh</h3>
         <ul>
            <li><a href="#">Xem danh mục loại sản phẩm</a></li>
            <li><a href="#">Xem danh sách sản phẩm</a></li>
            <li><a href="#">Tìm kiếm đa năng</a></li>
            <li><a href="#">Đơn hàng</a></li>
         </ul>
     </div>
</div>