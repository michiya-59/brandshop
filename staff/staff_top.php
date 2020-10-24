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
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  ショップ管理トップメニュー<br><br>
  <a href="staff_list.php">スタッフ管理</a><br>
  <a href="../product/product_list.php">商品管理</a><br>
  <a href="../index.php">ショップへ</a><br>
  <a href="staff_logout.php">ログアウト</a><br>
</body>
</html>