<?php
require '../database/sales.php';
require '../database/products.php';
$pro=new products();
$sale=new sales();
$id="";
$name="";
$price="";
$date_start="";
$date_end="";
$searchtype="";
$phantram="";
$vitri=0;
$curent=1;
$dulieu="";
$tongsobanghi=0;
if(!isset($_GET['trang'])){
    $vitri=0;
    $curent=1;
}else{
    $vitri=($_GET['trang']-1)*10; 
    $curent=$_GET['trang'];
}
if(isset($_GET['ok'])){
    $id=$_GET['id'];
    $pro_id=$_GET['name'];
    $name=$pro->getId($pro_id);
    $price=$_GET['price'];
    $date_start=$_GET['date_start'];
    $date_end=$_GET['date_end'];
    $phantram=$_GET['phantram'];
    $searchtype=$_GET['searchtype'];
    $data=$sale->search($id, $name, $price, $phantram, $date_start, $date_end, $searchtype, $vitri);
    $tongsobanghi=$data[1];
    $dulieu=$data[0];  
}
?>
<style>   
    #timkiem{
        width: 1000px;
        height: 130px;  
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
    #timkiem input[type='submit']:hover{
        cursor: pointer;
        outline: none !important;
        border:1px solid #3fb8e8 ;
        box-shadow: 0 0 10px #3fb8e8;
    }
    #timkiem table td{
        padding: 0px;
        padding-top: 7px;
        padding-left: 1px;
    }
    #result{
        height: 560px;   
        padding-top: 25px;
    }
    #result  table{
        padding: 5px;
        border-collapse: collapse;
    }
   #result table td{
         border: 1px solid #CCCCCC;
         text-align: center;
         
    }
 #result  table tbody td{
        font-size: 20px;
        width: 890px;
        height: 40px;
        /*background-color: rgb(238, 238, 238);*/
         background-color: #EFF5FB;
    }
  #result .title td{
        font-size: 18px;
        font-weight: normal;
        color: #ffffff;
        width: 890px;
        height: 50px;
       /* background-color:  rgb(112, 196, 105);*/
       background-color: #A5DF00;
    }
    #pages{
        height: 44px;
        border-top: 1px solid #0099FF;
        background-color: #ccc;
    }
    #pages ul li{
        height: 44px;
        line-height: 44px;
        padding: 0 10px;
        margin: 0px;
        border-right:1px solid #CCC;
        list-style-type: none;
        float: left;
    }
    #pages ul li a{
        font-size: 20px;
        color: #0099FF;      
        text-decoration: none;
    }
