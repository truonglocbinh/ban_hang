<?php
if(isset($_GET['act'])){
switch ($_GET['act']){
    case "add":require 'modules/news/add.php';break;
    case "list":require 'modules/news/list.php';break;
    case "edit":require 'modules/news/edit.php';break;              
}
}