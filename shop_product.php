<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="style1.css?v=2" type="text/css">
<link rel="stylesheet" href="style2.css?v=2" type="text/css">
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/my_script.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
<div class="container">
<?php 
session_start();
session_regenerate_id(true);

include('header.php');

try
{
$product_code = $_GET['productcode'];

// 商品の守王歳画面を表示させる機能
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
$product_size = $rec['size'];
$product_condetion = $rec['condetion'];
$product_size = $rec['size'];
$product_detail = $rec['detail'];
$product_stock = $rec['stock'];
$product_gazou_name = $rec['gazou'];
$product_gazou_name2 = $rec['gazou2'];
$product_gazou_name3 = $rec['gazou3'];
$product_gazou_name4 = $rec['gazou4'];
$product_gazou_name5 = $rec['gazou5'];
$product_gazou_name6 = $rec['gazou6'];
$product_gazou_name7 = $rec['gazou7'];
$product_gazou_name8 = $rec['gazou8'];


$dgh = null;

if($product_gazou_name === '')
{
  $disp_gazou = '';
}
else 
{
  $disp_gazou = '<img src="/gazou/'.$product_gazou_name.'" style="width:100%">';
  $disp_gazou2 = '<img src="/gazou/'.$product_gazou_name2.'" style="width:100%" >';
  $disp_gazou3 = '<img src="/gazou/'.$product_gazou_name3.'" style="width:100%">';
  $disp_gazou4 = '<img src="/gazou/'.$product_gazou_name4.'"style="width:100%" >';
  $disp_gazou5 = '<img src="/gazou/'.$product_gazou_name5.'"style="width:100%" >';
  $disp_gazou6 = '<img src="/gazou/'.$product_gazou_name6.'" style="width:100%">';
  $disp_gazou7 = '<img src="/gazou/'.$product_gazou_name7.'" style="width:100%">';
  $disp_gazou8 = '<img src="/gazou/'.$product_gazou_name8.'" style="width:100%">';
}
}

catch(Exception $e)
{
  print 'ただいま障害が発生しております。ご迷惑をお掛けして大変申し訳ございません';
  exit();
}
?>

<!-- 画像が4枚時に4枚表示させる処理 -->
<?php if($product_gazou_name4 === $product_gazou_name4 && $product_gazou_name5 === ''): ?>
  <div id="slide_show" >
    <ul class="slide">
      <li><?php print $disp_gazou; ?></li>
      <li><?php print  $disp_gazou2; ?></li>
      <li><?php print $disp_gazou3; ?></li>
      <li><?php print  $disp_gazou4; ?></li>
    </ul>
    <div class="nav_btn">
      <i class="fa fa-chevron-left prev"></i> 
      <i class="fa fa-chevron-right next"></i> 
    </div>
  </div>
  <div class="product-detail-about">
    <p class="name-h1"><?php print  $product_name; ?></p>
    <p class="price">￥<?php print  $product_price; ?></p>
    <p class="product-detail-p"><?php print  $product_name; ?></p>
    <p class="product-detail-p">サイズ：<?php print  $product_size; ?></p>
    <p class="product-detail-p">状態：<?php print  $product_condetion; ?></p>  
    <p class="product-detail-p">商品説明：<?php print  $product_detail; ?></p>
  </div>  
  <a href="shop_coment_out.php?productcode=<?php print $product_code; ?>" class="product_coment"><p class="coment-question">商品へ質問</p></a>
  <?php if($product_stock === '1'): ?>
    <a href="shop_cartin.php?productcode=<?php print $product_code;?>" class="cart-a"><p class="product-cart-p">カートに入れる</p></a>
    <form>
    <input type="button" onclick="history.back()" value="戻る" class="product-detail-btn">
    </form>
  <?php else: ?>
    <form>
      <input type="button" onclick="history.back()" value="戻る" class="product-detail-btn">
    </form>
  <?php endif ?>
  <?php 
  print '<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="'.$product_name.'"  data-url="https://usersbrandshop.herokuapp.com/shop_product.php?productcode='.$product_code.' " data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>';

  print '<a href="http://www.facebook.com/share.php?u=https://usersbrandshop.herokuapp.com/shop_product.php?productcode='.$product_code.' " rel="nofollow" target="_blank" class="fa-icon"><i class="fab fa-facebook-square"></i>シェア</a>' ?>
  <?php include('footer.php');  
  exit(); ?>
