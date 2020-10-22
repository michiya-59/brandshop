<!DOCTYPE html>
<html lang="en">
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
  <h1 class="title mt-5">BEST BRAND</h1>
  <h2 class="order-detail-title">注文詳細</h2>
  <?php  
  session_start();
  session_regenerate_id(true);

  $appdate = $_POST['date'];
  $name = $_POST['name'];

  $cart = $_SESSION['cart'];
  $max = count($cart);
  
  $dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
  $user = 'bc9681657abe67'; 
  $password = '8f2c9d49';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $product_name = [];
  $product_price = [];

  for($i = 0; $i < $max; $i++)
  {
    foreach($cart as $key => $value)
    {
      $sql = 'SELECT code,name,price,gazou FROM mst_product WHERE code=?';
      $stmt = $dbh->prepare($sql);
      $data[0] = $value;
      $stmt->execute($data);

      $rec = $stmt->fetch(PDO::FETCH_ASSOC);

      $product_code[] = $rec['code'];
      $product_name[] = $rec['name'];
      $product_price[] = $rec['price'];
      
      if($rec['gazou'] ===  '')
      {
        $disp_gazou[] = '';
      }
      else
      {
        $disp_gazou[] = '<img src="./gazou/'.$rec['gazou'].'" class="finish-gazou">';
      } 
    }
  }
  $dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
  $user = 'bc9681657abe67'; 
  $password = '8f2c9d49';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $sql = 'SELECT code,mail,post1,post2,addres,tel FROM dat_sales WHERE name=?';
  $stmt = $dbh->prepare($sql);
  $data = array();
  $data[] = $name;
  $stmt->execute($data);

  $rec = $stmt->fetch(PDO::FETCH_ASSOC);

  $code_sales = $rec['code'];
  $mail = $rec['mail'];
  $post1 = $rec['post1'];
  $post2 = $rec['post2'];
  $addres = $rec['addres'];
  $tel = $rec['tel'];

  print '<div class="detail">';
    print '<div class="orders-detail">';
    print '<p class="detail-p-left">注文番号</p>';
    print '<p class="detail-p">：'.$code_sales.'</p>';
    print '</div>';

    print '<div class="orders-detail">';
    print '<p class="detail-p-left">注文日時</p>';
    print '<p class="detail-p">：'.$appdate.'</p>';
    print '</div>';

    print '<div class="orders-detail">';
    print '<p class="detail-p-left">お届け先</p>';
      print '<div class="order-addres">';
        print '<p class="detail-p">：'.$post1.'-'.$post2.'</p>';
        print '<p class="detail-p"><span style="opacity:0">：</span>'.$addres.'</p>';
      print '</div>';
    print '</div>';

    print '<div class="orders-detail">';
    print '<p class="detail-p-left">電話番号</p>';
    print '<p class="detail-p">：'.$tel.'</p>';
    print '</div>';
  print '</div>';

  print '<div class="buy-finish">';
  for($i = 0; $i < $max; $i++)
  {
  print '<div class="buy-finish-img">';
  print '<p>'.$disp_gazou[$i].'</p>';
    print '<div class="finish-product-part">';
      print '<p class="finish-product-about">'.$product_name[$i].'</p>';
      print '<p class="finish-product-about">ご購入金額￥ ：'.$product_price[$i].'</p>';
    print '</div>';
  print '</div>';
  }
  print '</div>';

  $totalPay = 0;
  for($i = 0; $i < $max; $i++)
  {
    $totalPay = $totalPay + $product_price[$i];
  }
  print '<div class="finish-pay">';
  print '<p class="finish-money">支払い金額</p>';
  print '<p class="finish-money2">：￥'.$totalPay.'</p>';
  print '</div>';
  ?>

  <form action="shop_form_delet.php">
    <input type="submit" value="商品画面へ" class="delet-home"> 
  </form>
  <p class="p3">Best Brand</p>
  <p class="footer-p">© BESTBRAND All right reserved</p>
  </div>
</body>
</html>