<?php
$online = new online();
$file = fopen("functions/count.txt","r");
$count = fgets($file);
fclose($file);
$file = fopen("functions/count.txt","w");
$count = $count + 1;
fwrite($file,$count);
fclose($file);
?>