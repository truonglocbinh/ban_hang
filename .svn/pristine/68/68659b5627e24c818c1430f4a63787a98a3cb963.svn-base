<?php require '../database/documents.php'; ?>
<?php  $doc= new documents();
$error="";
if(isset($_POST['submit'])){
    $doc_title=  trim($_POST['doc_title']);
    $doc_content=trim($_POST['doc_content']);
    $doc_type=$_POST['doc_type'];
    $doc_vip=$_POST['vip'];
    if($doc_title == ""||$doc_content == ""){
        $error="Không được bỏ trống phần có dấu *";
    }else{
        if($doc->insert($doc_title, $doc_content, $doc_type,$doc_vip)){
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
   #cssmenu,
#cssmenu ul,
#cssmenu ul li,
#cssmenu ul li a {
  margin: 0;
  padding: 0;
  border: 0;
  list-style: none;
  line-height: 1;
  display: block;
  position: relative;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
#cssmenu {
    padding-top: 20px;
    height: 740px;
  width: 250px;
  float: left;
  font-family: Helvetica, Arial, sans-serif;
  color: #ffffff;
}
#cssmenu ul ul {
  display: none;
}
.align-right {
  float: right;
}
#cssmenu > ul > li > a {
  padding: 15px 20px;
  border-left: 1px solid #1682ba;
  border-right: 1px solid #1682ba;
  border-top: 1px solid #1682ba;
  cursor: pointer;
  z-index: 2;
  font-size: 14px;
  font-weight: bold;
  text-decoration: none;
  color: #ffffff;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.35);
  background: #36aae7;
  background: -webkit-linear-gradient(#36aae7, #1fa0e4);
  background: -moz-linear-gradient(#36aae7, #1fa0e4);
  background: -o-linear-gradient(#36aae7, #1fa0e4);
  background: -ms-linear-gradient(#36aae7, #1fa0e4);
  background: linear-gradient(#36aae7, #1fa0e4);
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.15);
}
#cssmenu > ul > li > a:hover,
#cssmenu > ul > li.active > a,
#cssmenu > ul > li.open > a {
  color: #eeeeee;
  background: #1fa0e4;
  background: -webkit-linear-gradient(#1fa0e4, #1992d1);
  background: -moz-linear-gradient(#1fa0e4, #1992d1);
  background: -o-linear-gradient(#1fa0e4, #1992d1);
  background: -ms-linear-gradient(#1fa0e4, #1992d1);
  background: linear-gradient(#1fa0e4, #1992d1);
}
#cssmenu > ul > li.open > a {
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.15), 0 1px 1px rgba(0, 0, 0, 0.15);
  border-bottom: 1px solid #1682ba;
}
#cssmenu > ul > li:last-child > a,
#cssmenu > ul > li.last > a {
  border-bottom: 1px solid #1682ba;
}
.holder {
  width: 0;
  height: 0;
  position: absolute;
  top: 0;
  right: 0;
}
.holder::after,
.holder::before {
  display: block;
  position: absolute;
  content: "";
  width: 6px;
  height: 6px;
  right: 20px;
  z-index: 10;
  -webkit-transform: rotate(-135deg);
  -moz-transform: rotate(-135deg);
  -ms-transform: rotate(-135deg);
  -o-transform: rotate(-135deg);
  transform: rotate(-135deg);
}
.holder::after {
  top: 17px;
  border-top: 2px solid #ffffff;
  border-left: 2px solid #ffffff;
}
#cssmenu > ul > li > a:hover > span::after,
#cssmenu > ul > li.active > a > span::after,
#cssmenu > ul > li.open > a > span::after {
  border-color: #eeeeee;
}
.holder::before {
  top: 18px;
  border-top: 2px solid;
  border-left: 2px solid;
  border-top-color: inherit;
  border-left-color: inherit;
}
#cssmenu ul ul li a {
  cursor: pointer;
  border-bottom: 1px solid #32373e;
  border-left: 1px solid #32373e;
  border-right: 1px solid #32373e;
  padding: 10px 20px;
  z-index: 1;
  text-decoration: none;
  font-size: 13px;
  color: #eeeeee;
  background: #49505a;
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1);
}
#cssmenu ul ul li:hover > a,
#cssmenu ul ul li.open > a,
#cssmenu ul ul li.active > a {
  background: #424852;
  color: #ffffff;
}
#cssmenu ul ul li:first-child > a {
  box-shadow: none;
}
#cssmenu ul ul ul li:first-child > a {
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1);
}
#cssmenu ul ul ul li a {
  padding-left: 30px;
}
#cssmenu > ul > li > ul > li:last-child > a,
#cssmenu > ul > li > ul > li.last > a {
  border-bottom: 0;
}
#cssmenu > ul > li > ul > li.open:last-child > a,
#cssmenu > ul > li > ul > li.last.open > a {
  border-bottom: 1px solid #32373e;
}
#cssmenu > ul > li > ul > li.open:last-child > ul > li:last-child > a {
  border-bottom: 0;
}
#cssmenu ul ul li.has-sub > a::after {
  display: block;
  position: absolute;
  content: "";
  width: 5px;
  height: 5px;
  right: 20px;
  z-index: 10;
  top: 11.5px;
  border-top: 2px solid #eeeeee;
  border-left: 2px solid #eeeeee;
  -webkit-transform: rotate(-135deg);
  -moz-transform: rotate(-135deg);
  -ms-transform: rotate(-135deg);
  -o-transform: rotate(-135deg);
  transform: rotate(-135deg);
}
#cssmenu ul ul li.active > a::after,
#cssmenu ul ul li.open > a::after,
#cssmenu ul ul li > a:hover::after {
  border-color: #ffffff;
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
<script src="scripts/script.js"></script>
<script src="libraries/ckeditor/ckeditor.js"></script>
<div id="nd">
    <div id="head">
        <h1 style="font-size: 40px;">Thêm tài liệu sử dụng</h1>
        <span><?php if(!empty($error)) echo $error;else echo 'Vui lòng điển đầy đủ thông tin dưới đây'; ?></span>
    </div>
    <div id="form">
        <form action="" method="post">
