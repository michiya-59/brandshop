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
  <div class="container">
    <?php include('header.php'); ?>
      <div class="check-form">
        <p class="done-p">お問い合わせありがとうございます。</p>
        <p class="done-p">ご返事は本日から1～2日以内にご連絡致しますので<br>
        今しばらくお待ち下さいませ。</p>
      </div>
    <?php 
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $mail = $_POST['mail'];
    $title = $_POST['subject'];
    $contents = $_POST['contents'];

    $date = new DateTime('now');
    $appdate = $date->format('Y年m月d日');

    $name = htmlspecialchars($name,ENT_QUOTES,'UTF-8');
    $tel = htmlspecialchars($tel,ENT_QUOTES,'UTF-8');
    $mail = htmlspecialchars($mail,ENT_QUOTES,'UTF-8');
    $title = htmlspecialchars($title,ENT_QUOTES,'UTF-8');
    $contents = htmlspecialchars($contents,ENT_QUOTES,'UTF-8');

    $honbun = '';
    $honbun .= "このメールはシステムからの自動返信です。\n";
    $honbun .= "\n";
    $honbun .= $name."様\nお世話になっております。\n";    
    $honbun .= "以下の内容でお問い合わせを受け付けました。\n";
    $honbun .= "\n";
    $honbun .= "お問い合わせ日から1～2日以内にご連絡致しますので、今しばらくお待ちくださいませ。\n";
    $honbun .= "\n";
    $honbun .= "▼お問い合わせ内容▼\n";
    $honbun .= "------------------------------------------\n";
    $honbun .= "お名前：".$name;
    $honbun .= "\n";
    $honbun .= "メールアドレス：".$mail;
    $honbun .= "\n";
    $honbun .= "電話番号：".$tel;
    $honbun .= "\n";
    $honbun .= "お問い合わせ日時：".$appdate;
    $honbun .= "\n";
    $honbun .= "お問い合わせいただいた内容：".$contents;
    $honbun .= "\n";
    $honbun .= "------------------------------------------\n";    
    $honbun .= "\n";
    $honbun .= "□□□□□□□□□□□□□□□□□□□□□□□□□□\n";
    $honbun .= " BEST BRAND\n";
    $honbun .= "\n";
    $honbun .= "電話番号 090-8367-5290\n";
    $honbun .= "メール brandshop.contact@gmail.com\n";
    $honbun .= "□□□□□□□□□□□□□□□□□□□□□□□□□□\n";

    require 'vendor/autoload.php';
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("brandshop.contact@gmail.com");
    $email->setSubject("【BEST BRABD通販サイト】お問い合わせしていただきありがとうございます");
    $email->addTo($mail);
    $email->addContent("text/plain", $honbun);
    $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
    try {
        $response = $sendgrid->send($email);
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage() ."\n";
    }

    require 'vendor/autoload.php';
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom('brandshop.contact@gmail.com');
    $email->setSubject("【BEST BRABD通販サイト】お問い合わせがありました");
    $email->addTo("brandshop.contact@gmail.com");
    $email->addContent("text/plain", $honbun);
    $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
    try {
        $response = $sendgrid->send($email);
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage() ."\n";
    }
    ?>
  <a href="index.php"><p  class="product-detail-btn">ショップへ</p></a>
  <?php include('footer.php'); ?>
  </div>
  
</body>
</html>