<?php 
require_once("functions/document/doc.php");
$id = $_GET['id'];
$doc = new doc();
$result = $doc->getdata($id);
//debug($result); die();
?>
<div id="homelink"> 
	<a href="<?php echo baseurl; ?>">Trang chủ</a> &raquo; 
    <a href="#">Tài liệu</a>
</div>
<div id="homecontent">
        <div id="doc_title">
            <h2>
            <?php
            echo $result['doc_title'];
            ?>
            </h2>
        </div>
        <div class="doccontent"><?php echo $result['doc_content']; ?></div>
    </div>
    <div class="cls"></div>
</div>