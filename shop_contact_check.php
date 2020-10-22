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

$name = $_POST['name'];
$tel = $_POST['tel'];
$mail = $_POST['mail'];
$subject = $_POST['subject'];
$contents = $_POST['contents'];

$name = htmlspecialchars($name,ENT_QUOTES,'UTF-8');
$tel = htmlspecialchars($tel,ENT_QUOTES,'UTF-8');
$mail = htmlspecialchars($mail,ENT_QUOTES,'UTF-8');
$subject = htmlspecialchars($subject,ENT_QUOTES,'UTF-8');
$contents = htmlspecialchars($contents,ENT_QUOTES,'UTF-8');

if($name === '')
{
  print '<p class="check-p">名前が入力されてません</p>';
}
else
{
  print '<p class="check-p">お名前</p>';
  print '<p class="check-p">'.$name.'</p>';
  print '<br><br>';
}

if(preg_match('/\A\d{2,5}-?\d{2,5}-?\d{4,5}\z/',$tel) === 0)
{
  print '<p class="check-p">電話番号を正確に入力してください</p>';
}
else
{
  print '<p class="check-p">電話番号</p>';
  print '<p class="check-p">'.$tel.'</p>';
  print '<br><br>';
}

if(preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/',$mail) === 0)
{
  print '<p class="check-p">メールアドレスを正確に入力してください</p>';
}
else
{
  print '<p class="check-p">メールアドレス</p>';
  print '<p class="check-p">'.$mail.'</p>';
  print '<br><br>';
}

if($subject === '')
{
  print '<p class="check-p">件名を入力してください</p>';
}
else
{
  print '<p class="check-p">件名</p>';
  print '<p class="check-p">'.$subject.'</p>';
  print '<br><br>';
}

if($contents === '')
{
  print '<p class="check-p">お問い合わせ内容を入力してください</p>';
}
else
{
  print '<p class="check-p">お問い合わせ内容</p>';
  print '<p class="check-p">'.$contents.'</p>';
  print '<br><br>';
}


if($name === '' || preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/',$mail) === 0 || preg_match('/\A\d{2,5}-?\d{2,5}-?\d{4,5}\z/',$tel) === 0 || $subject === '' || $contents === '')
{
  print '<form>';
  print '<input type="button" onclick="history.back()" value="戻る" class="check-btn">';
  print '</form>';
}
else
{
print '<form action="shop_contact_done.php" method="post">';
print '<input type="hidden" name="name" value="'.$name.'">';
print '<input type="hidden" name="tel" value="'.$tel.'">';
print '<input type="hidden" name="mail" value="'.$mail.'">';
print '<input type="hidden" name="subject" value="'.$subject.'">';
print '<input type="hidden" name="contents" value="'.$contents.'">';
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