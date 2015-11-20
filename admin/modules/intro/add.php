<?php
require '../database/intro.php';
$intro=new intro();
?>
<?php 
    $er="";
    $error="";
    if(isset($_POST['ok'])){
        if($_POST['value']== ""){
            $error="Không được bỏ trống phần này";
        }  else {
            $value=$_POST['value'];
            if($intro->insert($value)){
                $er= 'Thêm thành công';
                $_POST['value']="";
            }  else {
                $er= 'Thất bại';
            }
        }
        
    }
?>
<style>
    #customer{
        width: 750px;
        height: 760px;
        float: left;
        background-color: #FAFAFA;
    }
    #head{
        width: 700px;
        padding-left: 50px;
        padding-top: 9px;
        color: #888;
        height: 80px;
        border-bottom:  1px solid #CCC;
    }
    #form{
        width: 749px;
        height: 650px;
        float: left;
        padding-top: 20px;
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
<script src="libraries/ckeditor/ckeditor.js"></script>
    <div id="customer">
        <div id="head">
           <h2>Thêm thông giới thiệu</h2>
           <span><?php if(!empty($er)) echo $er; else echo "Vui lòng điền đầy đủ thông tin dưới đây"; ?></span>
        </div>
        <div id="form">
<form method="post" action="">
    <fieldset><legend>Thêm thông tin giới thiệu</legend>
<table>
    <tr>
        <td>Nội dung:</td>
    <td>
        <textarea cols="48" rows="6" class="ckeditor" name="value"></textarea><span style="color: red">* <?php echo$error;?></span>	
    </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td style="padding-left: 200px;"><input type="submit" name="ok" value="Thêm" style="color: #fff;"/></td>
    </tr>
</table>
    </fieldset>
</form>
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
