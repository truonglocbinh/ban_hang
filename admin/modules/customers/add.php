<?php
require '../database/customers.php';
$intro=new customers();
?>
<?php 
    $er="";
    $error="";
    if(isset($_POST['ok'])){
        if($_POST['value']==""){
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
        background-color: #F7F7F7;
    }
    #head{
        width: 700px;
        padding-left: 50px;
        padding-top: 9px;
        color: #7401DF;
        height: 80px;
        border-bottom:  1px solid #CCC;
    }
    #form{
        width: 749px;
        height: 650px;
        padding-top: 20px;
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
<script src="scripts/script.js"></script>
<script src="libraries/ckeditor/ckeditor.js"></script>
    <div id="customer">
        <div id="head">
           <h2>Thêm thông tin khách hàng</h2>
           <span><?php if(!empty($er)) echo $er; else echo "Vui lòng điền đầy đủ thông tin dưới đây"; ?></span>
        </div>
        <div id="form">

<form method="post" action="">
    <fieldset><legend>Thêm tài liệu KH</legend>
<table>
    <tr>
        <td>Nội dung:</td>
    <td>
        <textarea cols="48" rows="6" class="ckeditor" name="value"></textarea><span style="color: red">* <?php echo$error;?></span>	
    </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td style="padding-left: 200px;"><input type="submit" name="ok" value="Thêm" style="color: #ffffff;"/></td>
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