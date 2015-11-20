
<?php 
$pid=$_GET['pid'];
$product=new categories();
$result=$product->getPro($pid);

echo str_replace('-','</br>',$result['pro_full']);

?>