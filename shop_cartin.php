<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="style1.css?v=2" type="text/css">
<link rel="stylesheet" href="style2.css?v=2" type="text/css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <?php 

  include('header.php');

  session_start();
  session_regenerate_id(true);
  
  try
  {
  $product_code = $_GET['productcode'];
  
  // カートの中身に同じ商品が入っていたら、入れさせない処理
  if(isset($_SESSION['cart']) === true)
  {
    $cart = $_SESSION['cart'];
    if(in_array($product_code,$cart) === true)
    {
      print '<i class="fas fa-shopping-cart my-5" style="color:dimgray"></i>';
      print '<p class="cartlook-p">既にこの商品はカートに入っています</p>';
      print '<a href="index.php" class="cartlook-a">ショップに戻る</a>';
      exit();
    }
  }
  
  // カートに商品を入れる
  $cart[] = $product_code;
  $_SESSION['cart'] = $cart;
  
  }
  
  catch(Exception $e)
  {
    print 'ただいま障害が発生しております。ご迷惑をお掛けして大変申し訳ございません';
    exit();
  }
  print '<i class="fas fa-shopping-cart my-5" style="color:dimgray"></i>';
  print '<p class="cartlook-p">カートに追加しました</p>';
  print '<a href="index.php" clss="cartlook-a">ショップに戻る</a>';

  ?>
</div>


</body>
</html>