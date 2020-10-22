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

$sql = 'SELECT * FROM mst_product WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $product_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$product_name = $rec['name'];
$product_price = $rec['price'];
$product_gazou_name_old = $rec['gazou'];
$product_gazou_name2_old = $rec['gazou2'];
$product_gazou_name3_old = $rec['gazou3'];
$product_gazou_name4_old = $rec['gazou4'];
$product_gazou_name5_old = $rec['gazou5'];
$product_gazou_name6_old = $rec['gazou6'];
$product_gazou_name7_old = $rec['gazou7'];
$product_gazou_name8_old = $rec['gazou8'];
$product_size = $rec['size'];
$product_condition = $rec['condetion'];
$product_detail = $rec['detail'];
$product_stock = $rec['stock'];
$product_category = $rec['category'];
$product_brand = $rec['brand'];

$dbh = null;

if($product_gazou_name_old === '')
{
  $disp_gazou = '';
}
else
{
  $disp_gazou = '<img src="./gazou/'.$product_gazou_name_old.'" style="width:200px">';
  $disp_gazou2 = '<img src="./gazou/'.$product_gazou_name2_old.'" style="width:200px">';
  $disp_gazou3 = '<img src="./gazou/'.$product_gazou_name3_old.'" style="width:200px">';
  $disp_gazou4 = '<img src="./gazou/'.$product_gazou_name4_old.'" style="width:200px">';
  $disp_gazou5 = '<img src="./gazou/'.$product_gazou_name5_old.'" style="width:200px">';
  $disp_gazou6 = '<img src="./gazou/'.$product_gazou_name6_old.'" style="width:200px">';
  $disp_gazou7 = '<img src="./gazou/'.$product_gazou_name7_old.'" style="width:200px">';
  $disp_gazou8 = '<img src="./gazou/'.$product_gazou_name8_old.'" style="width:200px">';
}

}

catch(Exception $e)
{
  print 'ただいま障害が発生しております。ご迷惑をお掛けして大変申し訳ございません';
  exit();
}


