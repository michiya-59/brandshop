<?php 
// ログアウトさせるための処理
session_start();
$_SESSION = array();
if($_COOKIE[session_name()] === true)
{
  setcookie(session_name(),'',time() - 42000, '/');
}
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  ログアウトしました<br>
  <br>
  <a href="staff_login.php">ログイン画面へ</a>
</body>
</html>