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

try
{

  $staff_name = $_POST['name'];
  $staff_code = $_POST['code'];
  $staff_pass = $_POST['pass'];

  $staff_name = htmlspecialchars($staff_name,ENT_QUOTES,"UTF-8");
  $staff_code = htmlspecialchars($staff_code,ENT_QUOTES,"UTF-8");
  $staff_pass = htmlspecialchars($staff_pass,ENT_QUOTES,"UTF-8");

  $dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
  $user = 'bc9681657abe67'; 
  $password = '8f2c9d49';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  
  $sql = 'UPDATE mst_staff SET name=?,password=? WHERE code=?';
  $stmt = $dbh->prepare($sql);
  $data[] = $staff_name;
  $data[] = $staff_pass;
  $data[] = $staff_code;
  $stmt->execute($data);
  
  $dbh = null;
}
catch(Exception $e)
{
  print 'ただいま障害により大変ご迷惑おかけしております.';
  exit();
}
?>

修正しました<br>
<br>
<a href="staff_list.php">戻る</a>