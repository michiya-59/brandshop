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
<header>
  <div id="header">
    <div id="nav-drawer" class="header-left my-3">
      <input id="nav-input" type="checkbox" class="nav-unshown">
      <label id="nav-open" for="nav-input"><i class="fa fa-align-justify"></i> </label>
      <label class="nav-unshown" id="nav-close" for="nav-input"></label>
      <div id="nav-content">
        <div class="nav-content">
          <a href="index.php" class="nav-a"><p class="nav-contents">HOME</p></a>
          <a href="shop_about.php" class="nav-a"><p class="nav-contents">ABOUT</p></a>
          <a href="shop_contact.php" class="nav-a"><p class="nav-contents">CONTACT</p></a>
          <a href="member_login.php" class="nav-a"><p class="nav-contents">LOGIN</p></a>
          <a href="staff_login.php" class="nav-a"><p class="nav-contents">STAFF</p></a>
        </div>
        <a href="shop_cartlook.php"><i class="fas fa-shopping-cart mr-3" style="color:gray;"></i></a>
      </div>
    </div>

    <div class="header-right">
    <?php if(isset($_SESSION['member_login']) === true): ?>
        <a href="member_logout.php"><i class="fa fa-user mr-3 mt-3"></i></a>
        <?php else: ?>
          <a href="member_login.php"><i class="fa fa-user mr-3 mt-3"></i></a>
      <?php endif ?>
      <a href="shop_cartlook.php"><i class="fas fa-shopping-cart mr-3"></i></a>
    </div>
  </div>
  <h1 class="title"><a href="index.php" class="home">BEST BRAND</a></h1>
</header>
  <div class="form-done">
<?php  
session_start();
session_regenerate_id(true);

// 商品ご購入完了画面
$name = $_POST['name'];
$mail = $_POST['mail'];
$post1 = $_POST['post1'];
$post2 = $_POST['post2'];
$addres = $_POST['addres'];
$tel = $_POST['tel'];
$chumon = $_POST['chumon'];
$pass1 = $_POST['pass1'];
$danjo = $_POST['danjo'];
$barth = $_POST['barth'];

$date = new DateTime('now');
$appdate = $date->format('Y年m月d日');
$appdate2 = $date->format('Y年m月d日 H時i分s秒');

$name = htmlspecialchars($name,ENT_QUOTES,'UTF-8');
$mail = htmlspecialchars($mail,ENT_QUOTES,'UTF-8');
$post1 = htmlspecialchars($post1,ENT_QUOTES,'UTF-8');
$post2 = htmlspecialchars($post2,ENT_QUOTES,'UTF-8');
$addres = htmlspecialchars($addres,ENT_QUOTES,'UTF-8');
$tel = htmlspecialchars($tel,ENT_QUOTES,'UTF-8');
$chumon = htmlspecialchars($chumon,ENT_QUOTES,'UTF-8');
$pass1 = htmlspecialchars($pass1,ENT_QUOTES,'UTF-8');
$danjo = htmlspecialchars($danjo,ENT_QUOTES,'UTF-8');
$barth = htmlspecialchars($barth,ENT_QUOTES,'UTF-8');

print $name.'様<br>';
print 'ご購入ありがとうございました<br>';
print '購入の完了メールを'.$mail.'に送りました。<br><br>';
if($chumon === 'chumontouroku')
{
  print '会員登録が完了致しました<br>';
  print '次回からメールアドレスとパスワードでログインしてください<br>';
  print 'ご注文が簡単にできるようになります<br>';
  print '<br>';
}

print '<form action="shop_product_detail.php" method="post">';
print '<input type="submit" value="注文詳細はこちら" class="done-submit">';
print '<input type="hidden" name="date" value="'.$appdate2.'">';
print '</form>';
print '</div>';

$honbun = '';
$honbun .= $name."様\n\nこの度はご注文していただきありがとうございました。\n";
$honbun .= "\n";
$honbun .= "ご注文商品\n";
$honbun .= "------------------------------------------\n";

$cart = $_SESSION['cart'];
$max = count($cart);



$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$product_name = [];
$product_price = [];

// ご購入していただいた商品を表示する処理
for($i = 0; $i < $max; $i++)
{
  foreach($cart as $key => $value)  //forexchで商品情報をデーターベースから取ってくる処理
  {
    $sql = 'SELECT code,name,price,gazou FROM mst_product WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[0] = $value;
    $stmt->execute($data);
  
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  
    if($rec !== false)
    {
      $product_code[] = $rec['code'];
      $product_price[] = $rec['price'];
      $product_name[] = $rec['name'];
    }
    
    if($rec['gazou'] ===  '')
    {
      $disp_gazou[] = '';
    }
    else
    {
      $disp_gazou[] = '<img src="/gazou/'.$rec['gazou'].'" class="finish-gazou">';
    } 
  }
  
}


print '<h1 class="buy-product">ご購入されたされた商品</h1>';

