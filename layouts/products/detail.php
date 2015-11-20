<script type="text/javascript" src="<?php echo baseurl; ?>scripts/jquery-1.11.1.min.js"></script>
<?php
require_once("functions/categories.php");
require_once("functions/products.php");
$pid = $_GET['pid'];
$product = new categories();
$result = $product->getPro($pid);
$related = $product->related($result['cate_id'], $pid, 4);
$sp = new products();
$test = $sp->getSp($pid);
//debug($test);
?>
<div id="homelink" > <a href="<?php echo baseurl; ?>">TRANG CHỦ</a> &raquo; <a  href="<?php echo baseurl . "/?page=product&act=list&pages=3&cateid=1&start=0"; ?>"><?php echo $result['cate_name']; ?></a> &raquo; <a href="#"><?php echo $result['pro_name']; ?></a> 
</div>
<div id="homecontent">
    <div class="product" > 
        <div class="name"><h1><?php echo $result['pro_name']; ?></h1></div>
        <div class="proimg"> 
            <img src="<?php echo baseurl . "images/products/" . $result['pro_image']; ?>" width="200" />
        </div> 
        <div class="proinfo" > 
            <p>Tên sản phẩm : <?php echo $result['pro_name']; ?> </p>
            <p><?php echo $result['pro_info']; ?></p>
            <p class="red"><?php
                if ($result['pro_number'] > 0) {
                    echo " Trạng thái: Còn hàng";
                } else
                    echo "Trạng thái :Hết Hàng";
                ?>
            <hr />
            <?php if ($test != NULL) { ?>
                <h3 class="price">Giá bán  :  <?php echo $result['pro_price']; ?> vnđ</h3>

                <h3 class="pricekm">Giá KM  : <?php echo $test['sale_price']; ?> vnđ</h3>
            <?php } else { ?>
                <h2 class="khuyenmai">Giá bán  :  <?php echo $result['pro_price']; ?> vnđ</h2>
            <?php } ?>
            </p>
            <hr />
            <?php echo "Số lượng"; ?>  <form action="" method="post">
            <input type="text" id="quantity" value="1" name="quantity" width="2" placeholder="Nhập số lượng" />
            <input type="submit" name="add" value="Mua hàng" id="add" />
            </form>
            <?php 
				if(isset($_POST['add'])){
					if($_POST['quantity']!=""){
						$quantity = $_POST['quantity'];
					}else{
						$quantity = 1;
					}
					header("location:".baseurl."?page=product&act=addToCart&pid=".$result['pro_id']."&qty=".$quantity);
				}
			?>
            <!--<a href="<?php //echo baseurl."?page=product&act=addToCart&pid=".$result['pro_id']; ?>" ><img src="images/products/muahang.jpg" style="width:80px" height="30px" /></a>-->

            <table width="300"  border="0" height="30" style="margin-top:10px;">
                <tr >
                    <td width="100"> <?php echo"Chia sẻ"; ?>
                    </td>
                    <td width="89" >

                        <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                            if (d.getElementById(id)) return;
                                            js = d.createElement(s); js.id = id;
                                            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
                                            fjs.parentNode.insertBefore(js, fjs);
                                    }(document, 'script', 'facebook-jssdk'));</script> 
                        <div class="fb-share-button" data-href="http://localhost/bksun/?page=product&act=detail&pid=1"></div>
                    </td>
                    <td width="49"><p></p>
                        <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
                        <script>!function(d, s, id){var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location)?'http':'https'; if (!d.getElementById(id)){js = d.createElement(s); js.id = id; js.src = p + '://platform.twitter.com/widgets.js'; fjs.parentNode.insertBefore(js, fjs); }}(document, 'script', 'twitter-wjs');</script>

                    </td>
                    <td width="53">
                        <!-- Place this tag where you want the share button to render. -->
                        <div class="g-plus" data-action="share" data-annotation="none"></div>

                        <!-- Place this tag after the last share tag. -->
                        <script type="text/javascript">
                                    (function() {
                                    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                                            po.src = 'https://apis.google.com/js/platform.js';
                                            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                                    })();
                        </script>
                    </td>
                </tr>
            </table>

        </div> 
        <div class="clear"></div>
    </div> 

    <div class="info">
        <div class="title"  > 
            <ul>
                <li> <a href="<?php echo baseurl . "?page=product&act=detail&pid=" . $pid . "&work=mota" ?>" >Mô tả</a></li>
                <li> <a  href="<?php echo baseurl . "?page=product&act=detail&pid=" . $pid . "&work=comment" ?>" >Đánh giá</a> </li>
            </ul> 
            <div class="clear"></div>
        </div>

        <div class="detail" > 
            <?php
            if (isset($_GET['work'])) {
                switch ($_GET['work']) {
                    case "comment": require("layouts/products/comment.php");
                        break;
                    default: require("layouts/products/mota.php");
                        break;
                }
            } else
                require("layouts/products/mota.php");
            ?>
            <?php ?>
        </div> 
    </div>
    
    <div class="related">
        <div class="titlerelated">
            <h3>Sản phẩm cùng chuyên mục</h3>
        </div>
        <div class="relatecontent" >
            <?php
            if ($related != NULL) {
                ?>

                <?php foreach ($related as $items) { ?>
                    <div class="productrelate" > <a href="<?php echo baseurl . "?page=product&act=detail&pid=" . $items['pro_id']; ?>"><img src="<?php echo baseurl . "images/products/" . $items['pro_image']; ?>" width="133" height="133" alt=""></a>
      <h3><a href="<?php echo baseurl . "?page=product&act=detail&pid=" . $items['pro_id']; ?>"><?php echo $items['pro_name']; ?></a></h3>
                        <p>Giá : <span class="red"><?php echo $items['pro_price']; ?> vnd</span></p>
                        <div id="muahang" ><a href="<?php echo baseurl."?page=product&act=addToCart&pid=".$items['pro_id']."&qty=1"; ?>"><img src="images/products/muahang.jpg" style="width:80px" height="30px" /></a></div>
                    </div> 
                <?php } ?>
            <?php } else  ?>

            <div class="clear"></div>
        </div>
    </div>
</div>
