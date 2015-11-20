<?php
require '../database/products.php';
require '../database/categories.php';
?>
<style>
    #error{
        width: 980px;
        padding-left: 20px;
        padding-top: 9px; 
        font-size: 20px;
        color: mediumblue;
        height: 41px;
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
    #form h2{
        margin-bottom: 20px;
    }
    #form .input{
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
    #form .input:focus {
        outline: none !important;
        border:1px solid #3fb8e8 ;
        box-shadow: 0 0 10px #3fb8e8;
    }   

    #form table td{
        padding-left: 2px;
        padding-bottom: 5px;
    }
    #form .select{
        width: 100px;
        height: 25px
    }
    #form #textarea{
        padding: 10px;
        font-size: 20px;
        width: 540px;
        height: 190px;
        border:solid 1px #ccc; 
        -moz-box-shadow: inset 0 0 4px rgba(0,0,0,0.2); 
        -webkit-box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.2); 
        box-shadow: inner 0 0 4px rgba(0, 0, 0, 0.2);
        -webkit-border-radius: 3px; 
        -moz-border-radius: 3px; 
        border-radius: 8px;
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
    #textarea:focus{
        outline: none !important;
        border:1px solid #3fb8e8 ;
        box-shadow: 0 0 10px #3fb8e8;
    }
   /* #menunhanh{

        width: 230px;
        padding-left: 20px;
        float: left;
        height: 700px;
        padding-top: 10px;
        
    }*/
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
        padding-top: 7px;
    }
    legend{
        font-size: 20px;
        color: red;
    }
    table tr td:first-child{
        font-size: 20px;
    }
