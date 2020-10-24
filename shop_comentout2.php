<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="style1.css?v=2" type="text/css">
<link rel="stylesheet" href="style2.css?v=2" type="text/css">
</head>
<body>

<?php

$coment_name = $_POST['name'];
$coment_text = $_POST['text'];
$product_code = $_POST['code'];

// $dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
// $user = 'bc9681657abe67'; 
// $password = '8f2c9d49';
// $dbh = new PDO($dsn,$user,$password);
// $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

// $sql = 'SELECT code,name FROM dat_member WHERE  1';
// $stmt = $dbh->prepare($sql);
// $stmt->execute();

// for($i = 0; $i < 200; $i++)
// { 
//   $rec = $stmt->fetch(PDO::FETCH_ASSOC);

//   if($rec === false)  
//   {
//     break;
//   }
//   else
//   {
//     $member_code = $rec['code'];
//     $name = $rec['name'];
//   }
// }

$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'INSERT INTO dat_coment (pro_code,text,name) VALUES (?,?,?)';
$stmt = $dbh->prepare($sql);
$data[] = $product_code;
$data[] = $coment_text;
$data[] = $coment_name;
$stmt->execute($data);
?>
<form action="shop_post.php" method="post">
  <input type="hidden" name="name" value="<?php print $coment_name; ?>">
  <input type="hidden" name="pro_code" value="<?php print $product_code; ?>">
  <input type="submit" value="コメントを見る">
</form>
</body>
</html>
