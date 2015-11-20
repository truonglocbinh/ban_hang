<?php
require_once("functions/products.php");
$type = $_GET['type'];
$price = $_GET['price'];
$limit = 4;
$product = new products();
$categories = new categories();
if (isset($_GET['start'])) {
    $start = $_GET['start'];
} else {
    $start = 0;
}
if (isset($_GET['totalpages'])) {
    $totalpages = $_GET['totalpages'];
} else {
    $totalrecord = $product->numAll($type, $price);
    $totalpages = ceil($totalrecord / $limit);
}
$result = $product->findall($type, $price, $start, $limit);
?>

<div id="homelink"> <a href="<?php echo baseurl; ?>">Trang chủ</a> &raquo; <a href="#">Tìm kiếm</a></div>
<div id="hotproduct">
    <div class="protitle">
        <h3>Kết quả tìm kiếm</h3>
    </div>
    <div class="relatecontent">
        <?php
        if ($result != NULL) {
            ?>
            <?php foreach ($result as $items) { ?>
                <div class="productrelate"> <a href="<?php echo baseurl . "?page=product&act=detail&pid=" . $items['pro_id']; ?>"><img src="<?php echo baseurl . "images/products/" . $items['pro_image']; ?>" width="133" height="133" alt=""></a>
                    <h3><a href="<?php echo baseurl . "?page=product&act=detail&pid=" . $items['pro_id']; ?>"><?php echo $items['pro_name']; ?></a></h3>
                    <p>Giá : <span class="red"><?php echo $items['pro_price']; ?> vnd</span></p>
                    <a href="<?php echo baseurl . "?page=product&act=addToCart&pid=" . $items['pro_id'] . "&qty=1"; ?>" ><img src="images/products/muahang.jpg" style="width:80px" height="30px" /></a>
                </div>
            <?php } ?>
            <div class="clear"></div>
        </div>

    </div>
    <div class="page">
        <?php
        if ($totalpages > 1) { // số trang phải từ 2 trang trở lên
            $current = ($start / $limit) + 1; // trang hiện hành
            if ($current != 1) { // Nút prev
                $newstart = $start - $limit;
                $new = $current - 1;
                $starthome = 0;
                $newhome = 1;
                echo "<a  class='current'href='" . baseurl . "/?page=searchall&type=$type&price=$price&start=$starthome&numpage=$newhome'>Star</a>";

                echo "<a  class='current'href='" . baseurl . "/?page=searchall&type=$type&price=$price&start=$newstart&numpage=$new'>Prev</a>";
            }
            for ($i = 1; $i <= $totalpages; $i++) {

                if ($i == $current && $i == 1) {
                    $newstart = ($i - 1) * $limit;
                    $newstart1 = ($i) * $limit;
                    $newstart2 = ($i + 1) * $limit;

                    $new1 = $current + 1;
                    $new2 = $current + 2;
                    $k = $i + 1;
                    $l = $i + 2;
                    echo "<span class='rightnow'>" . $i . "</span>";
                    echo "<a class='current' href='" . baseurl . "/?page=searchall&type=$type&price=$price&start=$newstart1&numpage=$new1'>" . $k . "</a>";
                    echo "<a class='current' href='" . baseurl . "/?page=searchall&type=$type&price=$price&start=$newstart2&numpage=$new2'>" . $l . "</a>";
                } else
                if ($i == $current && $current > 1 && $current < $totalpages) {
                    $new = $current;
                    $new1 = $current - 1;
                    $new2 = $current + 1;
                    $newstart = ($i - 1 ) * $limit;
                    $newstart1 = ($i - 2 ) * $limit;
                    $newstart2 = ($i) * $limit;
                    $j = $i - 1;
                    $k = $i + 1;

                    echo "<a class='current' href='" . baseurl . "/?page=searchall&type=$type&price=$price&start=$newstart1&numpage=$new1'>" . $j . "</a>";
                    echo "<span class='rightnow'>" . $i . "</span>";
                    echo "<a class='current' href='" . baseurl . "/?page=searchall&type=$type&price=$price&start=$newstart2&numpage=$new2'>" . $k . "</a>";
                } else
                if ($i == $current && $i == $totalpages) {
                    $new = $current + 1;
                    $new1 = $current - 2;
                    $new2 = $current - 1;
                    $k = $i - 1;
                    $l = $i - 2;
                    $newstart = ($i - 1 ) * $limit;
                    $newstart1 = ($i - 3) * $limit;
                    $newstart2 = ($i - 2) * $limit;
                    echo "<a class='current' href='" . baseurl . "/?page=searchall&type=$type&price=$price&start=$newstart1&numpage=$new1'>" . $l . "</a>";
                    echo "<a class='current' href='" . baseurl . "/?page=searchall&type=$type&price=$price&start=$newstart2&numpage=$new2'>" . $k . "</a>";
                    echo "<span class='rightnow'>" . $i . "</span>";
                }
            }

            if ($current != $totalpages) { // Nút next
                $newstart = $start + $limit;
                $new = $current + 1;
                $last = ($totalpages - 1) * $limit;
                echo "<a  class='current'href='" . baseurl . "/?page=searchall&type=$type&price=$price&pages=$current&start=$newstart&numpage=$new'>Next</a>";
                echo "<a  class='current'href='" . baseurl . "/?page=searchall&type=$type&price=$price&pages=$current&start=$last&numpage=$totalpages'>Last</a>";
            }
        }
    } else {
        echo "Không có kết quả phù hợp!";
    }
    ?>
</div>
</div>