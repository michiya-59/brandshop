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
$product_code = $_GET['productcode'];

$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT name,price,gazou,gazou2,gazou3,gazou4,gazou5,gazou6,gazou7,gazou8,size,condetion,detail,stock FROM mst_product WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $product_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$product_name = $rec['name'];
$product_price = $rec['price'];
$product_gazou = $rec['gazou'];
$product_gazou2 = $rec['gazou2'];
$product_gazou3 = $rec['gazou3'];
$product_gazou4 = $rec['gazou4'];
$product_gazou5 = $rec['gazou5'];
$product_gazou6 = $rec['gazou6'];
$product_gazou7 = $rec['gazou7'];
$product_gazou8 = $rec['gazou8'];
$product_size = $rec['size'];
$product_condition = $rec['condetion'];
$product_detail = $rec['detail'];
$product_stock = $rec['stock'];

$dbh = null;

if($product_gazou === '')
{
  $disp_gazou = '';
}
else
{
  $disp_gazou = '<img src="/gazou/'.$product_gazou.'" style="width:200px">';
  $disp_gazou2 = '<img src="/gazou/'.$product_gazou2.'" style="width:200px">';
  $disp_gazou3 = '<img src="/gazou/'.$product_gazou3.'" style="width:200px">';
  $disp_gazou4 = '<img src="/gazou/'.$product_gazou4.'" style="width:200px">';
  $disp_gazou5 = '<img src="/gazou/'.$product_gazou5.'" style="width:200px">';
  $disp_gazou6 = '<img src="/gazou/'.$product_gazou6.'" style="width:200px">';
  $disp_gazou7 = '<img src="/gazou/'.$product_gazou7.'" style="width:200px">';
  $disp_gazou8 = '<img src="/gazou/'.$product_gazou8.'" style="width:200px">';
}

