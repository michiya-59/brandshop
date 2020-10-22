<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login']) === false)
{
  print 'ログインされていません'.'<br>';
  print '<a href="../staff_login2/staff_login.html">ログイン画面へ</a>';
  exit();
}
else
{
  print $_SESSION['staff_name'];
  print 'さんログイン中'.'<br>'.'<br>';
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Best Brand</title>
</head>
<body>
商品追加<br>
<br>
<form action="product_add.gazou.php" method="post">
  商品名を入力してください<br>
  <input type="text" name="name" style="width:200px"><br>
  価格を入力してください<br>
  <input type="text" name="price" style="width:100px"><br>
  サイズを入力してください<br>
  <input type="textarea" name="size" placeholder="縦×横×高さ" style="width:200px"><br>
  商品状態を入力してください<br>
  <select name="condition" >
    <option value="N 新品" >N 新品</option>
    <option value="S 未使用（展示品など）">S 未使用（展示品など）</option>
    <option value="A 傷や汚れが無く状態の良い美品">A 傷や汚れが無く状態の良い美品</option>
    <option value="B 程よい使用感や多少の傷、汚れはあるが良好の商品">B 程よい使用感や多少の傷、汚れはあるが良好の商品</option>
    <option value="C 使用感の他、目立つ傷や汚れが見られる商品">C 使用感の他、目立つ傷や汚れが見られる商品</option>
  </select><br>
  商品説明を記入してください<br>
  <input type="textarea" name="pro_detail"><br>
  出品数を追加してください<br>
  <select name="stock">
  <option value="0">0個</option>
  <option value="1">1個</option>
  </select><br>
  画像は何枚追加しますか？<br>
  <input type="text" name="gazou" style="width:30px">枚<br>
  商品のカテゴリーを選んでください<br>
  <select name="category" >
    <option value="long_wallet" >長財布</option>
    <option value="two_folded_wallet">二つ折り財布</option>
    <option value="three_folded_wallet">三つ折り財布</option>
    <option value="handbag">トートバック</option>
    <option value="totebag">ハンドバッグ</option>
  </select><br>
  商品のブランドを選んでください<br>
  <select name="brand" >
    <option value="GUCCI" >GUCCI</option>
    <option value="LOUISVUITTON">LOUISVUITTON</option>
    <option value="LOEWE">LOEWE</option>
    <option value="katespade">katespade</option>
  </select><br>
  <input type="button" onclick="history.back()" value="戻る">
  <input type="submit" value="OK">
</form>
</body>
</html>