<?php
if(isset($_GET['act']))
{
    switch ($_GET['act']) {
        case "list": require 'modules/customers/list.php';
        break;
        case "add":require 'modules/customers/add.php';
        break;
        case "edit": require 'modules/customers/edit.php';
        break;
        case "detail":require 'modules/customers/detail.php';break;
default :require 'modules/customers/list.php';
        break;
    }
}else{
    require 'modules/customers/list.php';
        
}