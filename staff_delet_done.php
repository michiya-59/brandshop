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
  $staff_code = $_POST['code'];

  $dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  
  $sql = 'DELETE FROM mst_staff WHERE code=?';
  $stmt =$dbh->prepare($sql);
  $data[] = $staff_code;
  $stmt->execute($data);

  $dbh = null;

  print '削除しました。<br>';
}
catch (Exception $e)
{
  print 'ただいま障害により大変ご迷惑おかけしております.';
  exit();
}
?>

<a href="staff_list.php">戻る</a>