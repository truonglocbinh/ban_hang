<?php 
$con=new config();
$data=new database();
?>
<style type="text/css">
	#local{
		height: 400px;

	}
	#function{
		height: 360px;
	}
	#local table{      
        padding: 5px;
        border-collapse: collapse;
    }
   #local table td{
         border: 1px solid #CCCCCC;
         text-align: center;
         
    }
    #local table  td{
        font-size: 20px;
        width: 890px;
        height: 55px;
/*        background-color: rgb(238, 238, 238);*/
        background-color: #EFF5FB;
    }
</style>
<div id="local">
	<table>
		<tr>
			<td>Máy chủ:</td>
			<td><?php echo $con::HOST; ?></td>
		</tr>
		<tr>
			<td>Chủ quan SQL</td>
			<td><?php echo $con::USER; ?></td>
		</tr>
		<tr>
			<td>Mật khẩu dữ liệu</td>
			<td><?php echo $con::PASS; ?></td>
		</tr>
		<tr>
			<td>SQL</td>
			<td><?php echo $con::DATA; ?></td>
		</tr>
	</table>
</div>
<div id="function">
	<a href="javascript:void(0)"><img src="images/delete.png" width="40" height="40"></a>
</div>