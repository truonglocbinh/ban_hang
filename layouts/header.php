<div id="head">
    <div id="logo">
        <a href="<?php echo baseurl; ?>"><img src="images/home/bksun.png" width="120"></a>
    </div>	
    <div id="righthead">
        <div id="slogan">
            <img src="images/home/slogan.png" width="600" height="80">
        </div>
        <div id="bottom_righthead">
            <div id="login"><?php require_once("layouts/login.php"); ?></div>
            <div id="cart"> <img src="images/home/cart.jpg" width="50px"/> <a href="<?php echo baseurl . "?page=product&act=indexCart"; ?>">Giỏ hàng(<?php if(isset($_SESSION['cart'])){echo count($_SESSION['cart']);}else{ echo 0;}?>)</a> </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<div id="menus">
    <div id="menu">
        <ul>
            <li><a href="<?php echo baseurl; ?>">Trang chủ</a></li>
            <li><a href="<?php echo baseurl; ?>?page=intro">Giới thiệu</a></li>           
            <li><a href="#">Khách hàng</a>
                <ul>
                    <li><a href="<?php echo baseurl; ?>?page=customer&sub=guide">Hướng dẫn mua hàng</a></li>
                    <li><a href="<?php echo baseurl; ?>?page=customer&sub=warranty">Chính sách bảo hành</a></li>
                    <li><a href="<?php echo baseurl; ?>?page=customer&sub=question">Hỏi đáp</a></li>                
                </ul>        
            </li>
            <li><a href="#">Tài liệu kỹ thuật</a>
                <ul>
                    <li><a href="<?php echo baseurl; ?>?page=document&sub=ic">Tài liệu về IC</a></li>
                    <li><a href="<?php echo baseurl; ?>?page=document&sub=pin">Tài liệu về PIN</a></li>
                    <li><a href="<?php echo baseurl; ?>?page=document&sub=trick">Thủ thuật chung</a></li>                
                </ul>        
            </li>  
            <li><a href="<?php echo baseurl; ?>?page=contact" style="border:none">Liên hệ</a></li>      
        </ul>
    </div>
    <div id="search">
        <form action="<?php echo baseurl . "?page=search"; ?>" method="get">
            <input type="hidden" name="page" value="search" size="20" />
            <input type="text"  name="keywords" placeholder="Tên sản phẩm" size="20"/>
            <input type="submit" id="searchbutton" name="search" value="Tìm kiếm"/>
        </form>
    </div>
</div>
