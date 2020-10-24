<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="style1.css?v=2" type="text/css">
<link rel="stylesheet" href="style2.css?v=2" type="text/css">
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/my_script.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>

<!-- 最初に出てくるトップページ -->

<body>
  <div class="container">
  <?php include('header.php'); ?>
  <div class="header-under">
  <p class="p1">全ての商品が1点限りでございます♪</p>
  <p class="p2">気になる商品のご購入はお早めに♪</p>
  <p class="p3">Best Product</p>
  <div class="short-line"></div>
  </div>
  
<?php 
session_start();
session_regenerate_id(true);

try
{
$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT code,name,price,gazou,stock FROM mst_product WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();


$dbh = null;

// 商品、写真や名前等をデーターベースから読み込みforeach で表示している

print '<main>';
print '<div class=product-list>';
for($i = 0; $i < 100; $i++)
{ 
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);

  if($rec !== false)
  {
    $stock[] = $rec['stock'];
  }

  if($rec === false)  
  {
    break;
  }
  else
  {
    print '<div class="product-list-part">';
    
    print '<a href="shop_product.php?productcode='.$rec['code'].'">';
    print $disp_gazou = '<img src="./gazou/'.$rec['gazou'].'" class="product-img">';
    print '</a>';
    
    print '<p class="product-name">'.$rec['name'].'</p>';
    print '<p class="product-price">￥'.$rec['price'].'</p>';
  

    if($stock[$i] === '0')
    {
      print '<p class="product-stock">SOLD OUT</p>'; 
    }
    
    print '</div>';
    print '<br>';
    print '<br>';
  }
}
print '</div>';
print '</mian>';


}
catch(Exception $e)
{
  print 'ただいま障害が発生しております。ご迷惑をおかけして大変申し訳ございません';
}
?>
<div class="page-top">
	<img src="images/page_top.gif" alt="ページトップボタン" class="page-top2">
</div>
<?php include('footer.php') ?>
</div>

</body>
</html>