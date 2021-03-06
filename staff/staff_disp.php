<?php 

session_start();
session_regenerate_id(true);
if(isset($_SESSION['login']) === false)
{
  print 'ログインされていません'.'<br>';
  print '<a href="staff_login.php">ログイン画面へ</a>';
  exit();
}
else
{
  print $_SESSION['staff_name'];
  print 'さんログイン中'.'<br>'.'<br>';
}
// スタッフ参照画面の処理

try
{
$staff_code = $_GET['staffcode'];//staff_branch.phpからURLパラメータによってスタッフコードGETで受け取る

$dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
$user = 'bc9681657abe67'; 
$password = '8f2c9d49';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT name FROM mst_staff WHERE code = ?;';
$stmt = $dbh->prepare($sql);
$data[] = $staff_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$staff_name = $rec['name'];

$dbh = null;

}

catch(Exception $e)
{
  print 'ただいま障害により大変ご迷惑お掛けしております。';
  exit();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  スタッフ情報参照
  <br>
  <br>
  スタッフコード
  <?php print $staff_code; ?>
  <br>
  スタッフ名<br>
  <?php print $staff_name; ?>
  <br>
  <form>
    <input type="button" onclick="history.back()" value="戻る">
  </form>

</body>
</html>