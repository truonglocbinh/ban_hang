<?php 
require '../database/products.php';
require '../database/categories.php';
$pro=new products();
$cate=new categories();
$data=$cate->showAll();
$result=$pro->getTotalCategory($data);
$year=$pro->getYear();
sort($year);
?>
<style type="text/css">
	#form{  
       height: 100px;
       width: 1000px;
       float: left;
       
	}
  #infor{
    width: 350;
    height: 80px;
    float: left;
    padding-top: 20px;

  }
  #infor select {
    padding: 5px 8px;
    width: 100%;
    border: none;
    box-shadow: none;
    background: transparent;
    background-image: none;
    -webkit-appearance: none;
}
#infor select:focus {
    outline: none;
}
  #money{
    width: 650px;
    height: 95px;
    padding-top: 5px;
    float: left;
  }
  #money table{
        padding: 5px;
        border-collapse: collapse;
  }
  #money  table td{
         width: 100px;
         border: 1px solid #CCCCCC;
         text-align: center;
         padding: 5px;
         
    }
	#result{
		height: 660px;
		width: 1000px;
		float: left;

	}
	#piechart{
		height: 360px;		
	}
	#products{
		height: 300px;
	}
  #table_div{
    width: 500px;
    float: left;
  }
  #moneylove{
    width: 500px;
    float: left;
  }
</style>

 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    
<div id="form">
  <div id="infor">
  <form method="GET" action="">
    <table>
    <tr>
      <td>
        <input type="hidden" name="page" value="products" >
        <input type="hidden" name="act" value="thongke"> 
        Năm :
      </td>
      <td>
        <select id="year" name="nam">
          <option value="0">Tất cả</option>
          <?php foreach ($year as $value) { ?>
          <option value="<?php echo $value; ?>" <?php if(isset($_GET['nam'])){
            if($_GET['nam']== $value){echo "selected='selected'";}
          } ?>><?php echo $value; ?></option>
          <?php }?>
        </select>
      </td>
      <td>Tháng</td>
      <td >
        <select id="month" name="thang">
          <option value="0">Tẩt cả</option>
          <?php for($i=1; $i<=12 ;$i++){ ?>
          <option value="<?php if($i<10){
            echo "0".$i;
          }else {
            echo $i;
          } ?>" <?php if(isset($_GET['thang'])){
            if ($_GET['thang']== $i){echo "selected='selected'";}
          } ?> >Tháng-<?php echo $i; ?></option>
          <?php }?>
        </select>
      </td>
      <td> <input type="submit" value="Xem chi tiết" name="detail"></td>
    </tr>
   </table>
  </form>
</div>
<div id="money">
   <?php
   $dd=array();
   if(isset($_GET['detail'])){
    if($_GET['nam'] == 0 &&$_GET['thang'] == 0){
      $dd=$pro->getHotNew();
    }else if($_GET['nam']!= 0 && $_GET['thang']==0){
       $dd=$pro->getHotNewInYear($_GET['nam']);
    }else{
      $month=$_GET['nam']."-".$_GET['thang'];
      $dd=$pro->getHotNewInMonth($month);
    }
    
           
}else{
   $dd=$pro->getHotNew();
}
   ?>
   <table>
     <tr>
       <td>Sản phẩm hot</td>
       <td><?php echo $dd['hot']; ?></td>
     </tr>
     <tr>
       <td> Sản phẩm mới</td>
       <td><?php echo $dd['new']; ?></td>
     </tr>
     <tr>
       <td>Sp khuyến mãi</td>
       <td><?php echo $dd['sale']; ?></td>
     </tr>
   </table>
</div>
</div>
<div id="result">
  <?php if(isset($_GET['detail'])){
    if($_GET['nam'] == 0 &&$_GET['thang'] == 0){
      require "modules/products/chart/tongquan.php";
    }else if($_GET['nam']!= 0 && $_GET['thang']==0){
       require "modules/products/chart/chartyear.php";
    }else{
      require "modules/products/chart/monthchart.php";
    }
    
           
}else{
  require "modules/products/chart/tongquan.php";
}

?>
	
</div>