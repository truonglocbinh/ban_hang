<?php require '../database/documents.php'; ?>
<?php  $doc= new documents();
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
$error="";
if(isset($_POST['submit'])){
    $doc_title=  trim($_POST['doc_title']);
    $doc_content=trim($_POST['doc_content']);
    $doc_type=$_POST['doc_type'];
    $doc_vip=$_POST['vip'];
    if($doc_title == ""||$doc_content == ""){
        $error="Không được bỏ trống phần có dấu *";
    }else{
        if($doc->update($id,$doc_title, $doc_content, $doc_type,$doc_vip)){
            $_POST['doc_title']="";
            $_POST['doc_content']="";
            $error="Chèn dữ liệu thành công";
        }else{
            $error="Có lỗi xảy ra";
        }
    }
}
?>
<style>
    #nd{
        width: 750px;
        height: 760px;
        float: left;
    }
    #head{
        width: 700px;
        padding-left: 50px;
        padding-top: 20px;
        height: 80px;
        color: #0101DF;
        
    }
    #form{
        padding-top: 20px;
        height: 620px;
        background-color: #F8F8F8;
    }
    #form input{
        font-size: 20px;
        padding: 5px;
        width: 300px;
        
        border:solid 1px #ccc; 
        -moz-box-shadow: inset 0 0 4px rgba(0,0,0,0.2); 
        -webkit-box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.2); 
        box-shadow: inner 0 0 4px rgba(0, 0, 0, 0.2);
        -webkit-border-radius: 3px; 
        -moz-border-radius: 3px; 
        border-radius: 8px;
    }
     #form input:focus {
    outline: none;
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
  background-color: #9DC45F;
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
    #menunhanh{
        width: 229px;
        padding-left: 20px;
        float: left;
        height: 750px;
        padding-top: 10px;
        border-left: 1px solid #D8D8D8;
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
    table tr td:first-child{
    font-size: 20px;
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
<script src="libraries/ckeditor/ckeditor.js"></script>
<div id="nd">
    <div id="head">
        <h1 style="font-size: 40px;">Cập nhật liệu sử dụng</h1>
        <span><?php if(!empty($error)) echo $error;else echo 'Vui lòng điển đầy đủ thông tin dưới đây'; ?></span>
    </div>
    <div id="form">
        <form action="" method="post">
<fieldset>
	<legend>Cập nhật tài liệu
</legend><table>
  <tr>
    <td >Tiêu đề tài liệu </td>
    <td ><input type="text" name="doc_title" 
                           value="<?php if(isset($_POST['doc_title'])) echo $_POST['doc_title']; else echo $data['doc_title'];?>"
                           ><span style="color: red; font-size: 18px;">*</span></td>
  </tr>
  <tr>
    <td>Nội dung :</td>
    <td>
        <textarea cols="48" rows="6" class="ckeditor" name="doc_content"><?php if(isset($_POST['doc_content'])) echo $_POST['doc_content'];else echo $data['doc_content']; ?></textarea>	
    </td>
  </tr>
  <tr>
      <td>
          Loại tài liệu :
      </td>
      <td>
          <select name="doc_type" style="width: 100px; height: 25px;">
              <option value="IC" >IC</option>
              <option value="Pin" <?php if($data['doc_type']=="Pin") echo "selected='selected'"; ?>>Pin</option>
              <option value="Thủ thuật" <?php if($data['doc_type']=="Thủ thuật") echo "selected='selected'"; ?>>Thủ thuật</option>
          </select>
      </td>
  </tr>
  <tr>
      <td>Tài liệu nổi bật</td>
      <td>
          <select name="vip" style="width: 100px; height: 25px;">
              <option value="0" <?php if($data['doc_vip'] == 0) echo "selected='selected'"; ?>>Bình thường</option>
              <option value="1" <?php if($data['doc_vip'] == 1) echo "selected='selected'"; ?>>Vip</option>
          </select>
      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="padding-left: 150px;"><input type="submit" name="submit" value="Cập nhật" style="width: 100px; height: 50px;"/></td>
  </tr>
</table>
</fieldset>
</form>
    </div>
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

