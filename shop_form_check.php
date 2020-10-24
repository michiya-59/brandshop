<!DOCTYPE html>
<html lang="ja">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
  <link rel="stylesheet" href="style1.css?v=2" type="text/css">
  <link rel="stylesheet" href="style2.css?v=2" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
  <?php include('header.php'); ?>
  <div class="container">
  <div class="check-form">
<?php  

// ご購入していただくお客様情報の確認画面
$name = $_POST['name'];
$mail = $_POST['mail'];
$post1 = $_POST['post1'];
$post2 = $_POST['post2'];
$addres = $_POST['addres'];
$tel = $_POST['tel'];
$chumon = $_POST['chumon'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$danjo = $_POST['danjo'];
$barth = $_POST['barth'];

$name = htmlspecialchars($name,ENT_QUOTES,'UTF-8');
$mail = htmlspecialchars($mail,ENT_QUOTES,'UTF-8');
$post1 = htmlspecialchars($post1,ENT_QUOTES,'UTF-8');
$post2 = htmlspecialchars($post2,ENT_QUOTES,'UTF-8');
$addres = htmlspecialchars($addres,ENT_QUOTES,'UTF-8');
$tel = htmlspecialchars($tel,ENT_QUOTES,'UTF-8');
$chumon = htmlspecialchars($chumon,ENT_QUOTES,'UTF-8');
$pass1 = htmlspecialchars($pass1,ENT_QUOTES,'UTF-8');
$pass2 = htmlspecialchars($pass2,ENT_QUOTES,'UTF-8');
$danjo = htmlspecialchars($danjo,ENT_QUOTES,'UTF-8');
$barth = htmlspecialchars($barth,ENT_QUOTES,'UTF-8');



if($name === '')
{
  print '<p class="check-p">名前が入力されてません</p><br>';
}
else
{
  print '<p class="check-p">お名前</p>';
  print '<p class="check-p">'.$name.'</p>';
  print '<br>';
}

if(preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/',$mail) === 0)
{
  print '<p class="check-p">メールアドレスを正確に入力してください</p><br>';
}
else
{
  print '<p class="check-p">メールアドレス</p>';
  print '<p class="check-p">'.$mail.'</p>';
  print '<br>';
}

if(preg_match('/\A[0-9]+\z/',$post1) === 0 || preg_match('/\A[0-9]+\z/',$post2) === 0)
{
  print '<p class="check-p">郵便番号は半角数字で入力してください</p><br>';
}
else
{
  print '<p class="check-p">郵便番号</p>';
  print '<p class="check-p">'.$post1.'-'.$post2.'</p>';
  print '<br>';
}

if($addres === '')
{
  print '住所が入力されてません<br>';
}
else
{
  print '<p class="check-p">住所</p>';
  print '<p class="check-p">'.$addres.'</p>';
  print '<br>';
}

if(preg_match('/\A\d{2,5}-?\d{2,5}-?\d{4,5}\z/',$tel) === 0)
{
  print '電話番号を正確に入力してください<br>';
}
else
{
  print '<p class="check-p">電話番号</p>';
  print '<p class="check-p">'.$tel.'</p>';
  print '<br>';
}

if($chumon === 'chumontouroku')
{
  if($pass1 === '')
  {
    print '<p class="check-p">パスワードを入力してください</p>';
    print '<br>';
  }
  if($pass1 !== $pass2 )
  {
    print '<p class="check-p">パスワードが一致していません</p>';
    print '<br>';
  }

  print '<p class="check-p">性別</p>';
  if($danjo === 'dan')
  {
    print '<p class="check-p">男性</p>';
    print '<br>';
  }
  else
  {
    print '<p class="check-p">女性</p>';
    print '<br>';
  }

  print '<p class="check-p">生まれ年</p>';
  print '<p class="check-p">'.$barth;
  print '年</p>';
  print '<br>';
}

if($name === '' || preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/',$mail) === 0 || preg_match('/\A[0-9]+\z/',$post1) === 0 || preg_match('/\A[0-9]+\z/',$post2) === 0 || $addres === '' || preg_match('/\A\d{2,5}-?\d{2,5}-?\d{4,5}\z/',$tel) === 0)
{
  print '<form>';
  print '<input type="button" onclick="history.back()" value="戻る">';
  print '</form>';
}
else
{
  // 注文を完了させるために必要な情報をhiddenで渡す処理
print '<form action="shop_form_done.php" method="post">';
print '<input type="hidden" name="name" value="'.$name.'">';
print '<input type="hidden" name="mail" value="'.$mail.'">';
print '<input type="hidden" name="post1" value="'.$post1.'">';
print '<input type="hidden" name="post2" value="'.$post2.'">';
print '<input type="hidden" name="addres" value="'.$addres.'">';
print '<input type="hidden" name="tel" value="'.$tel.'">';
print '<input type="hidden" name="chumon" value="'.$chumon.'">';
print '<input type="hidden" name="pass1" value="'.$pass1.'">';
print '<input type="hidden" name="danjo" value="'.$danjo.'">';
print '<input type="hidden" name="barth" value="'.$barth.'">';
print '<input type="button" onclick="history.back()" value="戻る" class="check-btn">';
print '<input type="submit" value="OK" class="check-btn"><br>';
print '</form>';
}
?>
</div>
<?php include('footer.php') ?>
</div>

</body>
</html>