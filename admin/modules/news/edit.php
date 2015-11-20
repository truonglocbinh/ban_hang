<?php require '../database/news.php'; ?>
<?php  $news= new news();
?>
<h3>Thêm mới tin tức</h3>
<!--<style type="text/css">
td{
	padding:3px 5px
}
tr.title td{
	height:22px;
	font-weight:bold;
	text-align:center;
	background:#FFF
}
fieldset{
	width:800px;
	padding:30px;
	border:1px solid #CCC
}
legend{
	color:#09F
}
.red{color:#F00}
</style>-->
<div style="height:30px"></div>
<script src="libraries/ckeditor/ckeditor.js"></script>
<?php
$id=$_GET['id'];
$news=new news();
$data=$news->showOne($id);       
if(isset($_POST['submit'])){
	if($_POST['news_title'] == NULL || $_POST['news_full'] == NULL){
		echo "Vui lòng điền đủ thông tin";
	}else{
		$title = $_POST['news_title'];
		$author = $_POST['news_author'];
		$full = $_POST['news_full'];
		//$date = date("d/m/y - H:i:s");
		if($_FILES['img']['name'] != NULL){
		   //die("true");
		   if($_FILES['img']['type'] == "image/jpeg"
			|| $_FILES['img']['type'] == "image/png"
			|| $_FILES['img']['type'] == "image/gif"){
			  if($_FILES['img']['size'] > 1048576){
			      echo "File không được lớn hơn 1mb";
			  }else{
			      // file hợp lệ, tiến hành upload
			      $path = "../images/news/"; // ảnh upload sẽ được lưu vào thư
			      $tmp_name = $_FILES['img']['tmp_name'];
			      $name = $_FILES['img']['name'];
			      $type = $_FILES['img']['type']; 
			      $size = $_FILES['img']['size']; 
			      // Upload file
			   move_uploaded_file($tmp_name,$path.$name);
                          if($news->update($id,$title,$author,$full,$name)){
                            header("location:".baseurl."admin/?page=news&act=list");
                            exit();
                          }else echo 'Khong the cap nhat vào cơ sở dữ liệu';
			  }
			}else{
			  // không phải file ảnh
			  echo "Kiểu file không hợp lệ";
			}
		}else{
			//die("false");
                        if($news->update($id,$title,$author,$full,"")){
                            header("location:".baseurl."admin/?page=news&act=list");
		          exit();
                        } else echo 'Khong the cap nhat vao co so du lieu';
		}
		
	}
}
?>
<form action="" method="post" enctype="multipart/form-data">
<fieldset>
	<legend>Thêm mới tin tức
</legend><table width="735" border="0">
  <tr>
    <td width="105">Tiêu đề tin <span class="red">*</span></td>
    <td width="620"><input type="text" name="news_title" size="25" value="<?php echo $data['news_title'];?>"></td>
  </tr>
  <tr>
    <td>Tác giả</td>
    <td><input type="text" name="news_author" size="25" value="<?php echo $data['news_author'];?>"></td>
  </tr>
  <tr>
    <td>Chi tiết tin <span class="red">*</span></td>
    <td>
    <textarea cols="48" rows="6" class="ckeditor" name="news_full"><?php echo $data['news_full'];?></textarea>	
    </td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
    <td>
    	<input type="file" name="img" size="25" />
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Cập nhật"/></td>
  </tr>
</table>
</fieldset>
</form>