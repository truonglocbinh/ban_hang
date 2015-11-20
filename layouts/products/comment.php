<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <script language="javascript" src="<?php echo baseurl; ?>scripts/javascript.js">
            alert"Thành công";
        </script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <div class="view">
            <hr />
            <?php require("layouts/products/view.php"); ?>
            <hr />
            <form action="" method="post" style="float:left; width:500px;" >
                <h2 style=" margin-top:10px; color:#000"> Viết đánh giá</h2>
                <div class="red">
                <?php
                require_once("functions/categories.php");
                $product = new categories();
                if (isset($_POST['continue'])) {
                    $content = $_POST['content'];
                    date_default_timezone_set('Asia/Bangkok');
                    $d = date('Y-m-d h:i:s'); //$date=strtotime($d);
                    $pid = $_GET['pid'];
                    $name = $_POST['name'];
                    $vote = $_POST['vote'];
                    $hot = 1;
                    if ($name == NULL && $content == NULL && strlen($content) < 15) {
                        echo "Vui lòng nhập tên và đánh giá";
                    } else
                    if ($name != NULL && $content != NULL && $vote > 0) {
                        if (strlen($content) < 15) {
                            echo "Đánh giá trên 15 kí tự";
                        } else if (strlen($name) > 20) {
                            echo"Tên quá dài";
                        } else {
                            $product->comment($content, $d, $pid, $name, $vote, $hot);
                            echo "Comment thành công";
                        }
                    } else {
                        
                    }
                }
                ?>
                 </div>
                <p style=" margin-top:5px;font-weight:bold";> Họ và tên(*)</p>
                <input  style="margin-top:5px;"type="text" size="20" name="name" />
                <p style=" font-weight:bold; margin-top:10px;
                   "> Đánh giá của bạn(*)</p>
                <textarea  name="content"style=" min-width: 250px; min-height: 100px;max-width: 250px; max-height: 100px; margin-left:0px;margin-top:10px;"
                           type="text" cols=="300" rows="8">  </textarea>
                <br />
                <p style=" font-weight:bold; margin-top:10px; margin-bottom:20px;
                   ">Bình chọn sản phẩm </p>
                <input style="margin-bottom:10px;" type="radio" name="vote" value="1" checked="checked"> Tốt </input><br />
                <input style="margin-bottom:10px;" type="radio" name="vote" value="2"> Trung bình</input><br />
                <input style="margin-bottom:10px;" type="radio" name="vote" value="3"> Xấu </input><br />
                <input   type="submit" name="continue" value="Tiếp tục" style=" margin-top:15px;background-color:#F00"  />
            </form>