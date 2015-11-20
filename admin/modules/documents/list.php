<?php 
require '../database/documents.php';
$doc=new documents();
$recordnumber=$doc->getRecordNumber();
$curent=1;
$tongsotrang= ceil($recordnumber/10);
if(!isset($_GET['trang']))$_GET['trang']=1;
if(isset($_POST['jump'])){
    if($_POST['jump']>0 &&$_POST['jump']<=$tongsotrang){
        $curent=$_POST['jump'];
    }else{
        $curent=1;
    }
}else{
    $curent=$_GET['trang'];
}
$vitri=($curent-1)*10;
$data=$doc->page($vitri);
?>
<style>
    #news{
        height: 715px;
       
    }
    #head{
        width: 1000px;
        height: 55px;
       
    }
    #function{
      width: 450px;
      height: 45px;
      float: left;
      padding-top: 10px;
      padding-left: 50px;
    }
    #infomation{
        width: 500px;
        height: 43px;
        float: left;
        padding-top: 12px;
    }
   #infomation input{
        height: 25px;
        padding: 3px;
        
        border:solid 1px #ccc; 
        -moz-box-shadow: inset 0 0 4px rgba(0,0,0,0.2); 
        -webkit-box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.2); 
        box-shadow: inner 0 0 4px rgba(0, 0, 0, 0.2);
        -webkit-border-radius: 3px; 
        -moz-border-radius: 3px; 
        border-radius: 8px;
    }
   #infomation input:focus {
    outline: none !important;
    border:1px solid #3fb8e8 ;
    box-shadow: 0 0 10px #3fb8e8;
}   
    #infomation input[type='button']{
          color: #ffffff;
        background-color: #1392e9;
        border-radius: 5px;
        border: 0;
        
  -moz-box-shadow: inset 0 0 4px rgba(0,0,0,0.2); 
    -webkit-box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.2); 
    box-shbackground-color: #1392e9;
        border-radius: 5px;
        border: 0;adow: inner 0 0 4px rgba(0, 0, 0, 0.2);
    }
    #infomation input[type='button']:hover{
    cursor: pointer;
    outline: none !important;
    border:1px solid #3fb8e8 ;
    box-shadow: 0 0 10px #3fb8e8;
}
#infomation table td{
    padding: 5px;
    padding-top: 10px;
    
}
    #infomation table td{
        height: 30px;
        padding:  5px;
    }
    #head h1{
        color: #000;
    }
    #noidung{
        width: 900px;
        padding-left: 50px;
        padding-right: 50px;
        height: 620;
        padding-top: 20px;
        padding-bottom: 20px;     
    }
    #noidung  table{      
        padding: 5px;
        border-collapse: collapse;
    }
      #noidung table td{
         border: 1px solid #CCCCCC;
         text-align: center;        
    }
   
     #noidung  table tbody td{
        font-size: 20px;
        width: 890px;
        height: 55px;
/*        background-color: rgb(238, 238, 238);*/
        background-color: #EFF5FB;
    }
    #noidung .title td{
        font-size: 20px;
        font-weight: normal;
        color: #ffffff;
        width: 890px;
        height: 50px;
/*        background-color:  rgb(112, 196, 105);*/
        background-color: #3ADF00;
    }
    input.doc_title{  
      font-size: 20px;
      border: 0;
      background-color: #EFF5FB;
      height: 50px;
      text-align: left;
    
    }
    .doc_title:focus{
      border-color: #EFF5FB;
    }
    #pages{
        width: 1000px;
        height: 44px;       
        border-top: 1px solid #D8D8D8;
       
    }
    #pagination{
        width: 600px;
        float: left;
        height: 37px;
        padding-top: 7px;
    }
    
    #pagination ul li{
        height: 30px;
        line-height: 30px;
        padding: 0 10px;
        float: left;
        margin: 0px;
        list-style-type: none;
        border-right:1px solid #CCC;
        
    }
    #pagination ul li a{      
        font-size: 18px;
        color: #0099FF;      
        text-decoration: none;
    }
    #infor{
        height: 44px;
        width: 400px;
        float: left;
    }
    #infor p{
        float: left;
    }
