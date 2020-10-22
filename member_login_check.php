<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css?v=2">
</head>
<body>
<?php 
session_start();
session_regenerate_id(true);

try{
$member_mail = $_POST['mail'];
$member_pass = $_POST['pass'];

$member_mail = htmlspecialchars($member_mail,ENT_QUOTES,'UTF-8');
$member_pass = htmlspecialchars($member_pass,ENT_QUOTES,'UTF-8');

$member_pass = md5($member_pass);

$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT code,name FROM dat_member WHERE mail=? AND password=?';
$stmt = $dbh->prepare($sql);
$data[] = $member_mail;
$data[] = $member_pass;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);

if($rec === false)
{
  print 'メールアドレスかパスワードが違います'.'<br>';
  print '<a href="member_login.php">戻る</a>';
}
else
{
  session_start();
  $_SESSION['member_login'] = 1;
  $_SESSION['member_code'] = $rec['code'];
  $_SESSION['member_name'] = $rec['name'];
  header('Location:index.php');
  exit();
}

$dbh = null;
}

catch(Exception $e)
{
  print 'ただいま障害が発生しております。ご迷惑をお掛けして大変申し訳ございません';
  exit();
}
?>
</body>
</html>
