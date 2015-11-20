<div id="slideshow">
    <div><img src="images/slideshow/2-2.jpg" width="720" height="200" /></div>
    <div><img src= "images/slideshow/6-2.png" width="720" height="200" /></div>
    <div><img src="images/slideshow/6-4.jpg" width="720" height="200" /></div>
    <div><img src="images/slideshow/6-7.png" width="720" height="200" /></div>
    <div><img src="images/slideshow/6-8.png" width="720" height="200" /></div>
</div>

<div class="newproducts">
    <div class="protitle">
        <h3>Sản phẩm mới</h3>
    </div>
    <div class="procontent">
        <?php require_once("functions/products.php"); ?>
        <?php
        $products = new products();
        $pronew = $products->productNew(8);
        $prohot = $products->productHot(8);
        $test = $products->getSale();
        //debug($pronew);
        if ($pronew != NULL) {
            ?>
            <?php foreach ($pronew as $items) { ?>
                <div class="products">
                    <a href="<?php echo baseurl . "?page=product&act=detail&pid=" . $items['pro_id']; ?>"><img src="<?php echo baseurl . "images/products/" . $items['pro_image']; ?>" width="160" height="140" alt=""></a>

                    <h3><a  class="black" href="<?php echo baseurl . "?page=product&act=detail&pid=" . $items['pro_id']; ?>"><?php echo $items['pro_name']; ?></a></h3>
                    <?php $string = 0; ?>
                    <?php foreach ($test as $it) {
                        ?>
                        <?php
                        if ($items['pro_id'] == $it['pro_id']) {
                            $string = 1;
                            ;
                            break;
                        }
                        ?>    
                    <?php } ?>
                    <?php
                    if ($string > 0) {
                        ?>
                        <div class="sale">
                            <img src="<?php echo baseurl . "images/products/sale.jpg"; ?>" width="50px" height="20px;" />
                        </div>
                        <p style=" text-decoration:line-through;color:#000">Giá bán : <span class="red"><?php echo $items['pro_price']; ?> vnd</span></p>   
                        <p style="color:#F00">Giá mới : <span class="red"><?php echo $it['sale_price']; ?> vnd</span></p>   
                    <?php } else { ?>
                        <div class="new">
                            <img src="<?php echo baseurl . "images/products/new.jpg"; ?>" width="50px" height="20px;" />
                        </div>
                        <p style=" color:#F00">Giá : <span class="red"><?php echo $items['pro_price']; ?> vnd</span></p>   
                    <?php } ?>
                    <div id="muahang" ><a href="<?php echo baseurl."?page=product&act=addToCart&pid=".$items['pro_id']."&qty=1"; ?>"><img src="images/products/muahang.jpg" style="width:80px" height="30px" /></a></div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>Chưa có sản phẩm</p>
        <?php } ?>
        <div class="clear"></div>
    </div>

</div>
<div class="hotproducts">
    <div class="protitle">
        <h3>Sản phẩm hot</h3>
    </div>
    <div class="procontent">
        <?php
        if ($prohot != NULL) {
            ?>
            <?php foreach ($prohot as $items) { ?>
                <div class="products">
                    <a href="<?php echo baseurl . "?page=product&act=detail&work=&pid=" . $items['pro_id']; ?>"><img src="<?php echo baseurl . "images/products/" . $items['pro_image']; ?>" width="160" height="140" alt="">	</a>
                    <h3><a href="<?php echo baseurl . "?page=product&act=detail&pid=" . $items['pro_id']; ?>"><?php echo $items['pro_name']; ?></a></h3>
                    <?php $string = 0; ?>
                    <?php foreach ($test as $it) {
                        ?>
                        <?php
                        if ($items['pro_id'] == $it['pro_id']) {
                            $string = 1;
                            ;
                            break;
                        }
                        ?>    
                    <?php } ?>
                    <?php
                    if ($string > 0) {
                        ?>
                        <div class="sale">
                            <img src="<?php echo baseurl . "images/products/sale.jpg"; ?>" width="50px" height="20px;" />
                        </div>
                        <p style=" text-decoration:line-through;color:#000">Giá bán : <span class="red"><?php echo $items['pro_price']; ?> vnd</span></p>   
                        <p style="color:#F00">Giá mới : <span class="red"><?php echo $it['sale_price']; ?> vnd</span></p>   
                    <?php } else { ?>
                        <div class="hot">
                            <img src="<?php echo baseurl . "images/products/hot.jpg"; ?>" width="50px" height="20px;" />
                        </div>
                        <p style=" color:#F00">Giá : <span class="red"><?php echo $items['pro_price']; ?> vnd</span></p>   
                    <?php } ?>
                    <p style="margin-top:11px;"><a href="<?php echo baseurl."?page=product&act=addToCart&pid=".$items['pro_id']."&qty=1"; ?>" ><img src="images/products/muahang.jpg" style="width:80px" height="30px" /></a></p>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>Chưa có sản phẩm</p>
        <?php } ?>
        <div class="clear"></div>
    </div>
</div>