<?php endif ?>

<!-- 画像が5枚時に5枚表示させる処理 -->
<?php if($product_gazou_name5 === $product_gazou_name5 && $product_gazou_name6 === ''): ?>
  <div class="product-detail-img">
    <p style="width:20%"><?php print $disp_gazou2; ?></p>
    <p style="width:20%"><?php print $disp_gazou3; ?></p>
    <p style="width:20%"><?php print $disp_gazou4; ?></p>
    <p style="width:20%"><?php print $disp_gazou5; ?></p>
  </div>
  <div class="product-detail-about">
    <p class="name-h1"><?php print $product_name; ?></p>
    <p class="price">￥<?php print $product_price; ?></p>
    <p class="product-detail-p"><?php print $product_name; ?></p>
    <p class="product-detail-p">サイズ：<?php print $product_size; ?></p>
    <p class="product-detail-p">状態：<?php print $product_condetion; ?></p>  
    <p class="product-detail-p">商品説明：<?php print $product_detail; ?></p>
  </div>  
  <?php if($product_stock === '1'): ?>
    <a href="shop_cartin.php?productcode='<?php print $product_code;?>'" class="cart-a"><p class="product-cart-p">カートに入れる</p></a>
    <form>
    <input type="button" onclick="history.back()" value="戻る" class="product-detail-btn">
    </form>
  <?php else: ?>
    <form>
      <input type="button" onclick="history.back()" value="戻る" class="product-detail-btn">
    </form>
  <?php endif ?>
  <?php 
  print '<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="'.$product_name.'"  data-url="https://usersbrandshop.herokuapp.com/shop_product.php?productcode='.$product_code.' " data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>';

  print '<a href="http://www.facebook.com/share.php?u=https://usersbrandshop.herokuapp.com/shop_product.php?productcode='.$product_code.' " rel="nofollow" target="_blank" class="fa-icon"><i class="fab fa-facebook-square"></i>シェア</a>'?>
  <?php include('footer.php'); 
  exit(); 
endif ?>

<!-- 画像が6枚時に6枚表示させる処理 -->
<?php if($product_gazou_name6 === $product_gazou_name6 && $product_gazou_name7 === ''):?>
  <div class="product-detail-img">
    <p style="width:20%"><?php print $disp_gazou2; ?></p>
    <p style="width:20%"><?php print $disp_gazou3; ?></p>
    <p style="width:20%"><?php print $disp_gazou4; ?></p>
    <p style="width:20%"><?php print $disp_gazou5; ?></p>
    <p style="width:20%"><?php print $disp_gazou6; ?></p>
  </div>
  <div class="product-detail-about">
    <p class="name-h1"><?php print $product_name; ?></p>
    <p class="price">￥<?php print $product_price; ?></p>
    <p class="product-detail-p"><?php print $product_name; ?></p>
    <p class="product-detail-p">サイズ：<?php print $product_size; ?></p>
    <p class="product-detail-p">状態：<?php print $product_condetion; ?></p>  
    <p class="product-detail-p">商品説明：<?php print $product_detail; ?></p>
  </div>  
  <?php if($product_stock === '1'): ?>
    <a href="shop_cartin.php?productcode=<?php print $product_code;?>" class="cart-a"><p class="product-cart-p">カートに入れる</p></a>
    <form>
    <input type="button" onclick="history.back()" value="戻る" class="product-detail-btn">
    </form>
  <?php else: ?>
    <form>
      <input type="button" onclick="history.back()" value="戻る" class="product-detail-btn">
    </form>
  <?php endif ?>
  <?php 
  print '<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="'.$product_name.'"  data-url="https://usersbrandshop.herokuapp.com/shop_product.php?productcode='.$product_code.' " data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>';

  print '<a href="http://www.facebook.com/share.php?u=https://usersbrandshop.herokuapp.com/shop_product.php?productcode='.$product_code.' " rel="nofollow" target="_blank" class="fa-icon"><i class="fab fa-facebook-square"></i>シェア</a>'?>
  <?php include('footer.php'); 
  exit(); 
endif ?>

