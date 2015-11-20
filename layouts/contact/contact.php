<?php
require_once("functions/contact/contact.php");
$contact = new contact();
?>    
<?php
$notice = "";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $content = $_POST['content'];
    $rulephone = "/^0[0-9]{9,10}$/";
    $ruleemail = "/^[a-z]{1}[a-zA-Z0-9.]{2,}@[a-zA-Z0-9-_]{2,10}\.[a-zA-Z]{2,5}$/";

    if ($name == NULL || $phone == NULL || $content == NULL || $email == NULL) {
        $notice = "Bạn phải điền đầy đủ nội dung";
    } else {
        if (!preg_match($rulephone, $phone)) {
            $notice = "Số điện thoại không hợp lệ";
        } else {
            if (!preg_match($ruleemail, $email)) {
                $notice = "Địa chỉ email không hợp lệ";
            } else {
                $contact->setdata($name, $phone, $email, $content);
                $notice = "Bạn đã gửi thông tin thành công. Chúng tôi sẽ liên lạc với bạn sớm nhất có thể!";
            }
        }
    }
}
?>
<div id="homelink">
    <a href="<?php echo baseurl; ?>">Trang chủ</a> &raquo; <a href="#">Liên hệ</a>
</div>
<div id="homecontent">

    <div id="contentcontact">
        <h2>Bạn muốn nói gì?</h2>
        <form action="" method="post">
            <table width="800" >
                <tr>
                    <td width="100">Họ và tên</td>
                    <td><input type="text" name="name" size="30"></td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td width="100">Số điện thoại</td>
                    <td><input type="text" name="phone" size="30"></td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td width="100">Email</td>
                    <td><input type="text" name="email" size="30"></td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td>Nội dung</td>
                    <td><textarea rows="10" cols="60" name="content"></textarea></td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" style="width:50px;">
                    </td>
                </tr>
            </table>
        </form>
        <p style="color:red;"><?php echo $notice; ?></p>
    </div>
</div>