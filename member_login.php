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
  ?>
  <div class="container">
  <header>
  <div id="header">
    <div id="nav-drawer" class="my-3">
      <input id="nav-input" type="checkbox" class="nav-unshown">
      <label id="nav-open" for="nav-input"><i class="fa fa-align-justify"></i> </label>
      <label class="nav-unshown" id="nav-close" for="nav-input"></label>
      <div id="nav-content">
        <div class="nav-content">
          <a href="shop_list.php" class="nav-a"><p class="nav-contents">HOME</p></a>
          <a href="shop_about.php" class="nav-a"><p class="nav-contents">ABOUT</p></a>
          <a href="shop_contact.php" class="nav-a"><p class="nav-contents">CONTACT</p></a>
          <a href="member_login.php" class="nav-a"><p class="nav-contents">LOGIN</p></a>
        </div>
        <a href="shop_cartlook.php"><i class="fas fa-shopping-cart mr-3" style="color:gray;"></i></a>
      </div>
    </div>

    <div class="header-right">
      <a href="member_login.php"><i class="fa fa-user mr-3 mt-3"></i></a>
      <a href="shop_cartlook.php"><i class="fas fa-shopping-cart mr-3"></i> </a>
    </div>
  </div>
  <h1 class="title"><a href="index.php" class="home">BEST BRAND</a></h1>
</header>

<!-- ログイン機能の処理 -->

<!-- ログインしていたら、ログアウトの画面を出し、ログアウトできるようにしている -->
<?php if(isset($_SESSION['member_login']) === true) : ?>
  <p class="login-p">ログアウト</p>
  <div class="login-form">
    <p class="logout-p">ログアウトしますか？</p>
    <a href="member_logout.php" class="logout-a">ログアウトへ</a>
  </div>  
<?php else : ?>
  <!-- ログインしていなかったら、ログインと会員登録させる機能の画面 -->
  <div class="login-body">
    <p class="login-p">会員ログイン</p>
  </div>
  <div class="login-form">
    <form action="member_login_check.php" method="post">
    <p class="mail-p">登録メールアドレス</p><br>
    <input type="text" name="mail" class="mail"><br>
    <p class="pass-p">パスワード</p><br>
    <input type="password" name="pass" class="pass"><br>
    <input type="submit" value="ログイン" class="login">
    </form>
    <p class="member-p">会員登録は<a href="member_entry.php" style="text-decoration:none">こちら</a></p>
  </div>
<?php endif; ?>
  <?php include('footer.php') ?>
  </div>
</body>
</html>