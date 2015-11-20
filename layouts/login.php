<?php ob_start(); ?>
<script type="text/javascript">
    $(document).ready(function(e) {//open 1
        $link = "<?php echo baseurl; ?>";
        $("#submit").click(function() {//open 2
            user = $("#user").val();
            pass = $("#pass").val();
            if (user == "" || pass == "") {//open 3
                $("#errors").html("Bạn chưa nhập đủ thông tin!");
                return false;
            } else {//close 3, open 3'
                $.ajax({//open 4
                    "url": "functions/process.php", //where data receive
                    "type": "post", //data transfer method
                    "data": "user=" + user + "&pass=" + pass, //data need transfer to PHP
                    "async": false,
                    success: function(result) {//receive data from PHP,open 5
                        if (result == 1) {//open 6
                            $("#errors").html("Sai username hoặc password");
                            return false;
                        } else {//close 6, open 6'
                            $("#errors").html("<img src='" + $link + "images/loading/loading.gif'/>Đang load dữ liệu");
                            setTimeout(function() {//open 7
                                $("#showuser").html(result);
                            }, 1000);//close 7
                        }//close 6'
                    }//close 5
                });//close 4
            }//close 3'
        });//close 2
    });//close 1
</script>
<form action="" method="post">

</form>
<div class="users">
    <div id="showuser">
        <?php if (isset($_SESSION['ses_name'])) { ?>
            <?php
            echo "<div style='padding:10px 7px'>";
            echo "Xin chào " . $_SESSION['ses_name'] . ". ";
            echo "<a href='".baseurl."index.php?page=user'>Thông tin. </a>";
            echo "<a href='".baseurl."index.php?page=order'>Đơn hàng của bạn.</a>";
            ?>
            <a href='layouts/logout.php' onclick='return confirm('Bạn có muốn thoát không?')'>Thoát</a>
            <?php
            echo "</div>";
            ?>
        <?php } else { ?>
            <div class="usercontent">
                Tài khoản &nbsp;
                <input type="text" name="user" id="user" size="10" /> &nbsp;&nbsp;&nbsp;
                Mật khẩu &nbsp;
                <input type="password" name="pass" id="pass" size="10" /> &nbsp;&nbsp;&nbsp;
                <input type="submit" id="submit" value="Đăng nhập"> &nbsp;&nbsp;&nbsp;
                <a class="register" href="<?php echo baseurl; ?>?page=register">Đăng ký</a>
                <div id="errors" style="color:#F00"></div>
            </div>
        <?php } ?>
    </div>
</div>