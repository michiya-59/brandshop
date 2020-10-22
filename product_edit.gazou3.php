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
$product_gazou = $_POST['gazou'];
$product_stock = $_POST['stock'];
$product_gazou_name_old = $_POST['gazou_name_old'];
$product_gazou_name_old2 = $_POST['gazou_name_old2'];
$product_gazou_name_old3 = $_POST['gazou_name_old3'];

if($product_gazou_name_old === '')
{
  $disp_gazou = '';
}
else
{
  $disp_gazou = '<img src="/gazou/'.$product_gazou_name_old.'" style="width:200px">';
  $disp_gazou2 = '<img src="/gazou/'.$product_gazou_name_old2.'" style="width:200px">';
  $disp_gazou3 = '<img src="/gazou/'.$product_gazou_name_old3.'" style="width:200px">';
}

print '商品修正<br><br>';

print '商品コード<br>';
print $product_code;
print '<br><br>';

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

print $disp_gazou;
print $disp_gazou2;
print $disp_gazou3;
print '<br><br>';


if($product_name === '' || preg_match('/\A[0-9]+\z/',$product_price) === 0)
{
  print '<form>';
  print '<input type="button" onclick="history.back()" value="戻る">';
  print '</form>';
}
else
{
  
  switch($product_gazou)
  {
    case '1':
      print '<form action="product_edit.check.php" method="post" enctype="multipart/form-data">';
      print '<input type="file" name="gazou" style="width:400px"><br><br>';
      print '<input type="hidden" name="code" value="'.$product_code.'">';
      print '<input type="hidden" name="name" value="'.$product_name.'">';
      print '<input type="hidden" name="price" value="'.$product_price.'">';
      print '<input type="hidden" name="size" value="'.$product_size.'">';
      print '<input type="hidden" name="condition" value="'.$product_condition.'">';
      print '<input type="hidden" name="detail" value="'.$product_detail.'">';
      print '<input type="hidden" name="stock" value="'.$product_stock.'">';
      print '<input type="hidden" name="gazou_name_old1" value="'.$product_gazou_name_old.'">';
      print '<input type="hidden" name="gazou_name_old2" value="'.$product_gazou_name_old2.'">';
      print '<input type="hidden" name="gazou_name_old3" value="'.$product_gazou_name_old3.'">';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '<input type="submit" value="OK">';
      print '</form>';
      break;
  
    case '2':
      print '<form action="product_edit.check2.php" method="post" enctype="multipart/form-data">';
      print '<input type="file" name="gazou" style="width:400px"><br>';
      print '<input type="file" name="gazou2" style="width:400px"><br><br>';
      print '<input type="hidden" name="code" value="'.$product_code.'">';
      print '<input type="hidden" name="name" value="'.$product_name.'">';
      print '<input type="hidden" name="price" value="'.$product_price.'">';
      print '<input type="hidden" name="size" value="'.$product_size.'">';
      print '<input type="hidden" name="condition" value="'.$product_condition.'">';
      print '<input type="hidden" name="detail" value="'.$product_detail.'">';;
      print '<input type="hidden" name="stock" value="'.$product_stock.'">';;
      print '<input type="hidden" name="gazou_name_old1" value="'.$product_gazou_name_old.'">';
      print '<input type="hidden" name="gazou_name_old2" value="'.$product_gazou_name_old2.'">';
      print '<input type="hidden" name="gazou_name_old3" value="'.$product_gazou_name_old3.'">';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '<input type="submit" value="OK">';
      print '</form>';
      break;
  
    case '3':
      print '<form action="product_edit.check3.php" method="post" enctype="multipart/form-data">';
      print '<input type="file" name="gazou1" style="width:400px"><br>';
      print '<input type="file" name="gazou2" style="width:400px"><br>';
      print '<input type="file" name="gazou3" style="width:400px"><br><br>';
      print '<input type="hidden" name="code" value="'.$product_code.'">';
      print '<input type="hidden" name="name" value="'.$product_name.'">';
      print '<input type="hidden" name="price" value="'.$product_price.'">';
      print '<input type="hidden" name="size" value="'.$product_size.'">';
      print '<input type="hidden" name="condition" value="'.$product_condition.'">';
      print '<input type="hidden" name="detail" value="'.$product_detail.'">';
      print '<input type="hidden" name="stock" value="'.$product_stock.'">';
      print '<input type="hidden" name="gazou_name_old1" value="'.$product_gazou_name_old.'">';
      print '<input type="hidden" name="gazou_name_old2" value="'.$product_gazou_name_old2.'">';
      print '<input type="hidden" name="gazou_name_old3" value="'.$product_gazou_name_old3.'">';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '<input type="submit" value="OK">';
      print '</form>';
      break;
  
    case '4':
      print '<form action="product_edit.check4.php" method="post" enctype="multipart/form-data">';
      print '<input type="file" name="gazou1" style="width:400px"><br>';
      print '<input type="file" name="gazou2" style="width:400px"><br>';
      print '<input type="file" name="gazou3" style="width:400px"><br>';
      print '<input type="file" name="gazou4" style="width:400px"><br><br>';
      print '<input type="hidden" name="code" value="'.$product_code.'">';
      print '<input type="hidden" name="name" value="'.$product_name.'">';
      print '<input type="hidden" name="price" value="'.$product_price.'">';
      print '<input type="hidden" name="size" value="'.$product_size.'">';
      print '<input type="hidden" name="condition" value="'.$product_condition.'">';
      print '<input type="hidden" name="detail" value="'.$product_detail.'">';
      print '<input type="hidden" name="stock" value="'.$product_stock.'">';
      print '<input type="hidden" name="gazou_name_old1" value="'.$product_gazou_name_old.'">';
      print '<input type="hidden" name="gazou_name_old2" value="'.$product_gazou_name_old2.'">';
      print '<input type="hidden" name="gazou_name_old3" value="'.$product_gazou_name_old3.'">';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '<input type="submit" value="OK">';
      print '</form>';
      break;
  
    case '5':
      print '<form action="product_edit.check5.php" method="post" enctype="multipart/form-data">';
      print '<input type="file" name="gazou1" style="width:400px"><br>';
      print '<input type="file" name="gazou2" style="width:400px"><br>';
      print '<input type="file" name="gazou3" style="width:400px"><br>';
      print '<input type="file" name="gazou4" style="width:400px"><br>';
      print '<input type="file" name="gazou5" style="width:400px"><br><br>';
      print '<input type="hidden" name="code" value="'.$product_code.'">';
      print '<input type="hidden" name="name" value="'.$product_name.'">';
      print '<input type="hidden" name="price" value="'.$product_price.'">';
      print '<input type="hidden" name="size" value="'.$product_size.'">';
      print '<input type="hidden" name="condition" value="'.$product_condition.'">';
      print '<input type="hidden" name="detail" value="'.$product_detail.'">';
      print '<input type="hidden" name="stock" value="'.$product_stock.'">';
      print '<input type="hidden" name="gazou_name_old1" value="'.$product_gazou_name_old.'">';
      print '<input type="hidden" name="gazou_name_old2" value="'.$product_gazou_name_old2.'">';
      print '<input type="hidden" name="gazou_name_old3" value="'.$product_gazou_name_old3.'">';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '<input type="submit" value="OK">';
      print '</form>';
      break;
  
    case '6':
      print '<form action="product_edit.check6.php" method="post" enctype="multipart/form-data">';
      print '<input type="file" name="gazou1" style="width:400px"><br>';
      print '<input type="file" name="gazou2" style="width:400px"><br>';
      print '<input type="file" name="gazou3" style="width:400px"><br>';
      print '<input type="file" name="gazou4" style="width:400px"><br>';
      print '<input type="file" name="gazou5" style="width:400px"><br>';
      print '<input type="file" name="gazou6" style="width:400px"><br><br>';
      print '<input type="hidden" name="code" value="'.$product_code.'">';
      print '<input type="hidden" name="name" value="'.$product_name.'">';
      print '<input type="hidden" name="price" value="'.$product_price.'">';
      print '<input type="hidden" name="size" value="'.$product_size.'">';
      print '<input type="hidden" name="condition" value="'.$product_condition.'">';
      print '<input type="hidden" name="detail" value="'.$product_detail.'">';
      print '<input type="hidden" name="stock" value="'.$product_stock.'">';
      print '<input type="hidden" name="gazou_name_old1" value="'.$product_gazou_name_old.'">';
      print '<input type="hidden" name="gazou_name_old2" value="'.$product_gazou_name_old2.'">';
      print '<input type="hidden" name="gazou_name_old3" value="'.$product_gazou_name_old3.'">';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '<input type="submit" value="OK">';
      print '</form>';
      break;
  
    case '7':
      print '<form action="product_edit.check7.php" method="post" enctype="multipart/form-data">';
      print '<input type="file" name="gazou1" style="width:400px"><br>';
      print '<input type="file" name="gazou2" style="width:400px"><br>';
      print '<input type="file" name="gazou3" style="width:400px"><br>';
      print '<input type="file" name="gazou4" style="width:400px"><br>';
      print '<input type="file" name="gazou5" style="width:400px"><br>';
      print '<input type="file" name="gazou6" style="width:400px"><br>';
      print '<input type="file" name="gazou7" style="width:400px"><br><br>';
      print '<input type="hidden" name="code" value="'.$product_code.'">';
      print '<input type="hidden" name="name" value="'.$product_name.'">';
      print '<input type="hidden" name="price" value="'.$product_price.'">';
      print '<input type="hidden" name="size" value="'.$product_size.'">';
      print '<input type="hidden" name="condition" value="'.$product_condition.'">';
      print '<input type="hidden" name="detail" value="'.$product_detail.'">';
      print '<input type="hidden" name="stock" value="'.$product_stock.'">';
      print '<input type="hidden" name="gazou_name_old1" value="'.$product_gazou_name_old.'">';
      print '<input type="hidden" name="gazou_name_old2" value="'.$product_gazou_name_old2.'">';
      print '<input type="hidden" name="gazou_name_old3" value="'.$product_gazou_name_old3.'">';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '<input type="submit" value="OK">';
      print '</form>';
      break;
  
    case '8':
      print '<form action="product_edit.check8.php" method="post" enctype="multipart/form-data">';
      print '<input type="file" name="gazou1" style="width:400px"><br>';
      print '<input type="file" name="gazou2" style="width:400px"><br>';
      print '<input type="file" name="gazou3" style="width:400px"><br>';
      print '<input type="file" name="gazou4" style="width:400px"><br>';
      print '<input type="file" name="gazou5" style="width:400px"><br>';
      print '<input type="file" name="gazou6" style="width:400px"><br>';
      print '<input type="file" name="gazou7" style="width:400px"><br>';
      print '<input type="file" name="gazou8" style="width:400px"><br><br>';
      print '<input type="hidden" name="code" value="'.$product_code.'">';
      print '<input type="hidden" name="name" value="'.$product_name.'">';
      print '<input type="hidden" name="price" value="'.$product_price.'">';
      print '<input type="hidden" name="size" value="'.$product_size.'">';
      print '<input type="hidden" name="condition" value="'.$product_condition.'">';
      print '<input type="hidden" name="detail" value="'.$product_detail.'">';
      print '<input type="hidden" name="stock" value="'.$product_stock.'">';
      print '<input type="hidden" name="gazou_name_old1" value="'.$product_gazou_name_old.'">';
      print '<input type="hidden" name="gazou_name_old2" value="'.$product_gazou_name_old2.'">';
      print '<input type="hidden" name="gazou_name_old3" value="'.$product_gazou_name_old3.'">';
      print '<input type="button" onclick="history.back()" value="戻る">';
      print '<input type="submit" value="OK">';
      print '</form>';
      break;
  
    default:
      print '修正できる枚数は8枚までです';
  }
}


?>