<?php
if(isset($_GET['act'])){
    switch ($_GET['act']){
    case "add": require 'modules/products/add.php';break;
    case "list":require 'modules/products/list.php'; break;
    case "edit":require 'modules/products/edit.php'; break;    
    case "detail":require 'modules/products/detail.php';  break;
    case "search":require 'modules/products/search.php'; break;
    case 'thongke':
              require "modules/products/thongke.php";
               break;       
    default :require 'modules/products/list.php'; break;
    }
}else{
    require 'modules/products/list.php';
}
