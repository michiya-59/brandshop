<!DOCTYPE html>
<html lang="ja">
<head>
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
session_start();
session_regenerate_id(true);

include('header.php');

// カートの中身を見る機能
try
{
if(isset($_SESSION['cart']) === true)
{
  $cart = $_SESSION['cart'];
  $max = count($cart); //カートの中身のカウント
}
else
{
  $max = 0;
}

if($max === 0)
{
  print '<i class="fas fa-shopping-cart my-5" style="color:dimgray"></i>';
  print '<p class="cartlook-p">カートに商品が入っておりません</p>';
  print '<a href="index.php" clss="cartlook-a">ショップに戻る</a>';
  exit();
}

$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$product_name = [];
$product_price = [];

foreach($cart as $key => $value)
{
  $sql = 'SELECT code,name,price,gazou FROM mst_product WHERE code=?';
  $stmt = $dbh->prepare($sql);
  $data[0] = $value;
  $stmt->execute($data);

  $rec = $stmt->fetch(PDO::FETCH_ASSOC);

  if($rec !== false)
  {
    $product_code[] = $rec['code'];
    $product_name[] = $rec['name'];
    $product_price[] = $rec['price'];
    
    if($rec['gazou'] ===  '')
    {
      $product_gazou[] = '';
    }
    else
    {
      $product_gazou[] = '<img src="/gazou/'.$rec['gazou'].'" class="gazou">';
    }
  }
}
$totalPay = 0;


$dbh = null;
}

catch(Exception $e)
{
  print 'ただいま障害が発生しております。ご迷惑をお掛けして大変申し訳ございません';
  exit();
}
?>

<!-- カートの中身を表示している -->
<main>
<a href="index.php" class="continue-buy"><p class="continue-p">買い物を続ける</p></a>
<p class="shopping-cart">ショッピングカート</p>
<p class="buy-product">購入する商品</p>
  <div class="cart">
    <form action="shop_delet.php" method="post">
      <div class="cart-product">
        <?php for($i = 0; $i < $max; $i++): ?>
          <div class="cart-product-part">
            <a href="shop_list.php"><?php print $product_gazou[$i];?></a>
            <div class="product-detail">
              <p class="product-name">
                <a href="<?php print 'shop_product.php?productcode='.$product_code[$i].'' ?>"><?php print $product_name[$i]; ?></a>
              </p>
              <p class="price">値段：￥<?php print $product_price[$i].'円'; ?></p>
              <input type="checkbox" name="sakujo<?php print $i; ?>">
              <input type="submit" value="削除" class="delet">
            </div>
          </div>
          <?php $totalPay = $totalPay + $product_price[$i] ?>
          <br>
          <br>
        <?php endfor ?>
      </div>
    <div class="totalpay">
      <div class="pay">
        <p class="pay-left">商品合計</p>
        <p class="pay-right">￥<?php print $totalPay; ?></p>
      </div>
      <div class="pay">
        <p class="pay-left">送料</p>
        <p class="pay-right">配送先によって異なります。</p>
      </div>
    </div>
    <div class="total">
      <h1 class="total-part">合計</h1>
      <h2 class="total-pay">￥<?php print $totalPay; ?></h2>
    </div>
    <input type="hidden" name="max" value="<?php print $max; ?>"> 
    </form>
    <br>
    <br><br>
    <?php 
      if(isset($_SESSION['member_login']) === true)
      {
        print '<p class="guest-buy"><a href="shop_kantan_check.php" class="guest-buy-a">会員かんたん注文へ進む</a></p><br><br>';
      }
      else
      {
        print '<p class="guest-buy"><a href="shop_form.php" class="guest-buy-a">ゲスト購入として購入</a></p>';
      }
    ?>
  </div>
</main>
<?php include('footer.php') ?>
</div>
</body>
</html>