</style>
<script>
    $(function() {
        $(".datepicker").datepicker({
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
<script type="text/javascript">
        $(document).ready(function(){
            $("a.del").click(function(){
               if(confirm("Bạn có muốn xóa không ?")){
                  $id=$(this).attr("name"); 
                  $(this).parent().parent().fadeOut("slow");                 
                  $.ajax({
                      "url": "modules/sales/deleteajax.php",                     
                      "type":"post",
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
          <script>
   $(document).ready(function(){
      $("a#remove").click(function(){
        var myCheckboxes = new Array();
        $("input[class='case']:checked").each(function() {
           $(this).parent().parent().fadeOut("slow");
           myCheckboxes.push($(this).val());
        });
        $.ajax({
            type: "POST",
            url: "modules/sales/del.php",
            data: 'myCheckboxes='+myCheckboxes,
            success: function(data){
              if(data==0) alert("Không thể xóa được !");
            }
        });
        return false;
      }) ;
   });
</script>
      <script>
      $(document).ready(function() {
   //select and deselect
 $("#selectall").click(function () {
        $('input:checkbox').prop('checked', this.checked);
    });

//If one item deselect then button CheckAll is UnCheck
    $(".case").click(function () {
        if (!$(this).is(':checked'))
            $("#selectall").prop('checked', false);
    });
    
});
        </script>
<div id="timkiem">
    <form action="" method="get">
        <table>
            <tr class="title">
                <td>Mã khuyến mãi</td>
                <td>
                    <input type="hidden" name="page" value="sales" />
                    <input type="hidden" name="act" value="search" />
                    <input type="text" name="id" placeholder="Mã khuyến mãi" value="<?php if(isset($_GET['id']))echo $_GET['id']; ?>">
                </td>
                <td>Tên sản phẩm</td>
                <td><input type="text" placeholder="Tên sản phẩm" name="name" value="<?php if(isset($_GET['name'])) echo $_GET['name']; ?>"/></td>
                <td>Giá</td>
                <td><input type="text" placeholder="Giá" name="price" value="<?php if(isset($_GET['price'])) echo $_GET['price']; ?>"></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
               <!--  <td>Khoảng giá</td>
                <td><input type="text" name="khoanggia" value="<?php if(isset($_GET['number'])) echo $_GET['number']; ?>"  onKeyPress="return isNumberKey(event)"/></td>              -->
               
                <td>Phần % khuyến mại</td>
                <td><input type="text" name="phantram" placeholder="Tỷ lệ" value="<?php if(isset($_GET['phantram'])) echo $_GET['phantram']; ?>"></td>
                 <td>Ngày bắt đầu</td>
                <td><input type="text" class="datepicker" placeholder="Ngày bắt đầu" size="14" name="date_start" placeholder="Ngày bắt đầu" value="<?php if(isset($_GET['date_start'])) echo $_GET['date_start'];?>"/></td>
                <td>Ngày kết thúc</td>
                <td><input type="text" placeholder="Ngày kết thúc" class="datepicker" name="date_end" size="14" placeholder="Ngày kết thúc" value="<?php if(isset($_GET['date_end'])) echo $_GET['date_end'];?>"/></td>
                 <td>Kiểu tìm</td>
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
   <?php if(!empty($dulieu)){ ?>
     <table >
      <tr class="title">
            <td><input type="checkbox" id="selectall"/></td>
            <td>Mã</td>
            <td>MãSP-Tên sản phẩm</td>
            <td>Số lượng sản phẩm khuyến mãi</td>
            <td>Tỷ lệ khuyến mãi(%)</td>
            <td>Giá khuyến mãi(vnd)</td>
            <td>Thời gian bắt đầu</td>
            <td>Thời gian kết thúc</td>
            <td>Thao tác</td>
        </tr>
        <tbody>
        <?php
        if(!empty($dulieu)){
        foreach ($dulieu as $data) {?>
            <tr>
            <td><input type="checkbox" name="myCheckboxes[]" class="case" value="<?php echo $data['sale_id']; ?>" /></td>
            <td><?php echo $data['sale_id'];?></td>
            <td><?php echo $pro->getName($data['pro_id']) ;?></td>
            <td><?php 
              
           $prodata=$pro->showOne($data['pro_id']);
           if($prodata != NULL){
               echo $prodata['pro_number'];
           }else echo "Không rõ";
        ?>
           </td>
            <td><?php echo $data['sale_percent'];?></td>
            <td><?php echo $data['sale_price'];?></td>
            <td><?php echo strftime("%d-%m-%Y", strtotime($data['sale_start']));?></td>
            <td><?php echo strftime("%d-%m-%Y", strtotime($data['sale_end']));?></td>
            
            <td> 
            <a href="<?php echo baseurl."admin/index.php?page=sales&act=detail&id=".$data['sale_id'];?>">
                <img src="images/eye.png" width="15" height="15" title="Chi tiet"></a>
            <a href="javascript:void(0)" class="del" name="<?php echo $data['sale_id'];?>">
                <img src="images/trash.png" width="15" height="15"title="Xoa"></a>
            <a href='<?php echo baseurl."admin/index.php?page=sales&act=edit&id=".$data['sale_id'];?>'>
                <img src="images/pencil.png"width="15" height="15" title="Cap nhat"></a>
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
    if(!empty($data)){
    $tongsotrang=  ceil($tongsobanghi/10);
    
    echo "<ul>";
    if(($curent!=1)&&($curent >1)){
       $i=$curent-1;
       echo "<li><a href='index.php?page=sales&act=search&id=$id&name=$name&price=$price&date_start=$date_start&khoanggia=&searchtype=$searchtype&phantram=$phantram&date_end=$date_end&trang=$i&ok=Tim+kiem' style='color:#e76c29;font-weight: bold;'>"."Previous"."</a></li>";
    }?>
    <?php 
        $less=$curent-1;
        $more=$curent+1;
        if($less <= 1)$less=1;
        if($more> $tongsotrang){ $more=$tongsotrang;
        
        }
        for($i=$less;$i<=$more;$i++){
    ?> 
         <li><a href="index.php?page=sales&act=search&id=<?php echo $id;?>&name=<?php echo $name;?>&price=<?php echo $price;?>&date_start=<?php echo $date_start; ?>&khoanggia=&searchtype=<?php echo $searchtype;?>&phantram=<?php echo $phantram;?>&date_end=<?php echo $date_end; ?>&trang=<?php echo $i; ?>&ok=Tim+kiem"
       <?php if($curent==$i) echo"style='color : red;font-weight: bold;'" ?>><?php echo $i;?></a></li>
        <?php } ?>
   <?php  if(($curent !=$tongsotrang)){
       $i=$curent + 1;
       echo "<li><a href='index.php?page=sales&act=search&id=$id&name=$name&price=$price&date_start=$date_start&khoanggia=&searchtype=$searchtype&phantram=$phantram&date_end=$date_end&trang=$i&ok=Tim+kiem' style='color:#e76c29;font-weight: bold;'>"."Next"."</a></li>";
    }
    echo "</ul>";}?>
</div>

        