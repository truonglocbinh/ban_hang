<div id="leftcontent">
    <?php require("layouts/homeLeft.php"); ?>
</div>
<div id="rightcontent">
    <?php
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case "register" : require("functions/users/register.php");
                break;
            case "product" :require("layouts/products/controller.php");
                break;
            case "intro" : {
				require ("layouts/intro/intro.php");
				$title="Giới thiệu";  
			}
                break;
            case "contact" : require ("layouts/contact/contact.php");
                break;
            case "customer" : require ("layouts/customer/controller.php");
                break;
            case "document" : require ("layouts/customer/document/controller.php");
                break;
            case "search" : require("layouts/search/home.php");
                break;
            case "searchall": require("layouts/search/all.php");
                break;
				
			case "addCart" : require("functions/shopCart/addCart.php");
                break;
            case "indexCart": require("functions/shopCart/indexCart.php");
                break;
			case "cart": require("functions/shopCart/indexCart.php");
				break;
			case "delCart":require("functions/shopCart/delCart.php");
				break;
			case "user":require("functions/users/infor.php");
				break;
			case "order":require("functions/shopCart/inforCart.php");
				break;
        }
    } else {
        require("layouts/products/home.php");
		$title="Trang chủ";
    }
    ?>
</div>
