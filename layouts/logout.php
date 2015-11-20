<?php session_start(); ?>
<?php require("../functions/config.php"); ?>
<?php
session_destroy();
header("location:".baseurl);
exit();
?>