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
$product_code = $_GET['productcode'];

$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * FROM mst_product WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $product_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$product_name = $rec['name'];
$product_price = $rec['price'];
$product_gazou_name = $rec['gazou'];
$product_gazou_name2 = $rec['gazou2'];
$product_gazou_name3 = $rec['gazou3'];
$product_gazou_name4 = $rec['gazou4'];
$product_gazou_name5 = $rec['gazou5'];
$product_gazou_name6 = $rec['gazou6'];
$product_gazou_name7 = $rec['gazou7'];
$product_gazou_name8 = $rec['gazou8'];
$product_size = $rec['size'];
$product_condition = $rec['condetion'];
$product_detail = $rec['detail'];
$product_stock = $rec['stock'];
$product_category = $rec['category'];
$product_brand = $rec['brand'];


$dgh = null;

if($product_gazou_name === '')
{
  $disp_gazou = '';
}
else 
{
  $disp_gazou = '<img src="./gazou/'.$product_gazou_name.'" style="width:200px">';
  $disp_gazou2 = '<img src="./gazou/'.$product_gazou_name2.'" style="width:200px">';
  $disp_gazou3 = '<img src="./gazou/'.$product_gazou_name3.'" style="width:200px">';
  $disp_gazou4 = '<img src="./gazou/'.$product_gazou_name4.'" style="width:200px">';
  $disp_gazou5 = '<img src="./gazou/'.$product_gazou_name5.'" style="width:200px">';
  $disp_gazou6 = '<img src="./gazou/'.$product_gazou_name6.'" style="width:200px">';
  $disp_gazou7 = '<img src="./gazou/'.$product_gazou_name7.'" style="width:200px">';
  $disp_gazou8 = '<img src="./gazou/'.$product_gazou_name8.'" style="width:200px">';
}

print '商品情報参照'.'<br>'.'<br>';
print '商品コード'.'<br>';
print $product_code.'<br><br>';
print '商品名'.'<br>';
print $product_name.'<br><br>';
print '価格'.'<br>';
print $product_price.'円<br><br>';
print '商品サイズ'.'<br>';
print $product_size.'<br><br>';
print '商品状態'.'<br>';
print $product_condition.'<br><br>';
print '商品説明'.'<br>';
print $product_detail.'<br><br>';
print '個数'.'<br>';
print $product_stock.'個<br><br>';
print 'カテゴリー'.'<br>';
print $product_category.'<br><br>';
print 'ブランド'.'<br>';
print $product_brand.'<br><br>';

if($product_gazou_name === $product_gazou_name && $product_gazou_name2 === ''  )
{
  print $disp_gazou;
  print '<form>';
  print '<input type="button" onclick="history.back()" value="戻る">' ;
  print '</form>';
  exit();
}

if($product_gazou_name2 === $product_gazou_name2 && $product_gazou_name3 === ''  )
{
  print $disp_gazou;
  print $disp_gazou2;
  print '<form>';
  print '<input type="button" onclick="history.back()" value="戻る">' ;
  print '</form>';
  exit();
}
if($product_gazou_name3 === $product_gazou_name3 && $product_gazou_name4 === '')
{
  print $disp_gazou;
  print $disp_gazou2;
  print $disp_gazou3;
  print '<form>';
  print '<input type="button" onclick="history.back()" value="戻る">' ;
  print '</form>';
  exit();
}
if($product_gazou_name4 === $product_gazou_name4 && $product_gazou_name5 === '')
{
  print $disp_gazou;
  print $disp_gazou2;
  print $disp_gazou3;
  print $disp_gazou4;
  print '<form>';
  print '<input type="button" onclick="history.back()" value="戻る">' ;
  print '</form>';
  exit();
}
if($product_gazou_name5 === $product_gazou_name5 && $product_gazou_name6 === '')
{
  print $disp_gazou;
  print $disp_gazou2;
  print $disp_gazou3;
  print $disp_gazou4;
  print $disp_gazou5;
  print '<form>';
  print '<input type="button" onclick="history.back()" value="戻る">' ;
  print '</form>';
  exit();
}
if($product_gazou_name6 === $product_gazou_name6 && $product_gazou_name7 === '')
{
  print $disp_gazou;
  print $disp_gazou2;
  print $disp_gazou3;
  print $disp_gazou4;
  print $disp_gazou5;
  print $disp_gazou6;
  print '<form>';
  print '<input type="button" onclick="history.back()" value="戻る">' ;
  print '</form>';
  exit();
}
if($product_gazou_name7 === $product_gazou_name7 && $product_gazou_name8 === '')
{
  print $disp_gazou;
  print $disp_gazou2;
  print $disp_gazou3;
  print $disp_gazou4;
  print $disp_gazou5;
  print $disp_gazou6;
  print $disp_gazou7;
  print '<form>';
  print '<input type="button" onclick="history.back()" value="戻る">' ;
  print '</form>';
  exit();
}
if($product_gazou_name8 === $product_gazou_name8)
{
  print $disp_gazou;
  print $disp_gazou2;
  print $disp_gazou3;
  print $disp_gazou4;
  print $disp_gazou5;
  print $disp_gazou6;
  print $disp_gazou7;
  print $disp_gazou8;
  print '<form>';
  print '<input type="button" onclick="history.back()" value="戻る">' ;
  print '</form>';
  exit();
}


}

catch(Exception $e)
{
  print 'ただいま障害が発生しております。ご迷惑をお掛けして大変申し訳ございません';
  exit();
}
?>