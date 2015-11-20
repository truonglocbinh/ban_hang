<?php
if(isset($_GET['act'])){
    switch ($_GET['act']){
        case "list":require ("modules/contacts/list.php");break;
        case "detail":require 'modules/contacts/detail.php';break;
        default :require ("modules/contacts/list.php");break;
    }
    }else{
       require ("modules/contacts/list.php");
    }
 ?>