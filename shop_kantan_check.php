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
    <?php include('header.php'); ?>
    <div class="check-form">
<?php  
session_start();
session_regenerate_id(true);

$code = $_SESSION['member_code'];

$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT name,mail,post1,post2,addres,tel FROM dat_member WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);

$dbh = null;

$name = $rec['name'];
$mail = $rec['mail'];
$post1 = $rec['post1'];
$post2 = $rec['post2'];
$addres = $rec['addres'];
$tel = $rec['tel'];

print 'お名前<br>';
print $name;
print '<br><br>';

print 'メールアドレス<br>';
print $mail;
print '<br><br>';

print '郵便番号<br>';
print $post1.'-'.$post2;
print '<br><br>';

print '住所<br>';
print $addres;
print '<br><br>';

print '電話番号<br>';
print $tel;
print '<br><br>';


print '<form action="shop_kantan_done.php" method="post">';
print '<input type="hidden" name="oname" value="'.$name.'">';
print '<input type="hidden" name="mail" value="'.$mail.'">';
print '<input type="hidden" name="post1" value="'.$post1.'">';
print '<input type="hidden" name="post2" value="'.$post2.'">';
print '<input type="hidden" name="addres" value="'.$addres.'">';
print '<input type="hidden" name="tel" value="'.$tel.'">';
print '<input type="button" onclick="history.back()" value="戻る" class="check-btn">';
print '<input type="submit" value="OK" class="check-btn"><br>';
print '</form>';
?>
</div>
<?php include('footer.php'); ?>
</div>

</body>
</html>