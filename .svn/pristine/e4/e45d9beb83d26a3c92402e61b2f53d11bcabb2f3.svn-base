<?php
if(isset($_GET['act']))
{
    switch ($_GET['act']) {
        case "list": require 'modules/intro/list.php';
        break;
        case "add":require 'modules/intro/add.php';
        break;
        case "edit": require 'modules/intro/edit.php';
        break;
        case "detail":require 'modules/intro/detail.php';break;
default :require 'modules/intro/list.php';
        break;
    }
}else{
    require 'modules/intro/list.php';
}