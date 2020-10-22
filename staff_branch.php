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

if(isset($_POST['edit']) == true)
{
  if(isset($_POST['staffcode']) == false)
  {
    header('Location:staff_ng.php');
    exit();
  }
  $staff_code = $_POST['staffcode'];
  header('Location:staff_edit.php?staffcode='.$staff_code);
  exit();
}

if(isset($_POST['delet']) == true)
{
  if(isset($_POST['staffcode']) == false)
  {
    header('Location:staff_ng.php');
    exit();
  }
  $staff_code = $_POST['staffcode'];
  header('Location:staff_delet.php?staffcode='.$staff_code);
  exit();
}

if(isset($_POST['add']) === true)
{
  header('Location:staff_add.php');
  exit();
}

if(isset($_POST['disp']) === true)
{
  if(isset($_POST['disp']) === false)
  {
    header('Location:staff_ng.php');
    exhit();
  }
  $staff_code = $_POST['staffcode'];
  header('Location:staff_disp.php?staffcode='.$staff_code);
  exit();
}

?>