<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css" type="text/css" >
</head>
<body>
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

$product_name = $_POST['name'];
$product_price = $_POST['price'];
$product_size = $_POST['size'];
$product_condition = $_POST['condition'];
$product_detail = $_POST['pro_detail'];
$product_gazou = $_POST['gazou'];
$product_stock = $_POST['stock'];
$product_category = $_POST['category'];
$product_brand = $_POST['brand'];

$product_name = htmlspecialchars($product_name,ENT_QUOTES,'UTF-8');
$product_price = htmlspecialchars($product_price,ENT_QUOTES,'UTF-8');


if($product_name === '')
{
  print '商品名が入力されていません'.'<br>';
}
else
{
  print '商品名:';
  print $product_name;
  print '<br><br>';
}

if(preg_match('/\A[0-9]+\z/',$product_price) === 0)
{
  print '価格をきちんと入力してください。';
}
else 
{
  print '価格:';
  print $product_price;
  print '円<br><br>';
}

if($product_size === '')
{
  print '商品のサイズを入力して下さい';
}
else
{
  print '商品サイズ:';
  print $product_size;
  print '<br><br>';
}

print '商品状態:';
print $product_condition;
print '<br><br>';

if($product_detail === '')
{
  print '商品の詳細を記入してください';
} 
else
{
  print '商品説明<br>';
  print $product_detail;
  print '<br><br>';
}

print '出品数<br>';
print $product_stock;
print '個<br><br>';

print 'カテゴリー<br>';
print $product_category;
print '<br><br>';

print 'ブランド<br>';
print $product_brand;
print '<br><br>';



