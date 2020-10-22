<?php 

session_start();

$_SESSION['cart'] = null;
// $stock = $_SESSION['stock'];
// $_SESSION['stock'] = $stock;

header('Location:index.php');
exit();
?>