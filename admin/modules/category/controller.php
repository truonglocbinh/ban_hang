<?php
if(isset($_GET['act'])){
    switch ($_GET['act']){
        case "list":require ("modules/category/list.php");break;
        case "add":require ("modules/category/add.php");break;
        case "edit":require 'modules/category/edit.php';break;
        case "detail":require 'modules/category/detail.php';break;
default :require ("modules/category/list.php");break;
    }
    }else{
       require ("modules/category/list.php");
    
    }