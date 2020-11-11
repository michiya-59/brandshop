<?php 

session_start();
session_regenerate_id(true);


$pro_code = $_GET['productcode'];


$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT gazou,name,category,price FROM mst_product WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $pro_code;
$stmt->execute($data);

$product = $stmt->fetch(PDO::FETCH_ASSOC);

$pro_name = $product['name'];
$prodcut_gazou_name = $product['gazou'];
$pro_category = $product['category'];
$pro_price = $product['price'];

if($prodcut_gazou_name === ''){
  $dispgazou = ''; 
}
else{
  $dispgazou = '<img src="/gazou/'.$prodcut_gazou_name.'" class="content-img">';
}



$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT pro_coment,member_name,code,time FROM coment WHERE pro_code=?';
$stmt = $dbh->prepare($sql);
$data = array();
$data[] = $pro_code;
$stmt->execute($data);

for($i = 0; $i < 100; $i++){
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  
  if($rec === false){
  break;
  }
  else{
    $coment[] = $rec['pro_coment'];
    $name[] = $rec['member_name'];
    $code[] = $rec['code'];
    $time[] = $rec['time'];
  }
}

if(empty($coment)){
  $counts = 0;
}
else{
  $counts = count($coment);
}


?>
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
    <?php include('header.php'); ?>
    <h2 class="coment-main">Coment</h2>
    <div class="short-line"></div>
    <div class="content">
      <p class="coment-img-p"><?php print $dispgazou; ?></p>
      <div class="coment-pro-detail">
        <p class="coment-pro-p"><?php print $pro_name; ?></p>
        <p class="coment-pro-p">￥<?php print $pro_price; ?></p>
      </div >
    </div>
    <div class="coment"> 

      <?php 
      if($counts === 0)
      {
        print '<p class="not-coment">まだコメントされてません</p>';
      }
      else
      {
        for($i = 0; $i < $counts; $i++){
          if($counts > $counts)
          {
            break;
          }
          else
          {
            $_SESSION['counts'] = $counts;
            print '<div class="coment-item">';
              print '<p class="member-name">'.$name[$i].'</p>';
              print '<p class="member-coment">'.$coment[$i].'</p>';
              print '<div class="delet-btn">';
                print '<a href="shop_coment_delet.php?comentcode='.$code[$i].'&productcode='.$pro_code.'" class="coment-delet-a">削除</a>';

                $unix = strtotime($time[$i]);
                $now = time();
                $diff_sec = $now - $unix;
                if($diff_sec < 60){
                  $times = $diff_sec;
                  $unix = "秒前";
                  $data = floor($times);
                  print '<p class="time-p">'.$data.'秒前</p>';
                  
                }
                elseif($diff_sec < 3600){
                  $times = $diff_sec/60;
                  $unix = "分前";
                  $data = floor($times);
                  print '<p class="time-p">'.$data.'分前</p>';
                  
                }
                elseif($diff_sec < 86400){
                  $times = $diff_sec/3600;
                  $unix = "時間前";
                  $data = floor($times);
                  print '<p class="time-p">'.$data.'時間前</p>';
                  
                }
                elseif($diff_sec < 2764800){
                  $times = $diff_sec/86400;
                  $unix = "日前";
                  $data = floor($times);
                  print '<p class="time-p">'.$data.'日前</p>';  
                }
              print '</div>';
            print '</div>';
         
          }
        }
      }
      ?>
      
    </div>
    <div class="buttons">
      <a href="index.php"><p class="index-btn">ショップへ</p></a>
      <a href="shop_coment.php?productcode=<?php print $pro_code ?>"><p class="comentbtn">商品へ質問する</p></a>
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