if($product_name === '' || preg_match('/\A[0-9]+\z/',$product_price) === 0 || $product_size === '' || $product_detail === '')
{
  print '<form>';
  print '<input type="button" onclick="history.back()" value="戻る">';
  print '</form>';
}
else
{
  
  switch($product_gazou)
  {
    case '4':
      print '<form action="product_add.check4.php" method="post" enctype="multipart/form-data">';
      print '<input type="file" name="gazou1" style="width:400px"><br>';
      print '<input type="file" name="gazou2" style="width:400px"><br>';
      print '<input type="file" name="gazou3" style="width:400px"><br>';
      print '<input type="file" name="gazou4" style="width:400px"><br><br>';
      print '<input type="hidden" name="name" value="'.$product_name.'">';
      print '<input type="hidden" name="price" value="'.$product_price.'">';
      print '<input type="hidden" name="size" value="'.$product_size.'">';
      print '<input type="hidden" name="condition" value="'.$product_condition.'">';
      print '<input type="hidden" name="detail" value="'.$product_detail.'">';
      print '<input type="hidden" name="stock" value="'.$product_stock.'">';
      print '<input type="hidden" name="category" value="'.$product_category.'">';
      print '<input type="hidden" name="brand" value="'.$product_brand.'">';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '<input type="submit" value="OK">';
      print '</form>';
      break;
  
    case '5':
      print '<form action="product_add.check5.php" method="post" enctype="multipart/form-data">';
      print '<input type="file" name="gazou1" style="width:400px"><br>';
      print '<input type="file" name="gazou2" style="width:400px"><br>';
      print '<input type="file" name="gazou3" style="width:400px"><br>';
      print '<input type="file" name="gazou4" style="width:400px"><br>';
      print '<input type="file" name="gazou5" style="width:400px"><br><br>';
      print '<input type="hidden" name="name" value="'.$product_name.'">';
      print '<input type="hidden" name="price" value="'.$product_price.'">';
      print '<input type="hidden" name="size" value="'.$product_size.'">';
      print '<input type="hidden" name="condition" value="'.$product_condition.'">';
      print '<input type="hidden" name="detail" value="'.$product_detail.'">';
      print '<input type="hidden" name="stock" value="'.$product_stock.'">';
      print '<input type="hidden" name="category" value="'.$product_category.'">';
      print '<input type="hidden" name="brand" value="'.$product_brand.'">';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '<input type="submit" value="OK">';
      print '</form>';
      break;
  
    case '6':
      print '<form action="product_add.check6.php" method="post" enctype="multipart/form-data">';
      print '<input type="file" name="gazou1" style="width:400px"><br>';
      print '<input type="file" name="gazou2" style="width:400px"><br>';
      print '<input type="file" name="gazou3" style="width:400px"><br>';
      print '<input type="file" name="gazou4" style="width:400px"><br>';
      print '<input type="file" name="gazou5" style="width:400px"><br>';
      print '<input type="file" name="gazou6" style="width:400px"><br><br>';
      print '<input type="hidden" name="name" value="'.$product_name.'">';
      print '<input type="hidden" name="price" value="'.$product_price.'">';
      print '<input type="hidden" name="size" value="'.$product_size.'">';
      print '<input type="hidden" name="condition" value="'.$product_condition.'">';
      print '<input type="hidden" name="detail" value="'.$product_detail.'">';
      print '<input type="hidden" name="stock" value="'.$product_stock.'">';
      print '<input type="hidden" name="category" value="'.$product_category.'">';
      print '<input type="hidden" name="brand" value="'.$product_brand.'">';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '<input type="submit" value="OK">';
      print '</form>';
      break;
  
    case '7':
      print '<form action="product_add.check7.php" method="post" enctype="multipart/form-data">';
      print '<input type="file" name="gazou1" style="width:400px"><br>';
      print '<input type="file" name="gazou2" style="width:400px"><br>';
      print '<input type="file" name="gazou3" style="width:400px"><br>';
      print '<input type="file" name="gazou4" style="width:400px"><br>';
      print '<input type="file" name="gazou5" style="width:400px"><br>';
      print '<input type="file" name="gazou6" style="width:400px"><br>';
      print '<input type="file" name="gazou7" style="width:400px"><br><br>';
      print '<input type="hidden" name="name" value="'.$product_name.'">';
      print '<input type="hidden" name="price" value="'.$product_price.'">';
      print '<input type="hidden" name="size" value="'.$product_size.'">';
      print '<input type="hidden" name="condition" value="'.$product_condition.'">';
      print '<input type="hidden" name="detail" value="'.$product_detail.'">';
      print '<input type="hidden" name="stock" value="'.$product_stock.'">';
      print '<input type="hidden" name="category" value="'.$product_category.'">';
      print '<input type="hidden" name="brand" value="'.$product_brand.'">';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '<input type="submit" value="OK">';
      print '</form>';
      break;
  
    case '8':
      print '<form action="product_add.check8.php" method="post" enctype="multipart/form-data">';
      print '<input type="file" name="gazou1" style="width:400px"><br>';
      print '<input type="file" name="gazou2" style="width:400px"><br>';
      print '<input type="file" name="gazou3" style="width:400px"><br>';
      print '<input type="file" name="gazou4" style="width:400px"><br>';
      print '<input type="file" name="gazou5" style="width:400px"><br>';
      print '<input type="file" name="gazou6" style="width:400px"><br>';
      print '<input type="file" name="gazou7" style="width:400px"><br>';
      print '<input type="file" name="gazou8" style="width:400px"><br><br>';
      print '<input type="hidden" name="name" value="'.$product_name.'">';
      print '<input type="hidden" name="price" value="'.$product_price.'">';
      print '<input type="hidden" name="size" value="'.$product_size.'">';
      print '<input type="hidden" name="condition" value="'.$product_condition.'">';
      print '<input type="hidden" name="detail" value="'.$product_detail.'">';
      print '<input type="hidden" name="stock" value="'.$product_stock.'">';
      print '<input type="hidden" name="category" value="'.$product_category.'">';
      print '<input type="hidden" name="brand" value="'.$product_brand.'">';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '<input type="submit" value="OK">';
      print '</form>';
      break;
  
    default:
      print '写真を追加できるのは8枚までです';
  }
}
?>
</body>
</html>