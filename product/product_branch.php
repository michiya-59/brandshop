<?php 

session_start();
session_regenerate_id(true);
if(isset($_SESSION['login']) === false)
{
  print 'ログインされていません'.'<br>';
  print '<a href="staff_login.php">ログイン画面へ</a>';
  exit();
}
else
{
  print $_SESSION['staff_name'];
  print 'さんログイン中'.'<br>'.'<br>';
}

// product_list.phpからそれぞれの参照、追加、修正、削除機能を商品コードごとにLocationで次のファイルに飛ばす処理


// 参照機能を商品コードによって識別し、その参照するproduct_disp.phpにLocationで飛ばしている
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

// 追加機能を商品コードによって識別し、その追加するproduct_add.phpにLocationで飛ばしている
if(isset($_POST['add']) === true)
{
  
  $product_code = $_POST['productcode'];
  header('Location:product_add.php?productcode='.$product_code);
  exit();
}

// 修正機能を商品コードによって識別し、その修正するproduct_edit.phpにLocationで飛ばしている
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

// 削除機能を商品コードによって識別し、その削除するproduct_delet.phpにLocationで飛ばしている
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