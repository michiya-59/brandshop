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

<?php
session_start();
session_regenerate_id(true);

$product_code = $_GET['productcode'];

$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT name,gazou FROM mst_product WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $product_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);

$product_name = $rec['name'];
$product_gazou = $rec['gazou'];

print $disp_gazou = '<img src="./gazou/'.$rec['gazou'].'" class="product-img">';
print '<p class="product-name">'.$rec['name'].'</p>';
?>

<?php if(isset($_SESSION['member_login']) === true): ?>
<form action="shop_comentout.php" method="post">
  <p>質問内容を入力してください</p>
  <textarea name="text" cols="30" rows="10"></textarea>
  <input type="hidden" name="code" value="<?php print $product_code; ?>">
  <input type="submit" value="質問する">
</form>
<?php else: ?>
<form action="shop_comentout2.php" method="post">
  <p>名前を入力してください</p><br>
  <input type="text" name="name">
  <p>質問内容を入力してください</p>
  <textarea name="text" cols="30" rows="10"></textarea>
  <input type="hidden" name="code" value="<?php print $product_code; ?>">
  <input type="submit" value="質問する">
</form>
<?php endif ?>
</body>
</html>