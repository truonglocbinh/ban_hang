<?php
require '../database/products.php';
require '../database/categories.php';
$pro=new products();
$cate=new categories();
$data=$cate->showAll();
$data1="";
$id="";
$name="";
$price="";
$date="";
$number="";
$type="";
$gethot="";
$searchtype="";
$tongsobanghi="";
$tongsotrang=0;
$curent=0;
if(!isset($_GET['trang'])){ 
  $curent=1;
 $vitri = 0;
}else{
 $vitri=($_GET['trang']-1)*10; 
 $curent=$_GET['trang'];
}
if(isset($_GET['ok'])){
    
    $id=$_GET['id'];
    $name=trim($_GET['name']);
    $price=$_GET['price'];
    $date=$_GET['date'];
    $number=$_GET['number'];
    $type=$_GET['type'];
    $hot=0;
    $new=0;
    $gethot=$_GET['hot'];
    switch ($_GET['hot']){
        case 1:{$hot=1; $new=0;break;}
        case 2:{$hot=0; $new=1;break;}
    }
    $searchtype=$_GET['searchtype'];
    $data1= $pro->search($id, $name, $price, $number, $date, $type, $hot, $new,$searchtype); 
    $tongsobanghi=  count($data1);
}
        $data2=array();
        if(!empty($data1)){
        for($i=$vitri;$i<$vitri+10;$i++){
           $data2[]=$data1[$i];
           if($i == ($tongsobanghi-1))break;
        }
      }
?>
<style>
    
    #timkiem{
        width: 1000px;
        height: 146px;
        padding-top: 15px;
       
       
    }
    #timkiem table td{
        font-size: 16px;
        padding: 3px;
    }
    #timkiem input,select{
       
        font-size: 14px;
        height: 30px;
        padding: 3px;
    }
    #timkiem select{
         padding:3px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    background: #f8f8f8;
    color:#000;
    border:none;
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
    overflow: hidden;
    }
    @media screen and (-webkit-min-device-pixel-ratio:0) {
    select {padding-right:18px}
}
    #timkiem input{
        border:solid 1px #ccc; 
        -moz-box-shadow: inset 0 0 4px rgba(0,0,0,0.2); 
        -webkit-box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.2); 
        box-shadow: inner 0 0 4px rgba(0, 0, 0, 0.2);
        -webkit-border-radius: 3px; 
        -moz-border-radius: 3px; 
        border-radius: 8px;
    }
     #timkiem input:focus {
        outline: none !important;
        border:1px solid #3fb8e8 ;
        box-shadow: 0 0 10px #3fb8e8;
    }   
    #timkiem input[type='submit']{
        font-size: 17px;
        color: whitesmoke;
        border-radius: 15px;
        width: 100px;
        background-color: #1392e9;
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
    #result{
        height: 530px;
       
        padding-top: 20px;
    }
     #result  table{
        padding: 5px;
        border-collapse: collapse;
    }
    #result table td{
         border: 1px solid #CCCCCC;
         text-align: center;
         
    }
   #result table tbody td{
        font-size: 18px;
        width: 890px;
        height: 45px;
        /*background-color: rgb(238, 238, 238);*/
        background-color: #EFF5FB;
    }
    #result .title td{
        font-size: 18px;
        font-weight: normal;
        color: #ffffff;
        width: 890px;
        height: 30px;
       /* background-color:  rgb(112, 196, 105);*/
       background-color: #A5DF00;
    }    
    #pages{
        height: 44px;
        border-top: 1px solid #D8D8D8;
        
    }
    #pages ul li{
        height: 44px;
        line-height: 44px;
        padding: 0 10px;
        float: left;
        margin: 0px;
        list-style-type: none;
        border-right:1px solid #CCC; 
    }
    #pages ul li a{      
        font-size: 18px;
        color: #0099FF;      
        text-decoration: none;
    }
