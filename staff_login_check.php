<?php 
session_start();
session_regenerate_id(true);

try{
$staff_code = $_POST['code'];
$staff_pass = $_POST['pass'];

$staff_code = htmlspecialchars($staff_code,ENT_QUOTES,'UTF-8');
$staff_pass = htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');

$staff_pass = md5($staff_pass);

$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT name FROM mst_staff WHERE code=? AND password=?';
$stmt = $dbh->prepare($sql);
$data[] = $staff_code;
$data[] = $staff_pass;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);

if($rec === false)
{
  print 'スタッフコードかパスワードが間違ってます。'.'<br>';
  print '<a href="staff_login.php">戻る</a>';
}
else
{
  session_start();
  $_SESSION['login'] = 1;
  $_SESSION['staff_code'] = $staff_code;
  $_SESSION['staff_name'] = $rec['name'];
  header('Location:staff_top.php');
  exit();
}

$dbh = null;
}

catch(Exception $e)
{
  print 'ただいま障害が発生しております。ご迷惑をお掛けして大変申し訳ございません';
  exit();
}
