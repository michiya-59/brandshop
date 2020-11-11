<?php 

session_start();
session_regenerate_id(true);

$product_code = $_GET['productcode'];


$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT gazou,name,category,price FROM mst_product WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $product_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);

$product_name = $rec['name'];
$prodcut_gazou_name = $rec['gazou'];
$pro_category = $rec['category'];
$product_price = $rec['price'];

if($prodcut_gazou_name === ''){
  $dispgazou = ''; 
}
else{
  $dispgazou = '<img src="/gazou/'.$prodcut_gazou_name.'" class="content-img">';
}

if(isset($_SESSION['member_login']) === true){
  $member_name = $_SESSION['member_name'];
  $_SESSION['member_name'] = $member_name;
}
else{
  $member_name = 'ゲスト' ;
}


?>
<!DOCTYPE html>
<html lang="en">
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
<?php include('header.php') ?>
<div class="content">
      <p ><?php print $dispgazou; ?></p>
      <div class="coment-pro-detail">
        <p class="coment-pro-p"><?php print $product_name; ?></p>
        <p class="coment-pro-p">￥<?php print $product_price; ?></p>
      </div >
    </div>
  <div class="coment">
    <p class="coment-p">コメントする</p>
    <form action="shop_coment_hidden.php" method="post">
      <input type="text" name="coment" class="coment-output">
      <input type="hidden" name="pro_code" value="<?php print $product_code ?>">
      <input type="hidden" name="pro_gazou_name" value="<?php print $prodcut_gazou_name ?>">
      <input type="hidden" name="pro_name" value="<?php print $product_name ?>">
      <input type="hidden" name="name" value="<?php print $member_name ?>">
      <input type="submit" value="送信" class="coment-value">
    </form>
  </div>
  <h2 class="related-name">Related Items</h2>
  <div class="short-line"></div>
  <?php 
  $dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
  $user = 'bc9681657abe67'; 
  $password = '8f2c9d49';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   
  $sql = 'SELECT name,gazou,price,code FROM mst_product';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();

  print '<div class="related-item">';
  for($i = 0; $i < 100; $i ++){
    $relate_item = $stmt->fetch(PDO::FETCH_ASSOC);

    if($relate_item === false){
      break;
    }
    else{
      $item[] = $relate_item;
    }
  }

  shuffle($item);

  $gazou = array_column($item,'gazou');
  $name = array_column($item,'name');
  $price = array_column($item,'price');
  $code = array_column($item,'code');

  for($i = 0; $i < 3; $i++){
  
    $rela_gazou = '<img src="/gazou/'.$gazou[$i].'" class="content-image">';

      print '<div class="related-item-part">';
        print '<a href="shop_product.php?productcode='.$code[$i].'"><p>'.$rela_gazou.'</p></a>';
        print '<p>'.$name[$i].'</p>';
        print '<p>'.$price[$i].'円</p>';
      print '</div>';
    }
  print '</div>';
  
  include('footer.php')
  ?>
  </div>
</body>
</html>