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
    <?php include('header.php'); 
    $date = new DateTime('now');
    $appdate = $date->format('Y年m月d日');
    ?>
    
    <p class="contact-title">CONTACT</p>
    <div class="short-line"></div>

    <p class="contact">お問い合わせ内容をご入力ください。</p>

    <form action="shop_contact_check.php" method="post">
      <p class="contact-part">お名前(必須)</p>
      <input type="text"  name="name" class="contact-input">
      <p class="contact-part">電話番号(必須)</p>
      <input type="text"  name="tel" class="contact-input">
      <p class="contact-part">メールアドレス(<span class="contact-part" style="color:red">Gmailのみ</span>)</p>
      <input type="text"  name="mail" class="contact-input">
      <p class="contact-part">件名(必須)</p>
      <input type="text"  name="subject" class="contact-input">
      <p class="contact-part">お問い合わせ内容(必須)</p>
      <textarea name="contents" cols="44" rows="10" class="contact-textarea"></textarea><br>
      <input type="submit" value="確認する" class="contact-submit"> 
    </form>


    <?php include('footer.php'); ?>
  </div>
</body>
</html>