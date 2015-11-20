<?php 
$month=$_GET['nam']."-".$_GET['thang'];
$dulieu=$pro->getInforMonth($month,$data);
$totalmoney=$dulieu['tongquan']['money'];
//echo $totalmoney;
?>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php 
             $totalproducts=$dulieu['tongquan']['sanpham'];
             $totalmoney=$dulieu['tongquan']['money'];

             $conlai=0;
            $khongro=0;
          foreach ($dulieu['cate'] as $key => $value) {
           if(empty($value)){ $value=0;}else{ $value=$value['sanpham'];}
          echo "["."'$key',$value"."],";
          $conlai=$value+$conlai;
          } 
              $khongro=$totalproducts-$conlai;
          ?>
          [<?php echo "'Không rõ',$khongro"; ?>]
        ]);

        var options = {
          title: "Biểu đồ sản phẩm theo hạng mục tháng"
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
    <script type='text/javascript'>
      google.load('visualization', '1', {packages:['table']});
      google.setOnLoadCallback(drawTable);
      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Danh mục');
        data.addColumn('number', 'Số sản phẩm');
        data.addColumn('number', 'Số tiền');
        data.addRows([
          
         <?php 
             $conlai=0;
             $sanpham=0;$sotien=0;
          foreach ($dulieu['cate'] as $key => $value) {
          if(empty($value)){
            $sanpham=0;$sotien=0;
          }else{
            $sanpham=$value['sanpham'];
            $sotien=$value['money'];
          }
          echo "["."'$key',$sanpham,$sotien"."],";
          $conlai=$sotien+$conlai;
          } 

              $khongro1=$totalmoney-$conlai;
          ?>
          [<?php echo "'Không rõ',$khongro,$khongro1"; ?>],
          [<?php echo "'Tổng số',$totalproducts,$totalmoney"; ?>]
        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));
        table.draw(data, {showRowNumber: true});
      }
    </script>
<div id="piechart"></div>
<div id="table_div"></div>
