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

// staff_list.phpからそれぞれの参照、追加、修正、削除機能をスタッフコードごとにLocationで次のファイルに飛ばす処理


// 修正機能をスタッフコードによって識別し、その修正するstaff_edit.phpにLocationで飛ばしている
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

// 削除機能をスタッフコードによって識別し、その削除するstaff_delet.phpにLocationで飛ばしている
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

// 追加機能をスタッフコードによって識別し、その追加するstaff_add.phpにLocationで飛ばしている
if(isset($_POST['add']) === true)
{
  header('Location:staff_add.php');
  exit();
}

// 参照機能をスタッフコードによって識別し、その参照するstaff_disp.phpにLocationで飛ばしている
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