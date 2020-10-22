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
  $dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
  $user = 'bc9681657abe67'; 
  $password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT code,name,price FROM mst_product WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$dbh = null;

print '商品一覧';
print '<br>';
print '<br>';
print '<form action="product_branch.php" method="post">';
while(true)
{
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  if($rec === false)  
  {
  break;
  }
  print '<input type="radio" name="productcode" value="'.$rec['code'].'">';
  print $rec['name'].'---';
  print $rec['price'];
  print '円';
  print '<br>';
}
print '<input type="submit" name="disp" value="参照">';
print '<input type="submit" name="add" value="追加">';
print '<input type="submit" name="edit" value="修正">';
print '<input type="submit" name="delet" value="削除">';
print '</form>';

}
catch(Exception $e)
{
  print 'ただいま障害が発生しております。ご迷惑をおかけして大変申し訳ございません';
  exit();
}

?>
<br>
<a href="staff_top.php">トップメニューへ</a><br>
<a href="index.php">ショップへ</a><br>