<fieldset>
	<legend>Thêm mới tài liệu mới
</legend><table>
  <tr>
    <td >Tiêu đề tài liệu </td>
    <td ><input type="text" name="doc_title" 
                           value="<?php if(isset($_POST['doc_title'])) echo $_POST['doc_title'];?>"
                           ><span style="color: red; font-size: 18px;">*</span></td>
  </tr>
  <tr>
    <td>Nội dung :</td>
    <td>
        <textarea cols="48" rows="6" class="ckeditor" name="doc_content"><?php if(isset($_POST['doc_content'])) echo $_POST['doc_content']; ?></textarea>	
    </td>
  </tr>
  <tr>
      <td>
          Loại tài liệu :
      </td>
      <td>
          <select name="doc_type" style="width: 100px; height: 25px;">
              <option value="IC">IC</option>
              <option value="Pin">Pin</option>
              <option value="Thủ thuật">Trick</option>
          </select>
      </td>
  </tr>
  <tr>
      <td>Tài liệu nổi bật</td>
      <td>
          <select name="vip" style="width: 100px; height: 25px;">
              <option value="0">Bình thường</option>
              <option value="1">Vip</option>
          </select>
      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="padding-left: 150px;"><input type="submit" name="submit" value="Thêm mới" style="width: 100px; height: 50px; color: #ffffff"/></td>
  </tr>
</table>
</fieldset>
</form>
    </div>
</div>
<div id="cssmenu">
        <ul>
   <li><a href='index.php'><span>Trang chủ</span></a></li>
   <li class='active has-sub'><a href='#'><span>Sản phẩm</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>Quản lý kho hàng</span></a>
            <ul>
               <li><a href='index.php?page=products&act=add'><span>Thêm sản phẩm mới</span></a></li>
               <li class='last'><a href='index.php?page=products&act=list'><span>Xem danh sách sản phẩm</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>Sản phẩm khuyến mãi</span></a>
            <ul>
               <li><a href='index.php?page=sales&act=add'><span>Thêm sản phẩm khuyến mãi</span></a></li>
               <li class='last'><a href='index.php?page=sales&act=list'><span>Xem danh sách sản phẩm </span></a></li>
            </ul>
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Tài liệu</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>Kỹ thuật</span></a>
            <ul>
               <li><a href='index.php?page=documents&act=add'><span>Thêm tài liệu mới</span></a></li>
               <li class='last'><a href='index.php?page=documents&act=list'><span>Xem danh sách</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>Khách hàng</span></a>
            <ul>
               <li><a href='index.php?page=sales&act=add'><span>Thêm sản phẩm khuyến mãi</span></a></li>
               <li class='last'><a href='index.php?page=sales&act=list'><span>Xem danh sách sản phẩm </span></a></li>
            </ul>
         </li>
      </ul>
   </li>
   <li class='last'><a href='index.php?page=orders&act=listfull'><span>Đơn hàng</span></a></li>
</ul>
     </div>

