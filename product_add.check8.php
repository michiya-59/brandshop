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
$product_gazou1 = $_FILES['gazou1'];
$product_gazou2 = $_FILES['gazou2'];
$product_gazou3 = $_FILES['gazou3'];
$product_gazou4 = $_FILES['gazou4'];
$product_gazou5 = $_FILES['gazou5'];
$product_gazou6 = $_FILES['gazou6'];
$product_gazou7 = $_FILES['gazou7'];
$product_gazou8 = $_FILES['gazou8'];
$product_size = $_POST['size'];
$product_condition = $_POST['condition'];
$product_detail = $_POST['detail'];
$product_stock = $_POST['stock'];
$product_category = $_POST['category'];
$product_brand = $_POST['brand'];

$product_name = htmlspecialchars($product_name,ENT_QUOTES,'UTF-8');
$product_price = htmlspecialchars($product_price,ENT_QUOTES,'UTF-8');

print '商品名:';
print $product_name;
print '<br><br>'; 

print '価格:';
print $product_price;
print '円<br><br>';

print '商品サイズ:';
print $product_size;
print '<br><br>';

print '商品状態:';
print $product_condition;
print '<br><br>';

print '商品説明:';
print $product_detail;
print '<br><br>';

print '商品個数:';
print $product_stock;
print '<br><br>';

print 'カテゴリー<br>';
print $product_category;
print '<br><br>';

print 'ブランド<br>';
print $product_brand;
print '<br><br>';


move_uploaded_file($product_gazou1['tmp_name'],'./gazou/'.$product_gazou1['name']);
print '<img src="./gazou/'.$product_gazou1['name'].'" style="width:200px">';
move_uploaded_file($product_gazou2['tmp_name'],'./gazou/'.$product_gazou2['name']);
print '<img src="./gazou/'.$product_gazou2['name'].'" style="width:200px">';
move_uploaded_file($product_gazou3['tmp_name'],'./gazou/'.$product_gazou3['name']);
print '<img src="./gazou/'.$product_gazou3['name'].'" style="width:200px">';
move_uploaded_file($product_gazou4['tmp_name'],'./gazou/'.$product_gazou4['name']);
print '<img src="./gazou/'.$product_gazou4['name'].'" style="width:200px">';
move_uploaded_file($product_gazou5['tmp_name'],'./gazou/'.$product_gazou5['name']);
print '<img src="./gazou/'.$product_gazou5['name'].'" style="width:200px">';
move_uploaded_file($product_gazou6['tmp_name'],'./gazou/'.$product_gazou6['name']);
print '<img src="./gazou/'.$product_gazou6['name'].'" style="width:200px">';
move_uploaded_file($product_gazou7['tmp_name'],'./gazou/'.$product_gazou7['name']);
print '<img src="./gazou/'.$product_gazou7['name'].'" style="width:200px">';
move_uploaded_file($product_gazou8['tmp_name'],'./gazou/'.$product_gazou8['name']);
print '<img src="./gazou/'.$product_gazou8['name'].'" style="width:200px">';
print '<br>';


print '<form action="product_add_done8.php" method="post">';
print '<input type="hidden" name="name" value="'.$product_name.'">';
print '<input type="hidden" name="price" value="'.$product_price.'">';
print '<input type="hidden" name="gazou_name1" value="'.$product_gazou1['name'].'">';
print '<input type="hidden" name="gazou_name2" value="'.$product_gazou2['name'].'">';
print '<input type="hidden" name="gazou_name3" value="'.$product_gazou3['name'].'">';
print '<input type="hidden" name="gazou_name4" value="'.$product_gazou4['name'].'">';
print '<input type="hidden" name="gazou_name5" value="'.$product_gazou5['name'].'">';
print '<input type="hidden" name="gazou_name6" value="'.$product_gazou6['name'].'">';
print '<input type="hidden" name="gazou_name7" value="'.$product_gazou7['name'].'">';
print '<input type="hidden" name="gazou_name8" value="'.$product_gazou8['name'].'">';
print '<input type="hidden" name="size" value="'.$product_size.'">';
print '<input type="hidden" name="condition" value="'.$product_condition.'">';
print '<input type="hidden" name="detail" value="'.$product_detail.'">';
print '<input type="hidden" name="stock" value="'.$product_stock.'">';
print '<input type="hidden" name="category" value="'.$product_category.'">';
print '<input type="hidden" name="brand" value="'.$product_brand.'">';
print '<input type="button" onclick="history.back()" value="戻る">';
print '<input type="submit" value="OK">';
print '</form>';

?>
</body>
</html>