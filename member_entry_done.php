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
<?php include('header.php') ?>
  <div class="form-done">
<?php  
session_start();
session_regenerate_id(true);

$name = $_POST['name'];
$mail = $_POST['mail'];
$post1 = $_POST['post1'];
$post2 = $_POST['post2'];
$addres = $_POST['addres'];
$tel = $_POST['tel'];
$pass1 = $_POST['pass1'];
$danjo = $_POST['danjo'];
$barth = $_POST['barth'];

$name = htmlspecialchars($name,ENT_QUOTES,'UTF-8');
$mail = htmlspecialchars($mail,ENT_QUOTES,'UTF-8');
$post1 = htmlspecialchars($post1,ENT_QUOTES,'UTF-8');
$post2 = htmlspecialchars($post2,ENT_QUOTES,'UTF-8');
$addres = htmlspecialchars($addres,ENT_QUOTES,'UTF-8');
$tel = htmlspecialchars($tel,ENT_QUOTES,'UTF-8');
$pass1 = htmlspecialchars($pass1,ENT_QUOTES,'UTF-8');
$danjo = htmlspecialchars($danjo,ENT_QUOTES,'UTF-8');
$barth = htmlspecialchars($barth,ENT_QUOTES,'UTF-8');

print '<p class="form-p">'.$name.'様</p>';
print '<p class="form-p">会員登録が完了致しました</p>';

$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'LOCK TABLES dat_member WRITE';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$sql = 'INSERT INTO dat_member (password,name,mail,post1,post2,addres,tel,danjo,birth) VALUES (?,?,?,?,?,?,?,?,?)';
$stmt = $dbh->prepare($sql);
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

$sql = 'UNLOCK TABLES';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$dbh = null;


?>
<form action="shop_list.php">
  <input type="submit" value="商品画面へ" class="shop-home"> 
  <input type="hidden" name="mail" value="<?php print $mail ?>">
  <input type="hidden" name="pass1" value="<?php print $pass1 ?>">
</form>

  </div>
  <?php include('footer.php'); ?>
</div>
</body>
</html>