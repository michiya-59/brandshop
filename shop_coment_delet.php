<?php 
session_start();
session_regenerate_id(true);

$coment_code = $_GET['comentcode'];
$pro_code = $_GET['productcode'];

$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'DELETE FROM coment WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $coment_code;
$stmt->execute($data);

header('Location:shop_coment_out.php?productcode='.$pro_code.'');
?>
