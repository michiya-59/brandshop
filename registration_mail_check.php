<!DOCTYPE html>
<html lang="ja">
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
  <link rel="stylesheet" href="style1.css?v=2" type="text/css">
  <link rel="stylesheet" href="style2.css?v=2" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<body>
  <?php 
  session_start();
  session_regenerate_id(true);

  header("Content-type: text/html; charset=utf-8");
  
  //クロスサイトリクエストフォージェリ（CSRF）対策のトークン判定
  if ($_POST['token'] != $_SESSION['token']){
    echo "不正アクセスの可能性あり";
    exit();
  }
  
  //クリックジャッキング対策
  header('X-FRAME-OPTIONS: SAMEORIGIN');

  $errors = array();

  if(empty($_POST)) 
  {
    header("Location: registration_mail_form.php");
    exit();
  }
  else
  {
    $mail = $_POST['mail'];
    $name = $_POST['name'];

    if ($mail == '')
    {
      $errors['mail'] = "メールが入力されていません。";
    }
    else
    {
      if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $mail))
      {
        $errors['mail_check'] = "メールアドレスの形式が正しくありません。";
      }
    }
  }

  if(count($errors) === 0)
  {
    $urltoken = hash('sha256',uniqid(rand(),1));
    $url = "https://usersbrandshop.herokuapp.com/registration_form.php?urltoken=$urltoken";

    try{
      $dsn = 'mysql:dbname=heroku_b74bce80f45f87e;host=us-cdbr-east-02.cleardb.com;charset=utf8';
      $user = 'bc9681657abe67'; 
      $password = '8f2c9d49';
      $dbh = new PDO($dsn,$user,$password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      $sql = 'INSERT INTO pre_member (urltoken,mail,name) VALUES (?,?,?)';
      $stmt = $dbh->prepare($sql);
      $data[] =  $urltoken;
      $data[] = $mail;
      $data[] = $name;
      $stmt->execute($data);

      $dbh = null;
    }
    catch(Exception $e){
      print('Error:'.$e->getMessage());
      exit();
    }

    $honbun = '';
    $honbun .= "BEST BRAND 仮登録を受け付けました！\n";
    $honbun .= "\n";
    $honbun .= "$name.'様 仮登録していただきありがとうございます。\n";
    $honbun .= "▼▼ 下記のURLから登録を完了させてください▼▼\n";
    $honbun .= "$url\n";
    $honbun .= "\n";
    $honbun .= "【このメールの内容に覚えがない方】\n";
    $honbun .= "メールの内容に覚えがない場合は、そのまま破棄していただいて構いません。\n";
    $honbun .= "\n";
    $honbun .= "\n";
    $honbun .= "□□□□□□□□□□□□□□□□□□□□□□□\n";
    $honbun .= " BEST BRAND\n";
    $honbun .= "電話番号 090-8367-5290\n";
    $honbun .= "メール brandshop.contact@gmail.com\n";
    $honbun .= "□□□□□□□□□□□□□□□□□□□□□□□\n";

    require 'vendor/autoload.php';
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("brandshop.contact@gmail.com");
    $email->setSubject("【BEST BRAND】会員登録用URLのお知らせ");
    $email->addTo($mail);
    $email->addContent("text/plain", $honbun);
    $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
    try {
        $response = $sendgrid->send($email);
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage() ."\n";
    }
  }
  ?>
  <div class="container">
  <?php include('header.php') ?>
    <div class="main">
      <p class="mail-form-p"><?php print $mail ?>に本登録用のメールを送りました。</p>
      <p class="mail-form-p">メールの方で本登録を完了させてください</p>
    </div>
  </div>
  
</body>
</html>