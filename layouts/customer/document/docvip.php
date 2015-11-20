<div id="document">
    <div class="divtitle"><h2>Tài liệu nổi bật</h2></div>
    <?php require_once("functions/document/doc.php"); ?>
    <?php
    $doc = new doc();
    $listdocvip = $doc->listdocvip(6);
    ?>
    <div id="doccontent">
        <ul>
            <?php foreach ($listdocvip as $items) { ?>
                <li><a href="<?php echo baseurl . "?page=document&act=detail&id=$items[doc_id]"; ?>"><?php echo $items['doc_title']; ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>