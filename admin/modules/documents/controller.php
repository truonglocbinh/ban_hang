<?php
if(isset($_GET['act'])){
switch ($_GET['act']){
    case "add":require 'modules/documents/add.php';break;
    case "list":require 'modules/documents/list.php';break;
    case "edit":require 'modules/documents/edit.php';break;  
    case "detail":require 'modules/documents/detail.php';break;
    case "search":require 'modules/documents/search.php';break;
default :require 'modules/documents/list.php';break;
}
}else{
    require 'modules/documents/list.php';
}