</style>
<script src="scripts/script.js"></script>
<script>
    $(function() {
        $("#datepicker").datepicker({
            showOn: "button",
            buttonImage: "images/iconCalendar.gif",
            buttonImageOnly: true,
            "dateFormat": "yy-mm-dd"
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
    $pro = new products();
    $cate = new categories();
    $data = $cate->showAll();
    ?>
    <?php
    $er = "";
    $error_number = "";
    $error_price = "";
    $type="";
    $type1="";
    if (isset($_POST['ok'])) {
        $price = trim($_POST['price']);
        $number = trim($_POST['number']);
        $tensanpham=trim($_POST['name']);
        $type=$_POST['type'];
        $type1=$_POST['type1'];
        
        if ($_POST['name'] == "" || $_POST['price'] == "" || $_POST['infor'] == "" || $_POST['full'] == "" || $_POST['number'] == "" || $_POST['date'] == "" || $_POST['type'] == 0 || $_FILES['img']['name'] == "") {
            $er = 'Trường có dấu * là trường bắt buộc';
        } else {
            if(strlen($tensanpham)>20){
                $er="Tên sản phẩm không quá 30 ký tự";
            }else{
                if (!is_numeric($price)) {
                $error_price = "Phải là số!";
            } else {
                if (strchr($price, ".")) {
                    $error_price = "Phải là số nguyên !";
                } else {
                    if (!is_numeric($number) || $number == 0) {
                        $error_number = "Phải là số hoặc lớn hơn 0";
                    } else {
                       
                        if ($_FILES['img']['type'] == "image/jpeg" || $_FILES['img']['type'] == "image/png" || $_FILES['img']['type'] == "image/gif") {
                            if ($_FILES['img']['size'] > 1048576) {
                                $er = "File không được lớn hơn 1mb";
                            } else {
                                $pro_hot = 0;
                                $pro_new = 0;
                                switch ($_POST['type1']) {
                                    case 1:$pro_hot = 1;
                                        break;
                                    case 2:$pro_new = 1;
                                        break;
                                }
                                move_uploaded_file($_FILES['img']["tmp_name"], "../images/products/" . $_FILES["img"]["name"]);
                                if ($pro->insert(trim($_POST['name'])
                                                , trim($_POST['price'])
                                                , trim($_POST['infor'])
                                                , trim($_POST['full'])
                                                , $_FILES["img"]["name"]
                                                , trim($_POST['number'])
                                                , trim($_POST['date'])
                                                , trim($_POST['type']), $pro_hot, $pro_new
                                        )) {
                                    $_POST['name'] = "";
                                    $_POST['price'] = "";
                                    $_POST['infor'] = "";
                                    $_POST['full'] = "";
                                    $_POST['number'] = "";
                                    $_POST['date'] = "";
                                    $type=0;
                                    $type1=0;
                                    

                                    $er = 'Thành công';
                                     
                                } else
                                    $er = 'Không thể chèn vào cơ sở dữ liệu';
                            }
                        }else {

                            $er = "Kiểu file không hợp lệ";
                        }
                    }
                }
            }
            }
        }
    }
    $type1=0;
    ?> 
    <strong style="color: #8a6d3b;"><?php if (!empty($er))
        echo $er;
    else
        echo "Vui lòng điền đầy đủ thông tin dưới đây ";
    ?></strong>
</div>
<div id="noidung">

    <div id="form">
        <h2>Thêm sản phẩm mới</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <fieldset><legend>Thêm sản phẩm mới</legend>
                <table>
                    <tr>
                        <td>Tên sản phẩm:</td>
                        <td><input type="text" placeholder="Tên sản phẩm" name="name" size="30" value="<?php
    if (isset($_POST['name']))
        echo $_POST['name'];
    ?>" class="input"><span style="color: red;" >*</span></td>
                    </tr>
                    <tr>
                        <td>Giá</td>
                        <td><input type="text" name="price" size="30" placeholder="Giá sản phẩm" onKeyPress="return isNumberKey(event)"
                                   value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>" class="input"
                                   ><span style="color: red;">* <?php echo $error_price; ?></span></td>
                    </tr>
                    <tr>
                        <td>Thông tin:</td>
                        <td><input type="text" name="infor" size="30" placeholder="Thông tin sản phẩm"
                                   value="<?php if (isset($_POST['infor'])) echo $_POST['infor']; ?>" class="input"
                                   ><span style="color: red;">*</span></td>
                    </tr>
                    <tr>
                        <td>Đặc tả kỹ thuật:</td>
                        <td><textarea name="full" cols="28" rows="9" placeholder="Đặc tả kỹ thuật" id="textarea"><?php if (isset($_POST['full'])) echo $_POST['full']; ?></textarea><span style="color: red;">*</span></td>
                    </tr>
                    <tr>
                        <td>Số lượng:</td>
                        <td><input type="text" name="number" size="30" placeholder="Số lượng"  onKeyPress="return isNumberKey(event)"
                                   value="<?php if (isset($_POST['number'])) echo $_POST['number']; ?>" class="input"
                                   ><span style="color: red;">*<?php echo $error_number; ?></span></td>
                    </tr>
                    <tr>
                        <td>Ngày nhập:</td>
                        <td><input type="text" id="datepicker" name="date"  readonly ="true" class="input" placeholder="Ngày nhập hàng" value="<?php if (isset($_POST['date'])) echo $_POST['date']; ?>" ><span style="color: red;">*</span></td>
                    </tr>
                    <tr>
                        <td>
                            Danh mục :
                        </td>
                        <td> <select name="type" class="select"> 
                                <option value="0" <?php if(isset($_POST['type'])){
                                        if($_POST['type'] == 0){
                                            echo "selected='selected'";
                                        }
                                    } ?>>--Loại--</option>
<?php foreach ($data as $value) { ?>
                                    <option value="<?php echo $value['cate_id']; ?>" <?php if(isset($_POST['type'])){
                                        if($_POST['type'] == $value['cate_id']){
                                            echo "selected='selected'";
                                        }
                                    } ?> ><?php echo $value['cate_name']; ?></option>
                                <?php } ?>
                            </select><span style="color: red;">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Loai hàng:</td>
                        <td>
                            <select name="type1" class="select">
                                <option value="0"<?php if(isset($type1)){
                                    if($type1 == 0) echo "selected='selected'";
                                }?> >--Bình thường--</option>
                                <option value="1" <?php if(isset($_POST['type1'])){
                                    if($_POST['type1'] == 1) echo "selected='selected'";
                                } ?>>Hàng hot</option>
                                <option value="2" <?php if(isset($_POST['type1'])){
                                    if($_POST['type1'] == 2) echo "selected='selected'";
                                } ?>>Hàng mới</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Hình ảnh:</td>
                        <td><input type="file" name="img" size="30" id="file" value="Thêm"/><span style="color: red;">*</span></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td style="padding-left: 150px;"><input type="submit" name="ok" value="Thêm mới" /></td>
                    </tr>
                </table>
            </fieldset>
        </form>
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
</div>
</div>