?>
  <!-- ここから商品コードごとの写真が何枚あり、その枚数を表示する -->
  <?php

  if($product_gazou_name4_old === $product_gazou_name4_old && $product_gazou_name5_old === '')
  {
    print '商品修正<br><br>';
    print '商品コード<br>';
    print $product_code; 
    print '<br><br>';
    print '<form action="product_edit.gazou4.php" method="post" enctype="multipart/form-data">';
    print '商品名<br>';
    print '<input type="text" name="name" style="width:200px" value="'.$product_name.'"><br>';
    print '価格<br>';
    print '<input type="text" name="price" style="width:50px" value="'.$product_price.'">円<br>';
    print '商品サイズ<br>';
    print '<input type="text" name="size" value="'.$product_size.'"><br>';
    print '商品状態<br>';
    print '<select name="condition">';
      print '<option value="N 新品" >N 新品</option>';
      print '<option value="S 未使用（展示品など）">S 未使用（展示品など）</option>';
      print '<option value="A 傷や汚れが無く状態の良い美品">A 傷や汚れが無く状態の良い美品</option>';
      print '<option value="B 程よい使用感や多少の傷、汚れはあるが良好の商品">B 程よい使用感や多少の傷、汚れはあるが良好の商品</option>';
      print '<option value="C 使用感の他、目立つ傷や汚れが見られる商品">C 使用感の他、目立つ傷や汚れが見られる商品</option>';
    print '</select><br>';
    print '商品説明<br>';
    print '<input type="textarea" name="detail" value="'.$product_detail.'"><br><br>';
    print $disp_gazou;
    print $disp_gazou2;
    print $disp_gazou3;
    print $disp_gazou4;
    print '<br><br>';
    print '個数<br>';
    print '<select name="stock">';
      print '<option value="0">0個</option>';
      print '<option value="1">1個</option>';
    print '</select><br>';
    print '画像は何枚に修正しますか？<br>';
    print '<input type="text" name="gazou" style="width:30px">枚<br>';
    print 'カテゴリーを選んでください<br>';
    print '<select name="category">';
      print '<option value="long_wallet" >長財布</option>';
      print '<option value="two_folded_wallet">二つ折り財布</option>';
      print '<option value="three_folded_wallet">三つ折り財布</option>';
      print '<option value="handbag">トートバック</option>';
      print '<option value="totebag">ハンドバッグ</option>';
    print '</select><br>';
    print '商品のブランドを選んでください<br>';
    print '<select name="brand" >';
      print '<option value="GUCCI" >GUCCI</option>';
      print '<option value="LOUISVUITTON">LOUIS VIUTTON</option>';
      print '<option value="LOEWE">LOEWE</option>';
      print '<option value="katespade">kate spade</option>';
    print '</select><br>';
    print '<input type="hidden" name="code" value="'.$product_code.'">';
    print '<input type="hidden" name="gazou_name_old" value="'.$product_gazou_name_old.'">';
    print '<input type="hidden" name="gazou_name_old2" value="'.$product_gazou_name2_old.'">';
    print '<input type="hidden" name="gazou_name_old3" value="'.$product_gazou_name3_old.'">';
    print '<input type="hidden" name="gazou_name_old4" value="'.$product_gazou_name4_old.'">';
    print '<input type="button" onclick="history.back()" value="戻る">' ;
    print '<input type="submit" value="OK">' ;
    print '</form>';
    exit();
  }

  if($product_gazou_name5_old === $product_gazou_name5_old && $product_gazou_name6_old === '')
  {
    print '商品修正<br><br>';
    print '商品コード<br>';
    print $product_code; 
    print '<br><br>';
    print '<form action="product_edit.gazou5.php" method="post" enctype="multipart/form-data">';
    print '商品名<br>';
    print '<input type="text" name="name" style="width:200px" value="'.$product_name.'"><br>';
    print '価格<br>';
    print '<input type="text" name="price" style="width:50px" value="'.$product_price.'">円<br>';
    print '商品サイズ<br>';
    print '<input type="text" name="size" value="'.$product_size.'"><br>';
    print '商品状態<br>';
    print '<select name="condition">';
      print '<option value="N 新品" >N 新品</option>';
      print '<option value="S 未使用（展示品など）">S 未使用（展示品など）</option>';
      print '<option value="A 傷や汚れが無く状態の良い美品">A 傷や汚れが無く状態の良い美品</option>';
      print '<option value="B 程よい使用感や多少の傷、汚れはあるが良好の商品">B 程よい使用感や多少の傷、汚れはあるが良好の商品</option>';
      print '<option value="C 使用感の他、目立つ傷や汚れが見られる商品">C 使用感の他、目立つ傷や汚れが見られる商品</option>';
    print '</select><br>';
    print '商品説明<br>';
    print '<input type="textarea" name="detail" value="'.$product_detail.'"><br><br>';
    print $disp_gazou;
    print $disp_gazou2;
    print $disp_gazou3;
    print $disp_gazou4;
    print $disp_gazou5;
    print '<br><br>';
    print '個数<br>';
    print '<select name="stock">';
      print '<option value="0">0個</option>';
      print '<option value="1">1個</option>';
    print '</select><br>';
    print '画像は何枚に修正しますか？<br>';
    print '<input type="text" name="gazou" style="width:30px">枚<br>';
    print 'カテゴリーを選んでください<br>';
    print '<select name="category">';
      print '<option value="long_wallet" >長財布</option>';
      print '<option value="two_folded_wallet">二つ折り財布</option>';
      print '<option value="three_folded_wallet">三つ折り財布</option>';
      print '<option value="handbag">トートバック</option>';
      print '<option value="totebag">ハンドバッグ</option>';
    print '</select><br>';
    print '商品のブランドを選んでください<br>';
    print '<select name="brand" >';
      print '<option value="GUCCI" >GUCCI</option>';
      print '<option value="LOUISVUITTON">LOUIS VIUTTON</option>';
      print '<option value="LOEWE">LOEWE</option>';
      print '<option value="katespade">kate spade</option>';
    print '</select><br>';
    print '<input type="hidden" name="code" value="'.$product_code.'">';
    print '<input type="hidden" name="gazou_name_old" value="'.$product_gazou_name_old.'">';
    print '<input type="hidden" name="gazou_name_old2" value="'.$product_gazou_name2_old.'">';
    print '<input type="hidden" name="gazou_name_old3" value="'.$product_gazou_name3_old.'">';
    print '<input type="hidden" name="gazou_name_old4" value="'.$product_gazou_name4_old.'">';
    print '<input type="hidden" name="gazou_name_old5" value="'.$product_gazou_name5_old.'">';
    print '<input type="button" onclick="history.back()" value="戻る">' ;
    print '<input type="submit" value="OK">' ;
    print '</form>';
    exit();
  }

  if($product_gazou_name6_old === $product_gazou_name6_old && $product_gazou_name7_old === '')
  {
    print '商品修正<br><br>';
    print '商品コード<br>';
    print $product_code; 
    print '<br><br>';
    print '<form action="product_edit.gazou6.php" method="post" enctype="multipart/form-data">';
    print '商品名<br>';
    print '<input type="text" name="name" style="width:200px" value="'.$product_name.'"><br>';
    print '価格<br>';
    print '<input type="text" name="price" style="width:50px" value="'.$product_price.'">円<br>';
    print '商品サイズ<br>';
    print '<input type="text" name="size" value="'.$product_size.'"><br>';
    print '商品状態<br>';
    print '<select name="condition">';
      print '<option value="N 新品" >N 新品</option>';
      print '<option value="S 未使用（展示品など）">S 未使用（展示品など）</option>';
      print '<option value="A 傷や汚れが無く状態の良い美品">A 傷や汚れが無く状態の良い美品</option>';
      print '<option value="B 程よい使用感や多少の傷、汚れはあるが良好の商品">B 程よい使用感や多少の傷、汚れはあるが良好の商品</option>';
      print '<option value="C 使用感の他、目立つ傷や汚れが見られる商品">C 使用感の他、目立つ傷や汚れが見られる商品</option>';
    print '</select><br>';
    print '商品説明<br>';
    print '<input type="textarea" name="detail" value="'.$product_detail.'"><br><br>';
    print $disp_gazou;
    print $disp_gazou2;
    print $disp_gazou3;
    print $disp_gazou4;
    print $disp_gazou5;
    print $disp_gazou6;
    print '<br><br>';
    print '個数<br>';
    print '<select name="stock">';
      print '<option value="0">0個</option>';
      print '<option value="1">1個</option>';
    print '</select><br>';
    print '画像は何枚に修正しますか？<br>';
    print '<input type="text" name="gazou" style="width:30px">枚<br>';
    print 'カテゴリーを選んでください<br>';
    print '<select name="category">';
      print '<option value="long_wallet" >長財布</option>';
      print '<option value="two_folded_wallet">二つ折り財布</option>';
      print '<option value="three_folded_wallet">三つ折り財布</option>';
      print '<option value="handbag">トートバック</option>';
      print '<option value="totebag">ハンドバッグ</option>';
    print '</select><br>';
    print '商品のブランドを選んでください<br>';
    print '<select name="brand" >';
      print '<option value="GUCCI" >GUCCI</option>';
      print '<option value="LOUISVUITTON">LOUIS VIUTTON</option>';
      print '<option value="LOEWE">LOEWE</option>';
      print '<option value="katespade">kate spade</option>';
    print '</select><br>';
    print '<input type="hidden" name="code" value="'.$product_code.'">';
    print '<input type="hidden" name="gazou_name_old" value="'.$product_gazou_name_old.'">';
    print '<input type="hidden" name="gazou_name_old2" value="'.$product_gazou_name2_old.'">';
    print '<input type="hidden" name="gazou_name_old3" value="'.$product_gazou_name3_old.'">';
    print '<input type="hidden" name="gazou_name_old4" value="'.$product_gazou_name4_old.'">';
    print '<input type="hidden" name="gazou_name_old5" value="'.$product_gazou_name5_old.'">';
    print '<input type="hidden" name="gazou_name_old6" value="'.$product_gazou_name6_old.'">';
    print '<input type="button" onclick="history.back()" value="戻る">' ;
    print '<input type="submit" value="OK">' ;
    print '</form>';
    exit();
  }

  if($product_gazou_name7_old === $product_gazou_name7_old && $product_gazou_name8_old === '')
  {
    print '商品修正<br><br>';
    print '商品コード<br>';
    print $product_code; 
    print '<br><br>';
    print '<form action="product_edit.gazou7.php" method="post" enctype="multipart/form-data">';
    print '商品名<br>';
    print '<input type="text" name="name" style="width:200px" value="'.$product_name.'"><br>';
    print '価格<br>';
    print '<input type="text" name="price" style="width:50px" value="'.$product_price.'">円<br>';
    print '商品サイズ<br>';
    print '<input type="text" name="size" value="'.$product_size.'"><br>';
    print '商品状態<br>';
    print '<select name="condition">';
      print '<option value="N 新品" >N 新品</option>';
      print '<option value="S 未使用（展示品など）">S 未使用（展示品など）</option>';
      print '<option value="A 傷や汚れが無く状態の良い美品">A 傷や汚れが無く状態の良い美品</option>';
      print '<option value="B 程よい使用感や多少の傷、汚れはあるが良好の商品">B 程よい使用感や多少の傷、汚れはあるが良好の商品</option>';
      print '<option value="C 使用感の他、目立つ傷や汚れが見られる商品">C 使用感の他、目立つ傷や汚れが見られる商品</option>';
    print '</select><br>';
    print '商品説明<br>';
    print '<input type="textarea" name="detail" value="'.$product_detail.'"><br><br>';
    print $disp_gazou;
    print $disp_gazou2;
    print $disp_gazou3;
    print $disp_gazou4;
    print $disp_gazou5;
    print $disp_gazou6;
    print $disp_gazou7;
    print '<br><br>';
    print '個数<br>';
    print '<select name="stock">';
      print '<option value="0">0個</option>';
      print '<option value="1">1個</option>';
    print '</select><br>';
    print '画像は何枚に修正しますか？<br>';
    print '<input type="text" name="gazou" style="width:30px">枚<br>';
    print 'カテゴリーを選んでください<br>';
    print '<select name="category">';
      print '<option value="long_wallet" >長財布</option>';
      print '<option value="two_folded_wallet">二つ折り財布</option>';
      print '<option value="three_folded_wallet">三つ折り財布</option>';
      print '<option value="handbag">トートバック</option>';
      print '<option value="totebag">ハンドバッグ</option>';
    print '</select><br>';
    print '商品のブランドを選んでください<br>';
    print '<select name="brand" >';
      print '<option value="GUCCI" >GUCCI</option>';
      print '<option value="LOUISVUITTON">LOUIS VIUTTON</option>';
      print '<option value="LOEWE">LOEWE</option>';
      print '<option value="katespade">kate spade</option>';
    print '</select><br>';
    print '<input type="hidden" name="code" value="'.$product_code.'">';
    print '<input type="hidden" name="gazou_name_old" value="'.$product_gazou_name_old.'">';
    print '<input type="hidden" name="gazou_name_old2" value="'.$product_gazou_name2_old.'">';
    print '<input type="hidden" name="gazou_name_old3" value="'.$product_gazou_name3_old.'">';
    print '<input type="hidden" name="gazou_name_old4" value="'.$product_gazou_name4_old.'">';
    print '<input type="hidden" name="gazou_name_old5" value="'.$product_gazou_name5_old.'">';
    print '<input type="hidden" name="gazou_name_old6" value="'.$product_gazou_name6_old.'">';
    print '<input type="hidden" name="gazou_name_old7" value="'.$product_gazou_name7_old.'">';
    print '<input type="button" onclick="history.back()" value="戻る">' ;
    print '<input type="submit" value="OK">' ;
    print '</form>';
    exit();
  }

  if($product_gazou_name8_old === $product_gazou_name8_old)
  {
    print '商品修正<br><br>';
    print '商品コード<br>';
    print $product_code; 
    print '<br><br>';
    print '<form action="product_edit.gazou8.php" method="post" enctype="multipart/form-data">';
    print '商品名<br>';
    print '<input type="text" name="name" style="width:200px" value="'.$product_name.'"><br>';
    print '価格<br>';
    print '<input type="text" name="price" style="width:50px" value="'.$product_price.'">円<br>';
    print '商品サイズ<br>';
    print '<input type="text" name="size" value="'.$product_size.'"><br>';
    print '商品状態<br>';
    print '<select name="condition">';
      print '<option value="N 新品" >N 新品</option>';
      print '<option value="S 未使用（展示品など）">S 未使用（展示品など）</option>';
      print '<option value="A 傷や汚れが無く状態の良い美品">A 傷や汚れが無く状態の良い美品</option>';
      print '<option value="B 程よい使用感や多少の傷、汚れはあるが良好の商品">B 程よい使用感や多少の傷、汚れはあるが良好の商品</option>';
      print '<option value="C 使用感の他、目立つ傷や汚れが見られる商品">C 使用感の他、目立つ傷や汚れが見られる商品</option>';
    print '</select><br>';
    print '商品説明<br>';
    print '<input type="textarea" name="detail" value="'.$product_detail.'"><br><br>';
    print $disp_gazou;
    print $disp_gazou2;
    print $disp_gazou3;
    print $disp_gazou4;
    print $disp_gazou5;
    print $disp_gazou6;
    print $disp_gazou7;
    print $disp_gazou8;
    print '<br><br>';
    print '個数<br>';
    print '<select name="stock">';
      print '<option value="0">0個</option>';
      print '<option value="1">1個</option>';
    print '</select><br>';
    print '画像は何枚に修正しますか？<br>';
    print '<input type="text" name="gazou" style="width:30px">枚<br>';
    print 'カテゴリーを選んでください<br>';
    print '<select name="category">';
      print '<option value="long_wallet" >長財布</option>';
      print '<option value="two_folded_wallet">二つ折り財布</option>';
      print '<option value="three_folded_wallet">三つ折り財布</option>';
      print '<option value="handbag">トートバック</option>';
      print '<option value="totebag">ハンドバッグ</option>';
    print '</select><br>';
    print '商品のブランドを選んでください<br>';
    print '<select name="brand" >';
      print '<option value="GUCCI" >GUCCI</option>';
      print '<option value="LOUISVUITTON">LOUIS VIUTTON</option>';
      print '<option value="LOEWE">LOEWE</option>';
      print '<option value="katespade">kate spade</option>';
    print '</select><br>';
    print '<input type="hidden" name="code" value="'.$product_code.'">';
    print '<input type="hidden" name="gazou_name_old" value="'.$product_gazou_name_old.'">';
    print '<input type="hidden" name="gazou_name_old2" value="'.$product_gazou_name2_old.'">';
    print '<input type="hidden" name="gazou_name_old3" value="'.$product_gazou_name3_old.'">';
    print '<input type="hidden" name="gazou_name_old4" value="'.$product_gazou_name4_old.'">';
    print '<input type="hidden" name="gazou_name_old5" value="'.$product_gazou_name5_old.'">';
    print '<input type="hidden" name="gazou_name_old6" value="'.$product_gazou_name6_old.'">';
    print '<input type="hidden" name="gazou_name_old7" value="'.$product_gazou_name7_old.'">';
    print '<input type="hidden" name="gazou_name_old8" value="'.$product_gazou_name8_old.'">';
    print '<input type="button" onclick="history.back()" value="戻る">' ;
    print '<input type="submit" value="OK">' ;
    print '</form>';
    exit();
  }
  
?>

