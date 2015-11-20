<?php
$data1=$pro->getTotalCategory($data);
 $dl=$pro->totalMoney($data);
 
 ?>
 <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php 
             $total=$pro->TotalProducts();
             $conlai=0;
          foreach ($data1 as $key => $value) {
          echo "["."'$key',$value"."],";
          $conlai=$value+$conlai;
          } 
              $khongro=$total-$conlai;
          ?>
          [<?php echo "'Không rõ',$khongro"; ?>]
        ]);

        var options = {
          title: 'Biểu đồ sản phẩm tổng quan'
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
        data.addRows([ 	
         <?php 
             $total=$pro->TotalProducts();
             $conlai=0;
          foreach ($data1 as $key => $value) {
          echo "["."'$key',$value"."],";
          $conlai=$value+$conlai;
          } 
              $khongro=$total-$conlai;
          ?>
          [<?php echo "'Không rõ',$khongro"; ?>],
          [<?php echo "'Tổng số',$total"; ?>],
        ]);
        var table = new google.visualization.Table(document.getElementById('table_div'));
        table.draw(data, {showRowNumber: true});
      }
    </script>
    <script type='text/javascript'>
      google.load('visualization', '1', {packages:['table']});
      google.setOnLoadCallback(drawTable);
      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Danh mục');
        data.addColumn('number', 'Số tiền');
       
        data.addRows([  
         <?php 
             $total=$dl['total'];
             $conlai=0;
          foreach ($dl['cate'] as $key => $value) {
          echo "["."'$key',$value"."],";
          $conlai=$value+$conlai;
          } 
              $khongro=$total-$conlai;
             
          ?>
          [<?php echo "'Không rõ',$khongro"; ?>],
          [<?php echo "'Tổng số',$total"; ?>]
        ]);
        var table = new google.visualization.Table(document.getElementById('moneylove'));
        table.draw(data, {showRowNumber: true});
      }
    </script>
    <div id="piechart"></div>
    <div id="products">
      <div id="table_div"></div>
      <div id="moneylove"></div>
    </div>