</style>
<script type="text/javascript">
        $(document).ready(function(){
            $("a.del").click(function(){
               if(confirm("Việc xóa sản phẩm này có thể ảnh hưởng tới một số dữ liệu khác!Bạn có muốn tiếp tục xóa ?")){
                  $id=$(this).attr("name"); 
                  $(this).parent().parent().fadeOut("slow");                 
                  $.ajax({
                      "url": "modules/products/deleteajax.php",                     "type":"post",
                      "data":"uid="+$id,
                      "async":"false",
                      success: function (data) {
                       
                    }
                  });
               } 
               return false;
            });
            
        });
        </script>
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
});

        </script>
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
<div id="timkiem">
    <form action="" method="get">
        <table>
            <tr>
                <td>Mã sản phẩm</td>
                <td>
                    <input type="hidden" name="page" value="products" />
                    <input type="hidden" name="act" value="search" />
                    <input type="text"  placeholder="Mã sản phẩm" name="id" value="<?php if(isset($_GET['id']))echo $_GET['id']; ?>">
                </td>
                <td>Tên sản phẩm</td>
                <td><input type="text" placeholder="Tên sản phẩm" name="name" value="<?php if(isset($_GET['name'])) echo $_GET['name']; ?>"/></td>
                <td>Giá</td>
                <td><input type="text" placeholder="Giá" name="price" value="<?php if(isset($_GET['price'])) echo $_GET['price']; ?>"></td>
                <td>Ngày nhập hàng</td>
                <td><input type="text" id="datepicker" name="date" size="15" placeholder="Ngày nhập hàng" value="<?php if(isset($_GET['date'])) echo $_GET['date'];?>"/></td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td><input type="text" placeholder="Số lượng" name="number" value="<?php if(isset($_GET['number'])) echo $_GET['number']; ?>"  onKeyPress="return isNumberKey(event)"/></td>
                <td>Danh mục</td>
                <td>
                    <select name="type">
                        <option value="0">Tất cả</option>
                        <?php foreach ($data as $value) {?>
                        <option value="<?php echo $value['cate_id'] ?>" <?php 
                        if(isset($_GET['type'])){
                            if($_GET['type']== $value['cate_id']) echo"selected='selected'";
                        }                   
                            ?>><?php echo $value['cate_name']; ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td>Chủng loại</td>
                <td>
                    <select name="hot">
                        <option value="0">Bình thường</option>
                        <option value="1" <?php if(isset($_GET['hot'])){
                            if($_GET['hot']==1)echo "selected='selected'"; 
                        } 
                            
                            ?>>Hot</option>
                        <option value="2" <?php if(isset($_GET['hot'])){
                            if($_GET['hot']==2)echo "selected='selected'"; 
                        } 
                            
                            ?>>Mới</option>
                    </select>
                </td>
                <td>Kiểu tìm kiếm</td>
                <td>
                    <select name="searchtype">
                        <option value="0" <?php if(isset($_GET['searchtype'])){
                            if($_GET['searchtype']==0)echo "selected='selected'"; 
                        } 
                            
                            ?>>Tương đối</option>
                        <option value="1" <?php if(isset($_GET['searchtype'])){
                            if($_GET['searchtype']==1)echo "selected='selected'"; 
                        }                 
                            ?>>Tuyệt đối</option>
                    </select>
                </td>
                
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="submit" value="Tìm kiếm" name="ok"/></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </form>
</div>
<div id="result">
   <?php if(!empty($data1)){ ?>
     <table >
        <tr class="title">
            <td><input type="checkbox" id="selectall"/></td>
            <td>Id</td>
            <td>Tên</td>
            <td>Giá</td>
            <td>Số lượng</td>
            <td>Ngày nhập</td>
            <td>Chủng loại</td>
            <td></td>
        </tr>
        <tbody>
        <?php
        if(!empty($data2)){
        foreach ($data2 as $value) {?>
        <tr>
            <td><input type="checkbox" name="myCheckboxes[]" class="case" value="<?php echo $value['pro_id']; ?>" /></td>
            <td><?php echo $value['pro_id'];?></td>
            <td><?php echo $value['pro_name'];?></td>
            <td><?php echo $value['pro_price'];?></td>            
            <td><?php echo $value['pro_number'];?></td>
            <td><?php echo $value['pro_import'];?></td>
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
        </tbody>
        <?php  }}?>
    </table>
   <?php }else{
     echo 'Không tìm thấy';
   }?>
</div>
<div id="pages">  
     <?php   
    if(!empty($data2)){
    $tongsotrang=  ceil($tongsobanghi/10);
    echo "<ul>";
    if(($curent!=1)&&($curent >1)){
       $i=$curent-1;
       echo "<li><a href='index.php?page=products&act=search&id=$id&name=$name&price=$price&date=$date&number=$number&type=$type&hot=$gethot&searchtype=$searchtype&trang=$i&ok=Tim+kiem' style=''>"."Previous"."</a></li>";
    }?>
    <?php 
        $less=$curent-1;
        $more=$curent+1;
        if($less <= 1)$less=1;
        if($more> $tongsotrang){ $more=$tongsotrang;
        
        }
        for($i=$less;$i<=$more;$i++){
    ?> 
         <li><a href="index.php?page=products&act=search&id=<?php echo  $id;?>&name=<?php echo $name; ?>&price=<?php echo $price;?>&date=<?php echo $date; ?>&number=<?php echo $number; ?>&type=<?php echo $type; ?>&hot=<?php echo $gethot; ?>&searchtype=<?php echo $searchtype; ?>&trang=<?php echo $i; ?>&ok=Tim+kiem"
            <?php if($curent == $i) echo "style='font-weight:bold;color:red;'" ?>
            ><?php echo $i;?></a></li>
        <?php } ?>
   <?php  if(($curent !=$tongsotrang)){
       $i=$curent + 1;
       echo "<li><a href='index.php?page=products&act=search&id=$id&name=$name&price=$price&date=$date&number=$number&type=$type&hot=$gethot&searchtype=$searchtype&trang=$i&ok=Tim+kiem'>"."Next"."</a></li>";
    }
    echo "</ul>";}?>
</div>

