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

try
{
$product_code = $_POST['code'];
$product_gazou = $_POST['gazou'];
$product_gazou2 = $_POST['gazou2'];
$product_gazou3 = $_POST['gazou3'];
$product_gazou4 = $_POST['gazou4'];
$product_gazou5 = $_POST['gazou5'];
$product_gazou6 = $_POST['gazou6'];

$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'DELETE FROM mst_product WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $product_code;
$stmt->execute($data);

$dbh = null;

if($product_gazou !== '')
{
  unlink('./gazou/'.$product_gazou);
}
if($product_gazou2 !== '')
{
  unlink('./gazou/'.$product_gazou2);
}
if($product_gazou3 !== '')
{
  unlink('./gazou/'.$product_gazou3);
}
if($product_gazou4 !== '')
{
  unlink('./gazou/'.$product_gazou4);
}
if($product_gazou5 !== '')
{
  unlink('./gazou/'.$product_gazou5);
}
if($product_gazou6 !== '')
{
  unlink('./gazou/'.$product_gazou6);
}

print '削除しました'.'<br>';
}

catch(Exception $e)
{
  print 'ただいま障害が発生しております。ご迷惑をお掛けして大変申し訳ございません';
  exit();
}
?>

<a href="product_list.php">戻る</a>