// データーベースからとってきた情報をfor文で回して表示
print '<div class="buy-finish">';
for($i = 0; $i < $max; $i++)
{
  print '<div class="buy-finish-img">';
  print '<p>'.$disp_gazou[$i].'</p>';
    print '<div class="finish-product-part">';
      print '<p class="finish-product-about">'.$product_name[$i].'</p>';
      print '<p class="finish-product-about">ご購入金額￥ ：'.$product_price[$i].'</p>';
      print '<p class="finish-product-about">注文日 ：'.$appdate.'</p>';
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
print '<form action="shop_product_detail.php" method="post">';
print '<input type="submit" value="注文詳細はこちら" class="order-detail">';
print '<input type="hidden" name="date" value="'.$appdate2.'">';
print '<input type="hidden" name="name" value="'.$name.'">';
print '</form>';


// ご購入時に自動メールで送るための情報をデーターべ―スからとってきている
$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
for($i = 0; $i < $max; $i++)
{
  $sql = 'SELECT name,price FROM mst_product WHERE code=?';
  $stmt = $dbh->prepare($sql);
  $data = array();
  $data[0] = $cart[$i];
  $stmt->execute($data);
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  $product_name = $rec['name'];
  $price = $rec['price'];
  $kakaku[] = $price;
  $honbun .= $product_name.'';
  $honbun .= $price.'円'."\n";
}

$honbun .= '合計金額'.'';
$honbun .= $totalPay."円\n";

$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'LOCK TABLES dat_sales WRITE,dat_sales_product WRITE,dat_member WRITE';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

// ご購入時に会員登録を同時に行う時にお客様情報をデーターベースに入れる
$lastmembercode = 0;
if($chumon === 'chumontouroku')
{
  $sql = 'INSERT INTO dat_member (password,name,mail,post1,post2,addres,tel,danjo,birth) VALUES (?,?,?,?,?,?,?,?,?)';
  $stmt = $dbh->prepare($sql);
  $data = array();
  $data[] = md5($pass1);
  $data[] = $name;
  $data[] = $mail;
  $data[] = $post1; 
  $data[] = $post2;
  $data[] = $addres;
  $data[] = $tel;
  if($danjo === 'dan')
  {
    $data[] = 1;
  }
  else
  {
    $data[] = 2;
  }
  $data[] = $barth;
  $stmt->execute($data);

  $dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
  $user = 'bc9681657abe67'; 
  $password = '8f2c9d49';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $sql = 'SELECT LAST_INSERT_ID()';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  $lastmembercode = $rec['LAST_INSERT_ID()']; 
}

$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'INSERT INTO dat_sales (code_member,data,name,mail,post1,post2,addres,tel) VALUES (?,?,?,?,?,?,?,?)';
$stmt = $dbh->prepare($sql);
$data = array();
$data[] = $lastmembercode;
$data[] = $appdate2;
$data[] = $name;
$data[] = $mail;
$data[] = $post1;
$data[] = $post2;
$data[] = $addres;
$data[] = $tel;
$stmt->execute($data);


$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

for($i = 0; $i < $max; $i++){
  $sql = 'INSERT INTO dat_sales_product (code_product,price) VALUES (?,?)';
  $stmt = $dbh->prepare($sql);
  $data = array();
  $data[] = $cart[$i];
  $data[] = $kakaku[$i];
  $stmt->execute($data);
}

// 購入時したら、商品をSOLD OUTにするための機能
$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

for($i = 0; $i < $max; $i++)
{
  $sql = 'UPDATE mst_product SET stock=0 WHERE code=? ';
  $stmt = $dbh->prepare($sql);
  $data = array();
  $data[0] = $cart[$i];
  $stmt->execute($data);
}
 
$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql = 'UNLOCK TABLES';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$dbh = null;

// 自動メール文の本文
$honbun .= "送料は無料です\n";
$honbun .= "------------------------------------------\n";
$honbun .= "\n";
$honbun .= "代金は以下の講座にお振込みください。\n";
$honbun .= "三菱UFJ銀行 橋本支店 普通講座 0927971\n";
$honbun .= "入金が確認取れ次第、梱包、発送させていただきます。\n";
$honbun .= "\n";
if($chumon === 'chumontouroku')
{
  $honbun .= "会員登録が完了致しました\n";
  $honbun .= "次回からメールアドレスとパスワードでログインしてください\n";
  $honbun .= "ご注文が関東にできるようになります\n";
  $honbun .= "\n";
}
$honbun .= "□□□□□□□□□□□□□□□□□□□□□□□\n";
$honbun .= " BEST BRAND\n";
$honbun .= "電話番号 090-8367-5290\n";
$honbun .= "メール brandshop.contact@gmail.com\n";
$honbun .= "□□□□□□□□□□□□□□□□□□□□□□□\n";

require 'vendor/autoload.php';
$email = new \SendGrid\Mail\Mail();
$email->setFrom("brandshop.contact@gmail.com");
$email->setSubject("ご注文ありがとうございます");
$email->addTo($mail);
$email->addContent("text/plain", $honbun);
$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}

require 'vendor/autoload.php';
$email = new \SendGrid\Mail\Mail();
$email->setFrom('brandshop.contact@gmail.com');
$email->setSubject("ご注文がありました");
$email->addTo("brandshop.contact@gmail.com");
$email->addContent("text/plain", $honbun);
$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}


?>
<form action="shop_form_delet.php">
  <input type="submit" value="商品画面へ" class="delet-home"> 
</form>

<p class="p3">Best Brand</p>
<p class="footer-p">© BESTBRAND All right reserved</p>
</div>
</body>
</html>