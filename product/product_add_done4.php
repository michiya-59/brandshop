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

// product_add_check4からhiddenで送られてきた情報をPOSTで受け取る
try
{
$product_name = $_POST['name'];
$product_price = $_POST['price'];
$product_gazou_name1 = $_POST['gazou_name1'];
$product_gazou_name2 = $_POST['gazou_name2'];
$product_gazou_name3 = $_POST['gazou_name3'];
$product_gazou_name4 = $_POST['gazou_name4'];
$product_size = $_POST['size'];
$product_condition = $_POST['condition'];
$product_detail = $_POST['detail'];
$product_stock = $_POST['stock'];
$product_category = $_POST['category'];
$product_brand = $_POST['brand'];

$product_name = htmlspecialchars($product_name,ENT_QUOTES,'UTF-8');
$product_price = htmlspecialchars($product_price,ENT_QUOTES,'UTF-8');

// 写真4枚の時の情報をデーターベースに入れる処理
$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'INSERT INTO mst_product (name,price,gazou,gazou2,gazou3,gazou4,size,condetion,detail,stock,category,brand) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
$stmt = $dbh->prepare($sql);
$data[] = $product_name;
$data[] = $product_price;
$data[] = $product_gazou_name1;
$data[] = $product_gazou_name2;
$data[] = $product_gazou_name3;
$data[] = $product_gazou_name4;
$data[] = $product_size;
$data[] = $product_condition;
$data[] = $product_detail;
$data[] = $product_stock;
$data[] = $product_category;
$data[] = $product_brand;
$stmt->execute($data);

$dbh = null;

print $product_name;
print 'を追加しました';
print '<br>';
}
catch(Exception $e)
{
  print 'ただいま障害が発生しております。ご迷惑をお掛けして大変申し訳ございません。';
  exit();
}
?>
<a href="product_list.php">戻る</a>
