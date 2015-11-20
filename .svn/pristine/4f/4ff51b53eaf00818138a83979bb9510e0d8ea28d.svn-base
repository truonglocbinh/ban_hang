<?php
require '../database/customers.php';
$intro=new customers();
if(!isset($_GET['id'])||(empty($_GET['id']))){
    header("location:".baseurl."admin/index.php?page=customers&act=list");
    exit();
}
$id=$_GET['id'];
$data=$intro->showOne($id);
if(empty($data)){
    header("location:".baseurl."admin/index.php?page=customers&act=list");
    exit();
}
?>
<?php 
    $er="";
    $error="";
    if(isset($_POST['ok'])){
        if($_POST['value']==""){
            $error="Không được bỏ trống phần này";
        }  else {
            $value=$_POST['value'];
            if($intro->update($id,$value)){
                $er= 'Cập nhật thành công';
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
        background-color: #F7F7F7;
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
        padding-top: 20px;
    }
    #menunhanh{
        width: 249px;
        height: 760px;
        background-color: #F7F7F7;
        border: 1px solid lavender;
    }
    textarea{
        width: 500px;
        height: 700px;
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
           <h2>Cập nhật thông tin khách hàng</h2>
           <span><?php if(!empty($er)) echo $er; else echo "Vui lòng điền đầy đủ thông tin dưới đây"; ?></span>
        </div>
        <div id="form">

<form method="post" action="">
    <fieldset><legend>Cập nhật tài liệu KH</legend>
<table>
    <tr>
        <td>Nội dung:</td>
    <td>
        <textarea  class="ckeditor" name="value"><?php if(isset($_POST['value']))echo $_POST['value']; else echo $data['cus_content']; ?></textarea><span style="color: red">* <?php echo$error;?></span>	
    </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td style="padding-left: 200px;"><input type="submit" name="ok" value="Cập nhật" style="color: #fff;"/></td>
    </tr>
</table>
    </fieldset>
</form>
        </div>
    </div>
    <div id="menunhanh">
        
    </div>
