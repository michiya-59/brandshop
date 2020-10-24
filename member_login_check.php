<!DOCTYPE html>
<html lang="ja">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
  <link rel="stylesheet" href="style1.css?v=2" type="text/css">
  <link rel="stylesheet" href="style2.css?v=2" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
<?php 
session_start();
session_regenerate_id(true);

print '<div class="container>';

include('header.php')

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
print '</div>';

catch(Exception $e)
{
  print 'ただいま障害が発生しております。ご迷惑をお掛けして大変申し訳ございません';
  exit();
}
?>
</body>
</html>
