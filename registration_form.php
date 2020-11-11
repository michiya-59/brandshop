<?php
session_start();
 
header("Content-type: text/html; charset=utf-8");
 
//クロスサイトリクエストフォージェリ（CSRF）対策
$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
$token = $_SESSION['token'];
 
//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

$errors = array();

if(empty($_GET)) {
	header("Location: registration_mail_form.php");
	exit();
}
else
{
	//GETデータを変数に入れる
  $urltoken = $_GET['urltoken'];
  $name = $_GET['name'];
  
	//メール入力判定
  if ($urltoken == '')
  {
		$errors['urltoken'] = "もう一度登録をやりなおして下さい。";
  }
  else
  {
		try{
      $dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
      $user = 'bc9681657abe67'; 
      $password = '8f2c9d49';
      $dbh = new PDO($dsn,$user,$password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      $sql = 'SELECT mail,name FROM pre_member WHERE urltoken=? AND flag=0 ';
      $stmt = $dbh->prepare($sql);
      $data[] = $urltoken;
      $stmt->execute($data);

      $row_count = $stmt->rowCount();
			
			//24時間以内に仮登録され、本登録されていないトークンの場合
			if( $row_count === 1){
				$rec = $stmt->fetch();
        $mail = $rec['mail'];
        $name = $rec['name'];
        $_SESSION['mail'] = $mail;
			}else{
				$errors['urltoken_timeover'] = "このURLはご利用できません。有効期限が過ぎた等の問題があります。もう一度登録をやりなおして下さい。";
			}
			
			//データベース接続切断
			$dbh = null;
			
		}catch (PDOException $e){
			print('Error:'.$e->getMessage());
			die();
		}
  }  
}  
 
 
?>
 
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
  <link rel="stylesheet" href="style1.css?v=2" type="text/css">
  <link rel="stylesheet" href="style2.css?v=2" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
<div class="container">
<h1 class="title">BEST BRAND</h1>
<h3 class="member-entry">会員登録</h3>
<form action="registration_check.php" method="post" class="shop-form">
    <div class="form-part">
      <p class="form-p">メールアドレス</p>
      <p><?php print $mail; ?></p><br>
    </div>
    <div class="form-part">
      <p class="form-p">お名前</p>
      <p><?php print $name; ?></p><br>
    </div>
    <div class="form-part">
      <p class="form-p">郵便番号</p>
      <input type="text" name="post1" style="width:50px" class="form-input"> -
      <input type="text" name="post2" style="width:80px" class="form-input"><br>
    </div>
    <div class="form-part">
      <p class="form-p">住所</p>
      <input type="text" name="addres" class="form-input"><br>
    </div>
    <div class="form-part">
      <p class="form-p">電話番号</p>
      <input type="text" name="tel" style="width:150px" class="form-input"><br><br>
    </div>
    <p class="form-p">パスワードを入力してください</p>
    <input type="password" name="pass1" style="width:100px" class="form-input"><br>
    <p class="form-p">パスワードをもう一度入力してください</p>
    <input type="password" name="pass2" style="width:100px" class="form-input"><br>
    <p class="form-p">性別</p>
    <input type="radio" name="danjo" value="dan" checked>男性<br>
    <input type="radio" name="danjo" value="jo">女性<br>
    <p class="form-p">生まれ年</p>
    <select name="barth">
      <option value="1910">1910年代</option>
      <option value="1920">1920年代</option>
      <option value="1930">1930年代</option>
      <option value="1940">1940年代</option>
      <option value="1950">1950年代</option>
      <option value="1960">1960年代</option>
      <option value="1970">1970年代</option>
      <option value="1980">1980年代</option>
      <option value="1990">1990年代</option>
      <option value="2000">2000年代</option>
      <option value="2010">2010年代</option>
    </select><br>
    <input type="hidden" name="token" value="<?php print $token; ?>">
    <input type="hidden" name="mail" value="<?php print $mail; ?>">
    <input type="hidden" name="name" value="<?php print $name; ?>">
    <input type="button" onclick="history.back()" value="戻る" class="btns">
    <input type="submit" value="OK" class="btns">
</form> 
</div>
</body>
</html>