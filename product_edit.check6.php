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

$product_code = $_POST['code'];
$product_name = $_POST['name'];
$product_price = $_POST['price'];
$product_size = $_POST['size'];
$product_condition = $_POST['condition'];
$product_detail = $_POST['detail'];
$product_stock = $_POST['stock'];
$product_category = $_POST['category'];
$product_brand = $_POST['brand'];
$product_gazou_name_old = $_POST['gazou_name_old1'];
$product_gazou_name_old2 = $_POST['gazou_name_old2'];
$product_gazou_name_old3 = $_POST['gazou_name_old3'];
$product_gazou_name_old4 = $_POST['gazou_name_old4'];
$product_gazou_name_old5 = $_POST['gazou_name_old5'];
$product_gazou_name_old6 = $_POST['gazou_name_old6'];
$product_gazou = $_FILES['gazou1'];
$product_gazou2 = $_FILES['gazou2'];
$product_gazou3 = $_FILES['gazou3'];
$product_gazou4 = $_FILES['gazou4'];
$product_gazou5 = $_FILES['gazou5'];
$product_gazou6 = $_FILES['gazou6'];

$product_code = htmlspecialchars($product_code,ENT_QUOTES,'UTF-8');
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

print '商品説明<br>';
print $product_detail;
print '<br><br>';

print '個数<br>';
print $product_stock;
print '<br><br>';

print 'カテゴリー<br>';
print $product_category;
print '<br><br>';

print 'ブランド<br>';
print $product_brand;
print '<br><br>';

if($product_gazou['size'] > 0)
{
  move_uploaded_file($product_gazou['tmp_name'],'./gazou/'.$product_gazou['name']);
  print '<img src="./gazou/'.$product_gazou['name'].'" style="width:200px">';
  print '<br>';
  move_uploaded_file($product_gazou2['tmp_name'],'./gazou/'.$product_gazou2['name']);
  print '<img src="./gazou/'.$product_gazou2['name'].'" style="width:200px">';
  print '<br>';
  move_uploaded_file($product_gazou3['tmp_name'],'./gazou/'.$product_gazou3['name']);
  print '<img src="./gazou/'.$product_gazou3['name'].'" style="width:200px">';
  print '<br>';
  move_uploaded_file($product_gazou4['tmp_name'],'./gazou/'.$product_gazou4['name']);
  print '<img src="./gazou/'.$product_gazou4['name'].'" style="width:200px">';
  print '<br>';
  move_uploaded_file($product_gazou5['tmp_name'],'./gazou/'.$product_gazou5['name']);
  print '<img src="./gazou/'.$product_gazou5['name'].'" style="width:200px">';
  print '<br>';
  move_uploaded_file($product_gazou6['tmp_name'],'./gazou/'.$product_gazou6['name']);
  print '<img src="./gazou/'.$product_gazou6['name'].'" style="width:200px">';
  print '<br>';
  
}

if($product_name === '' || preg_match('/\A[0-9]+\z/',$product_price) === 0)
{
  print '<form>';
  print '<input type="button" onclick="history.back()" value="戻る">';
  print '</form>';
}
else
{
  print '上記のように変更しますか？';
  print '<form action="product_edit_done6.php" method="post">';
  print '<input type="hidden" name="code" value="'.$product_code.'">';
  print '<input type="hidden" name="name" value="'.$product_name.'">';
  print '<input type="hidden" name="price" value="'.$product_price.'">';
  print '<input type="hidden" name="size" value="'.$product_size.'">';
  print '<input type="hidden" name="condition" value="'.$product_condition.'">';
  print '<input type="hidden" name="detail" value="'.$product_detail.'">';
  print '<input type="hidden" name="stock" value="'.$product_stock.'">';
  print '<input type="hidden" name="category" value="'.$product_category.'">';
  print '<input type="hidden" name="brand" value="'.$product_brand.'">';
  print '<input type="hidden" name="gazou_name_old" value="'.$product_gazou_name_old.'">';
  print '<input type="hidden" name="gazou_name_old2" value="'.$product_gazou_name_old2.'">';
  print '<input type="hidden" name="gazou_name_old3" value="'.$product_gazou_name_old3.'">';
  print '<input type="hidden" name="gazou_name_old4" value="'.$product_gazou_name_old4.'">';
  print '<input type="hidden" name="gazou_name_old5" value="'.$product_gazou_name_old5.'">';
  print '<input type="hidden" name="gazou_name_old6" value="'.$product_gazou_name_old6.'">';
  print '<input type="hidden" name="gazou_name" value="'.$product_gazou['name'].'">';
  print '<input type="hidden" name="gazou_name2" value="'.$product_gazou2['name'].'">';
  print '<input type="hidden" name="gazou_name3" value="'.$product_gazou3['name'].'">';
  print '<input type="hidden" name="gazou_name4" value="'.$product_gazou4['name'].'">';
  print '<input type="hidden" name="gazou_name5" value="'.$product_gazou5['name'].'">';
  print '<input type="hidden" name="gazou_name6" value="'.$product_gazou6['name'].'">';
  print '<input type="button" onclick="history.back()" value="戻る">';
  print '<input type="submit" value="OK">';
  print '</form>';
}
?>