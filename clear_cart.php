<?php 
session_start();
$_SESSION = array();
if($_COOKIE[session_name()] === true)
{
  setcookie(session_name(),'',time() - 42000, '/');
}
session_destroy();
?>

<!-- カートの中身を削除する機能 -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css?v=2" type="text/css">
</head>
<body>
  カートを空にしました<br>
</body>
</html>