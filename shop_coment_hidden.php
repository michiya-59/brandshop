<?php 

session_start();
session_regenerate_id(true);

$coment = $_POST['coment'];
$pro_code = $_POST['pro_code'];
$pro_gazou_name = $_POST['pro_gazou_name'];
$pro_name = $_POST['pro_name'];
$member_name = $_POST['name'];


$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'INSERT INTO coment (pro_code,pro_coment,pro_name,member_name,pro_gazou) VALUES (?,?,?,?,?)'; 
$stmt = $dbh->prepare($sql);
$data[] = $pro_code;
$data[] = $coment;
$data[] = $pro_name;
$data[] = $member_name;
$data[] = $pro_gazou_name;
$stmt->execute($data);

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
    <?php include('header.php'); ?>
    <p class="coment-p">コメントしました</p>
    <a href="shop_coment_out.php?productcode=<?php print $pro_code ?>" style="font-weight:bold;">コメントを見る</a><br>
    <a href="shop_list.php" style="font-weight:bold;">ショップへ</a>
  </div>
</body>
</html>