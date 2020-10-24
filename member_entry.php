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

  // 会員登録するときのフォーム
  ?>
  <div class="container">
  <?php include('header.php'); ?>
  <p class="form-p-firts">会員登録</p><br>
  <form action="member_entry_check.php" method="post" class="shop-form">
    <div class="form-part">
      <p class="form-p">お名前</p>
      <input type="text" name="name" style="width:200px" class="form-input"><br>
    </div>
    <div class="form-part">
      <p class="form-p">メールアドレス</p>
      <input type="text" name="mail" style="width:200px" class="form-input"><br>
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
    <input type="button" onclick="history.back()" value="戻る" class="btns">
    <input type="submit" value="OK" class="btns">
  </form>
<?php include('footer.php'); ?>
</body>
</html>