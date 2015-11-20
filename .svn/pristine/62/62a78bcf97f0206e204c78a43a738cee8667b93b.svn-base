<?php
if(isset($_GET['act'])){
    switch ($_GET['act']){
    case "add": require 'modules/sales/add.php';break;
    case "list":require 'modules/sales/list.php'; break;
    case "edit":require 'modules/sales/edit.php'; break; 
    case "detail":require 'modules/sales/detail.php';break;
    case "search":require 'modules/sales/search.php';
                break;
    default :require 'modules/sales/list.php'; break;
    }
}else{
    require 'modules/sales/list.php';
}

