<?php 

session_start();
session_regenerate_id(true);
if(isset($_SESSION['login']) === false)
{
  print 'ログインされていません'.'<br>';
  print '<a href="../staff_login2/staff_login.html">ログイン画面へ</a>';
  exit();
}
else
{
  print $_SESSION['staff_name'];
  print 'さんログイン中'.'<br>'.'<br>';
}

if(isset($_POST['disp']) === true)
{
  if(isset($_POST['productcode']) === false)
  {
    header('Location:product_ng.php');
    exit();
  }
  $product_code = $_POST['productcode'];
  header('Location:product_disp.php?productcode='.$product_code);
  exit();
}

if(isset($_POST['add']) === true)
{
  
  $product_code = $_POST['productcode'];
  header('Location:product_add.php?productcode='.$product_code);
  exit();
}

if(isset($_POST['edit']) === true)
{
  if(isset($_POST['productcode']) === false)
  {
    header('Location:product_ng.php');
    exit();
  }
  $product_code = $_POST['productcode'];
  header('Location:product_edit.php?productcode='.$product_code);
  exit();
}

if(isset($_POST['delet']) === true)
{
  if(isset($_POST['productcode']) === false)
  {
    header('Location:product_ng.php');
    exit();
  }
  $product_code = $_POST['productcode'];
  header('Location:product_delet.php?productcode='.$product_code);
  exit();
}


?>