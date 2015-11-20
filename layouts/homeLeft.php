<div id="advise">
    <div class="divtitle"><h2>Thông báo cửa hàng</h2></div>
    <div class="divcontent">
        <h2 style="color:#F00;margin-top:15px;">Thời Gian Bán Hàng</h2>
        <h2 style="margin-top:10px; color:#00F;"> Tất cả các ngày trong tuần </h2>
        <h2 style="margin-top:10px; color:#F00;"> 8h00 - 20h00 </h2>
        <h3 style="margin-top:10px; color:#000;">( Trừ các ngày lễ, tết)</h3>
    </div>
</div>
<div id="quicksearch">
    <div class="divtitle"><h2>Tìm kiếm nhanh</h2></div>
    <div class="divcontent">
        <div class="cont_quick">
            <form action="<?php echo baseurl . "?page=searchall"; ?>" method="get">
                <input type="hidden" name="page" value="searchall"  />
                <table>
                    <tr>
                        <td height="50" width="80">Sản phẩm</td>
                        <td >
                            <select name="type">
                                <option value="0">Chọn sản phẩm</option>
                                <?php if (isset($listcate)) { ?>
                                    <?php foreach ($listcate as $items) { ?>
                                        <option value="<?php echo $items['cate_id']; ?>"><?php echo $items['cate_name']; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Khoảng giá</td>
                        <td>
                            <select name="price">
                                <option value="0">Chọn giá</option>
                                <option value="1">Dưới 5k</option>
                                <option value="2">Từ 5k - 20k</option>
                                <option value="3">Từ 20k - 50k</option>
                                <option value="4">Từ 50k - 100k</option>
                                <option value="5">Từ 100k - 500k</option>
                                <option value="6">Trên 500k</option>
                            </select>

                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td height="50"><input type="submit" name="button" id="button" value="Tìm kiếm" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php require_once("layouts/customer/document/docvip.php"); ?>
<div id="support">
    <div class="divtitle"><h2>Hỗ trợ trực tuyến</h2></div>
    <div class="divcontent">
        <div class="listsupport">
            <table>
                <tr>
                    <td ><a href="Skype:tuanvinh93?call"><img src="http://mystatus.skype.com/bigclassic/tuanvinh93" width="130" height="30"></a></td>
                    <td class="ktv">KTV TuấnND</td>
                </tr>
                <tr>
                    <td><a href="Skype:tuanvinh93?call"><img src="http://mystatus.skype.com/bigclassic/live:tuanvinh93" width="130" height="30"></a></td>
                    <td class="ktv">KTV VinhLT</td>
                </tr>
                <tr>
                    <td><a href="Skype:lapnet9x?call"><img src="http://mystatus.skype.com/bigclassic/lapnet9x" width="130" height="30"></a></td>
                    <td class="ktv">KTV LậpHM</td>
                </tr>

            </table>
            <img src="images/home/support.png" width="80" alt="Hỗ trợ trực tuyến" class="imgsupport">
        </div>
    </div>
</div>
<div id="facebook">
    <div class="divtitle"><h2>Chúng tôi trên facebook</h2></div>
    <div class="divcontent">
        <div class="facecontent">
            <div id="fb-root" style="width:239px; height:200px"> 
                <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id))
                            return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                <div class="fb-like-box" style="width:239px;height:200px;" data-href="https://www.facebook.com/pages/Tr%C6%B0%E1%BB%9Dng-THPT-Nam-Duy%C3%AAn-H%C3%A0/172215852926610?fref=ts" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
            </div>
        </div>
    </div>
</div>
<div id="partners">
    <div class="divtitle"><h2>Thống kê website</h2></div>
    <div class="divcontent">
        <?php require("functions/online.php"); ?>
        <?php require("layouts/online.php"); ?>
        <?php
        $users = new online();
        $online = $users->getOnline();
        $sp = $users->totalPro();
        $user = $users->totalUser();
        ?>
        <div id="stat">
            <table width="240" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="153" height="25">&hearts; Số lượt truy cập:</td>
                    <td width="47"><?php echo $count; ?></td>
                </tr>
                <tr>
                    <td height="25">&hearts; Số người đang online:</td>
                    <td><?php echo $online ?></td>
                </tr>
                <tr>
                    <td height="25">&hearts; Thành viên:</td>
                    <td><?php echo $user; ?></td>
                </tr>
                <tr>
                    <td height="25">&hearts; Tổng số sản phẩm:</td>
                    <td><?php echo $sp; ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