<!-- 画像が7枚時に7枚表示させる処理 -->
<?php if($product_gazou_name7 === $product_gazou_name7 && $product_gazou_name8 === ''): ?>
  <p style="width:100%"><?php print $disp_gazou; ?></p>
  <div class="product-detail-img">
    <p style="width:20%"><?php print $disp_gazou2; ?></p>
    <p style="width:20%"><?php print $disp_gazou3; ?></p>
    <p style="width:20%"><?php print $disp_gazou4; ?></p>
    <p style="width:20%"><?php print $disp_gazou5; ?></p>
    <p style="width:20%"><?php print $disp_gazou6; ?></p>
    <p style="width:20%"><?php print $disp_gazou7; ?></p>
  </div>
  <div class="product-detail-about">
    <p class="name-h1"><?php print $product_name; ?></p>
    <p class="price">￥<?php print $product_price; ?></p>
    <p class="product-detail-p"><?php print $product_name; ?></p>
    <p class="product-detail-p">サイズ：<?php print $product_size; ?></p>
    <p class="product-detail-p">状態：<?php print $product_condetion; ?></p>  
    <p class="product-detail-p">商品説明：<?php print $product_detail; ?></p>
  </div>  
  <?php if($product_stock === '1'): ?>
    <a href="shop_cartin.php?productcode=<?php print $product_code;?>" class="cart-a"><p class="product-cart-p">カートに入れる</p></a>
    <form>
    <input type="button" onclick="history.back()" value="戻る" class="product-detail-btn">
    </form>
  <?php else: ?>
    <form>
      <input type="button" onclick="history.back()" value="戻る" class="product-detail-btn">
    </form>
  <?php endif ?>
  <?php 
  print '<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="'.$product_name.'"  data-url="https://usersbrandshop.herokuapp.com/shop_product.php?productcode='.$product_code.' " data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>';

  print '<a href="http://www.facebook.com/share.php?u=https://usersbrandshop.herokuapp.com/shop_product.php?productcode='.$product_code.' " rel="nofollow" target="_blank" class="fa-icon"><i class="fab fa-facebook-square"></i>シェア</a>'?>
  <?php include('footer.php'); 
  exit(); 
endif ?>

<!-- 画像が8枚時に8枚表示させる処理 -->
<?php if($product_gazou_name8 === $product_gazou_name8): ?>
  <p style="width:100%"><?php print $disp_gazou; ?></p>
  <div class="product-detail-img">
    <p style="width:20%"><?php print $disp_gazou2; ?></p>
    <p style="width:20%"><?php print $disp_gazou3; ?></p>
    <p style="width:20%"><?php print $disp_gazou4; ?></p>
    <p style="width:20%"><?php print $disp_gazou5; ?></p>
    <p style="width:20%"><?php print $disp_gazou6; ?></p>
    <p style="width:20%"><?php print $disp_gazou7; ?></p>
    <p style="width:20%"><?php print $disp_gazou8; ?></p>
  </div>
  <div class="product-detail-about">
    <p class="name-h1"><?php print $product_name; ?></p>
    <p class="price">￥<?php print $product_price; ?></p>
    <p class="product-detail-p"><?php print $product_name; ?></p>
    <p class="product-detail-p">サイズ：<?php print $product_size; ?></p>
    <p class="product-detail-p">状態：<?php print $product_condetion; ?></p>  
    <p class="product-detail-p">商品説明：<?php print $product_detail; ?></p>
  </div>  
  <?php if($product_stock === '1'): ?>
    <a href="shop_cartin.php?productcode=<?php print $product_code;?>" class="cart-a"><p class="product-cart-p">カートに入れる</p></a>
    <form>
    <input type="button" onclick="history.back()" value="戻る" class="product-detail-btn">
    </form>
  <?php else: ?>
    <form>
      <input type="button" onclick="history.back()" value="戻る" class="product-detail-btn">
    </form>
  <?php endif ?>
  <?php 
  print '<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="'.$product_name.'"  data-url="https://usersbrandshop.herokuapp.com/shop_product.php?productcode='.$product_code.' " data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>';

  print '<a href="http://www.facebook.com/share.php?u=https://usersbrandshop.herokuapp.com/shop_product.php?productcode='.$product_code.' " rel="nofollow" target="_blank" class="fa-icon"><i class="fab fa-facebook-square"></i>シェア</a>'?>
  <?php include('footer.php'); 
  exit(); 
endif ?>
</div>
</body>
</html>