if($product_gazou4 === $product_gazou4 && $product_gazou5 === '' )
  {
    print '商品削除<br><br>';
    print '商品コード<br>';
    print $product_code; 
    print '<br><br>';
    print '商品名<br>';
    print $product_name;
    print '<br>';
    print '価格<br>';
    print $product_price;
    print '<br>';
    print '商品サイズ<br>';
    print $product_size;
    print '<br>';
    print '商品状態<br>';
    print $product_condition;
    print '<br>';
    print '商品説明<br>';
    print $product_detail;
    print '<br>';
    print '個数<br>';
    print $product_stock;
    print '<br>';
    print $disp_gazou;
    print $disp_gazou2;
    print $disp_gazou3;
    print '<br><br>';
    print 'この商品を削除してもいいですか？<br>';
    print '<form action="product_delet_done4.php" method="post" enctype="multipart/form-data">';
    print '<input type="hidden" name="code" value="'.$product_code.'">';
    print '<input type="hidden" name="gazou" value="'.$product_gazou.'">';
    print '<input type="hidden" name="gazou2" value="'.$product_gazou2.'">';
    print '<input type="hidden" name="gazou3" value="'.$product_gazou3.'">';
    print '<input type="hidden" name="gazou4" value="'.$product_gazou4.'">';
    print '<input type="button" onclick="history.back()" value="戻る">' ;
    print '<input type="submit" value="OK">' ;
    print '</form>';
    exit();
  }
  if($product_gazou5 === $product_gazou5 && $product_gazou6 === '' )
  {
    print '商品削除<br><br>';
    print '商品コード<br>';
    print $product_code; 
    print '<br><br>';
    print '商品名<br>';
    print $product_name;
    print '<br>';
    print '価格<br>';
    print $product_price;
    print '<br>';
    print '商品サイズ<br>';
    print $product_size;
    print '<br>';
    print '商品状態<br>';
    print $product_condition;
    print '<br>';
    print '商品説明<br>';
    print $product_detail;
    print '<br>';
    print '個数<br>';
    print $product_stock;
    print '<br>';
    print $disp_gazou;
    print $disp_gazou2;
    print $disp_gazou3;
    print $disp_gazou4;
    print $disp_gazou5;
    print '<br><br>';
    print 'この商品を削除してもいいですか？<br>';
    print '<form action="product_delet_done5.php" method="post" enctype="multipart/form-data">';
    print '<input type="hidden" name="code" value="'.$product_code.'">';
    print '<input type="hidden" name="gazou" value="'.$product_gazou.'">';
    print '<input type="hidden" name="gazou2" value="'.$product_gazou2.'">';
    print '<input type="hidden" name="gazou3" value="'.$product_gazou3.'">';
    print '<input type="hidden" name="gazou4" value="'.$product_gazou4.'">';
    print '<input type="hidden" name="gazou5" value="'.$product_gazou5.'">';
    print '<input type="button" onclick="history.back()" value="戻る">' ;
    print '<input type="submit" value="OK">' ;
    print '</form>';
    exit();
  }
  if($product_gazou6 === $product_gazou6 && $product_gazou7 === '' )
  {
    print '商品削除<br><br>';
    print '商品コード<br>';
    print $product_code; 
    print '<br><br>';
    print '商品名<br>';
    print $product_name;
    print '<br>';
    print '価格<br>';
    print $product_price;
    print '<br>';
    print '商品サイズ<br>';
    print $product_size;
    print '<br>';
    print '商品状態<br>';
    print $product_condition;
    print '<br>';
    print '商品説明<br>';
    print $product_detail;
    print '<br>';
    print '個数<br>';
    print $product_stock;
    print '<br>';
    print $disp_gazou;
    print $disp_gazou2;
    print $disp_gazou3;
    print $disp_gazou4;
    print $disp_gazou5;
    print $disp_gazou6;
    print '<br><br>';
    print 'この商品を削除してもいいですか？<br>';
    print '<form action="product_delet_done6.php" method="post" enctype="multipart/form-data">';
    print '<input type="hidden" name="code" value="'.$product_code.'">';
    print '<input type="hidden" name="gazou" value="'.$product_gazou.'">';
    print '<input type="hidden" name="gazou2" value="'.$product_gazou2.'">';
    print '<input type="hidden" name="gazou3" value="'.$product_gazou3.'">';
    print '<input type="hidden" name="gazou4" value="'.$product_gazou4.'">';
    print '<input type="hidden" name="gazou5" value="'.$product_gazou5.'">';
    print '<input type="hidden" name="gazou6" value="'.$product_gazou6.'">';
    print '<input type="button" onclick="history.back()" value="戻る">' ;
    print '<input type="submit" value="OK">' ;
    print '</form>';
    exit();
  }
  if($product_gazou7 === $product_gazou7 && $product_gazou8 === '' )
  {
    print '商品削除<br><br>';
    print '商品コード<br>';
    print $product_code; 
    print '<br><br>';
    print '商品名<br>';
    print $product_name;
    print '<br>';
    print '価格<br>';
    print $product_price;
    print '<br>';
    print '商品サイズ<br>';
    print $product_size;
    print '<br>';
    print '商品状態<br>';
    print $product_condition;
    print '<br>';
    print '商品説明<br>';
    print $product_detail;
    print '<br>';
    print '個数<br>';
    print $product_stock;
    print '<br>';
    print $disp_gazou;
    print $disp_gazou2;
    print $disp_gazou3;
    print $disp_gazou4;
    print $disp_gazou5;
    print $disp_gazou6;
    print $disp_gazou7;
    print '<br><br>';
    print 'この商品を削除してもいいですか？<br>';
    print '<form action="product_delet_done4.php" method="post" enctype="multipart/form-data">';
    print '<input type="hidden" name="code" value="'.$product_code.'">';
    print '<input type="hidden" name="gazou" value="'.$product_gazou.'">';
    print '<input type="hidden" name="gazou2" value="'.$product_gazou2.'">';
    print '<input type="hidden" name="gazou3" value="'.$product_gazou3.'">';
    print '<input type="hidden" name="gazou4" value="'.$product_gazou4.'">';
    print '<input type="hidden" name="gazou5" value="'.$product_gazou5.'">';
    print '<input type="hidden" name="gazou6" value="'.$product_gazou6.'">';
    print '<input type="hidden" name="gazou7" value="'.$product_gazou7.'">';
    print '<input type="button" onclick="history.back()" value="戻る">' ;
    print '<input type="submit" value="OK">' ;
    print '</form>';
    exit();
  }
  if($product_gazou8 === $product_gazou8)
  {
    print '商品削除<br><br>';
    print '商品コード<br>';
    print $product_code; 
    print '<br><br>';
    print '商品名<br>';
    print $product_name;
    print '<br>';
    print '価格<br>';
    print $product_price;
    print '<br>';
    print '商品サイズ<br>';
    print $product_size;
    print '<br>';
    print '商品状態<br>';
    print $product_condition;
    print '<br>';
    print '商品説明<br>';
    print $product_detail;
    print '<br>';
    print '個数<br>';
    print $product_stock;
    print '<br>';
    print $disp_gazou;
    print $disp_gazou2;
    print $disp_gazou3;
    print $disp_gazou4;
    print $disp_gazou5;
    print $disp_gazou6;
    print $disp_gazou7;
    print $disp_gazou8;
    print '<br><br>';
    print 'この商品を削除してもいいですか？<br>';
    print '<form action="product_delet_done4.php" method="post" enctype="multipart/form-data">';
    print '<input type="hidden" name="code" value="'.$product_code.'">';
    print '<input type="hidden" name="gazou" value="'.$product_gazou.'">';
    print '<input type="hidden" name="gazou2" value="'.$product_gazou2.'">';
    print '<input type="hidden" name="gazou3" value="'.$product_gazou3.'">';
    print '<input type="hidden" name="gazou4" value="'.$product_gazou4.'">';
    print '<input type="hidden" name="gazou5" value="'.$product_gazou5.'">';
    print '<input type="hidden" name="gazou6" value="'.$product_gazou6.'">';
    print '<input type="hidden" name="gazou7" value="'.$product_gazou7.'">';
    print '<input type="hidden" name="gazou8" value="'.$product_gazou8.'">';
    print '<input type="button" onclick="history.back()" value="戻る">' ;
    print '<input type="submit" value="OK">' ;
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