</style>
  <script type="text/javascript">
        $(document).ready(function(){
           
            $(document).on("click","a.del",function(){
               if(confirm("Bạn có muốn xóa không ?")){
                  $id=$(this).attr("name"); 
                  $(this).parent().parent().fadeOut("slow");                 
                  $.ajax({
                      "url": "modules/documents/deleteajax.php",                     "type":"post",
                      "data":"uid="+$id,
                      "async":"false",
                      success: function (data) {
                      if (data ==1) {
                        alert("Bạn đã xóa thành công");
                        window.location.href="index.php?page=documents&act=list";
                      }else{
                        alert("Không thể xóa được");
                      }                     
                    }
                  });
               } 
               return false;
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
       <script>
   $(document).ready(function(){
      $("a#remove").click(function(){
        if (confirm("Bạn có muốn xóa các mục đã chọn ?")) {
            var myCheckboxes = new Array();
        $("input[class='case']:checked").each(function() {
           $(this).parent().parent().fadeOut("slow");
           myCheckboxes.push($(this).val());
        });
        $.ajax({
            type: "POST",
            url: "modules/documents/del.php",
            data: 'myCheckboxes='+myCheckboxes,
            success: function(data){
              if(data==0) alert("Không thể xóa được !");
            }
        });
        return false;
        };
        
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
        <script>
       $(document).ready(function(){
    $('a#back').click(function(){
        parent.history.back();
        return false;
    });
    $("#tim").click(function(){
      $id=$("#id").val();
        if($id== ""){
            alert("Dữ liệu trống !");
        }else{
            $.ajax({
                url: "modules/documents/searchajax.php",
                data: "id="+$id,
                type: 'POST',
                async: false,
                success: function (data) {
                    if(data == 0){
                        alert("Không tìm thấy");
                    }else{
                        $("#tbody").html(data);
                    }
                    
                    }
            });
        }
    });
     $("#delall").click(function(){
                  if (confirm("Bạn có muốn xóa tất cả dữ liệu ?")) {
                    $id=1;
                     $.ajax({
                          url:"modules/documents/delall.php",
                          data:"id="+$id,
                          type: 'POST',
                          async: false,
                          success: function (data) {
                              if(data==0)alert("Không thể xóa được");
                              else{
                                   window.location.href="index.php?page=documents&act=list";
                              }
                            
                    }
                      });
                  };
              
            });

});
        </script>
<div id="news">
    <div id="head">
        <div id="function">
            <span>
                <a href="javascript:void(0)" id="back"><img src="images/previous.png" width="35" height="35"></a>
                <a href="<?php echo baseurl."admin/index.php?page=documents&act=add";?>"><img src="images/home/add.png" width="35" height="35"></a>
                <a href="index.php"><img src="images/home.png" width="35" height="35"></a>
                <a href="<?php echo baseurl."admin/index.php?page=documents&act=list";?>"><img src="images/list.png" width="35" height="35"></a>
                <a href="javascript:void(0)" id="remove"><img src="images/remove.png" width="35" height="35"></a>
                <a href="<?php echo baseurl."admin/index.php?page=documents&act=search";?>"><img src="images/home/search.png" width="35" height="35"></a>
                <a href="javascript:void(0)" id="delall"><img src="images/delete.png" width="40" height="40"></a>
                <a><img src="images/information.png" width="40" height="40"></a>
            </span>
        </div>
        <div id="infomation">
            <table>
                <tr>
                    <td>ID</td>
                    <td><input type="text" id="id"/></td>
                    <td><input type="button" id="tim" value="Tìm kiếm"/></td>
                    <td>Tổng số</td>
                    <td><?php echo $doc->getTotal(); ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div id="noidung">
         <table>
    <tr class="title">
        <td><input type="checkbox" id="selectall"/></td>
        <td>Id</td>
        <td>Tiêu đề</td>
        <td>Loại tài liệu</td>
        <td>Vip</td>
        <td>Thao tác</td>
    </tr>
    <tbody id="tbody">
    <?php foreach ($data as $value) {?>
    <tr>
        <td><input type="checkbox" name="myCheckboxes[]" class="case" value="<?php echo $value['doc_id']; ?>" /></td>
        <td><?php echo $value['doc_id'] ?></td>
        <td><input type="text" value="<?php echo $value['doc_title'] ?>" class="doc_title" readonly="true"></td>
        <td><?php echo $value ['doc_type'];?></td>
        <td><?php if($value['doc_vip']==1) echo 'Có';else echo 'Không'; ?></td>
        <td> 
            <a href="<?php echo baseurl."admin/index.php?page=documents&act=detail&id=".$value['doc_id'];?>">
                <img src="images/eye.png" width="20" height="20" title="Chi tiet"></a>
            <a href="javascript:void(0)" class="del" name="<?php echo $value['doc_id'];?>">
                <img src="images/trash.png" width="20" height="20"title="Xoa"></a>
            <a href='<?php echo baseurl."admin/index.php?page=documents&act=edit&id=".$value['doc_id'];?>'>
                <img src="images/pencil.png"width="20" height="20" title="Cap nhat"></a>
        </td>
    </tr>
   
  <?php   }?>   
    </tbody>
</table>
    </div>
   

</div>
 <div id="pages">
     <div id="pagination">
   <?php 
    
    echo "<ul>";
    if($curent!=1){
       $i=$curent-1;
       echo "<li><a href='index.php?page=documents&act=list&trang=$i' style=''>"."Previous"."</a></li>";
    }?>
     <?php 
        $less=$curent-1;
        $more=$curent+1;
        if($less <= 1)$less=1;
        if($more> $tongsotrang){ $more=$tongsotrang;
        
        }
        for($i=$less;$i<=$more;$i++){
    ?> 
         <li><a href="index.php?page=documents&act=list&trang= <?php echo $i; ?>"
            <?php if($curent == $i) echo "style='font-weight:bold;color:red;'" ?>
            ><?php echo $i;?></a></li>
        <?php } ?>
   <?php  if($curent !=$tongsotrang){
       $i=$curent + 1;
       echo "<li><a href='index.php?page=documents&act=list&trang=$i'>"."Next"."</a></li>";
    }
    echo "</ul>";?>
     </div>
     <div id="infor">
         <p style="padding-right:  25px;">Tổng số trang : <?php echo $tongsotrang; ?>  
         <form method="post" action="">
             Tới:<input type="text" name="jump" size="7" onKeyPress="return isNumberKey(event)"><input type="submit" value="Go">
         </form>
         </p>
         <p>Bạn đang ở trang số <?php echo $curent; ?></p>
         
     </div>
 </div>
      