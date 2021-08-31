<?php	
session_start();
$_SESSION['cart'][$_POST['pid']] = array('count' => $_POST['nop'] , );
print_r($_POST);
?>