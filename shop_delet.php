<?php 
session_start();
session_regenerate_id(true);

$max = $_POST['max'];

$max = htmlspecialchars($max,ENT_QUOTES,'UTF-8');

$cart = $_SESSION['cart'];

for($i = $max; 0 <= $i; $i--)
{
  if(isset($_POST['sakujo'.$i]) === true)
  {
    array_splice($cart,$i,1);
    
  }
}
$_SESSION['cart'] = $cart;

header('Location:shop_cartlook.php');
exit();

?>