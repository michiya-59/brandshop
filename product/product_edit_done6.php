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

// product_edit.check6.phpから送られてきた、変更するため情報をPOSTで受け取る
try
{
$product_name = $_POST['name'];
$product_price = $_POST['price'];
$product_code = $_POST['code'];
$product_size = $_POST['size'];
$product_condition = $_POST['condition'];
$product_detail = $_POST['detail'];
$product_stock = $_POST['stock'];
$product_category = $_POST['category'];
$product_brand = $_POST['brand'];
$product_gazou_name_old = $_POST['gazou_name_old'];
$product_gazou_name_old2 = $_POST['gazou_name_old2'];
$product_gazou_name_old3 = $_POST['gazou_name_old3'];
$product_gazou_name_old4 = $_POST['gazou_name_old4'];
$product_gazou_name_old5 = $_POST['gazou_name_old5'];
$product_gazou_name_old6 = $_POST['gazou_name_old6'];
$product_gazou_name = $_POST['gazou_name'];
$product_gazou_name2 = $_POST['gazou_name2'];
$product_gazou_name3 = $_POST['gazou_name3'];
$product_gazou_name4 = $_POST['gazou_name4'];
$product_gazou_name5 = $_POST['gazou_name5'];
$product_gazou_name6 = $_POST['gazou_name6'];


$product_name = htmlspecialchars($product_name,ENT_QUOTES,'UTF-8');
$product_price = htmlspecialchars($product_price,ENT_QUOTES,'UTF-8');
$product_code = htmlspecialchars($product_code,ENT_QUOTES,'UTF-8');

$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

// UPDATE文で全ての情報を上記のPOSTで受け取った情報を元に変更
$sql = 'UPDATE mst_product SET name=?,price=?,gazou=?,gazou2=?,gazou3=?,gazou4=?,gazou5=?,gazou6=?,size=?,condetion=?,detail=?,stock=?,category=?,brand=? WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $product_name;
$data[] = $product_price;
$data[] = $product_gazou_name;
$data[] = $product_gazou_name2;
$data[] = $product_gazou_name3;
$data[] = $product_gazou_name4;
$data[] = $product_gazou_name5;
$data[] = $product_gazou_name6;
$data[] = $product_size;
$data[] = $product_condition;
$data[] = $product_detail;
$data[] = $product_stock;
$data[] = $product_category;
$data[] = $product_brand;
$data[] = $product_code;
$stmt->execute($data);

$dbh = null;

// 古い画像を削除している
if($product_gazou_name_old !== $product_gazou_name)
{
  if($product_gazou_name_old !== '')
  {
    unlink('./gazou/'.$product_gazou_name_old);
  }
}

if($product_gazou_name_old2 !== $product_gazou_name2)
{
  if($product_gazou_name_old2 !== '')
  {
    unlink('./gazou/'.$product_gazou_name_old2);
  }
}
if($product_gazou_name_old3 !== $product_gazou_name3)
{
  if($product_gazou_name_old3 !== '')
  {
    unlink('./gazou/'.$product_gazou_name_old3);
  }
}
if($product_gazou_name_old4 !== $product_gazou_name4)
{
  if($product_gazou_name_old4 !== '')
  {
    unlink('./gazou/'.$product_gazou_name_old4);
  }
}
if($product_gazou_name_old5 !== $product_gazou_name5)
{
  if($product_gazou_name_old5 !== '')
  {
    unlink('./gazou/'.$product_gazou_name_old5);
  }
}
if($product_gazou_name_old6 !== $product_gazou_name6)
{
  if($product_gazou_name_old6 !== '')
  {
    unlink('./gazou/'.$product_gazou_name_old6);
  }
}
// 終わり

print '修正しました';
print '<br>';
}

catch(Exception $e)
{
  print 'ただいま障害が発生しております。ご迷惑をお掛けして大変申し訳ございません';
  exit();
}
?>
<a href="product_list.php">戻る</a>