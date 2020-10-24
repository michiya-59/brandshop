<?php 

$gucci = 'GUCCI';
$vuitton = 'LOUISVUITTON';
$loewe = 'LOEWE';
$spade = 'ketaspade';
$bvlgari = 'BVLGARI';

$wallet = 'long_wallet';
$wallet2 = 'two_folded_wallet';
$wallet3 = 'three_folded_wallet';
$handbag = 'handbag';
$totebag = 'totebag';

?>

<header>
  <div id="header">
  <div id="nav-drawer" class="header-left my-3">
      <input id="nav-input" type="checkbox" class="nav-unshown">
      <label id="nav-open" for="nav-input"><i class="fa fa-align-justify"></i> </label>
      <label class="nav-unshown" id="nav-close" for="nav-input"></label>
      <div id="nav-content">
        <div class="nav-content">
          <a href="index.php" class="nav-a"><p class="nav-contents">HOME</p></a>
          <a href="shop_about.php" class="nav-a"><p class="nav-contents">ABOUT</p></a>
          <a href="shop_contact.php" class="nav-a"><p class="nav-contents">CONTACT</p></a>
          <a href="member_login.php" class="nav-a"><p class="nav-contents">LOGIN</p></a>
          <!-- カテゴリーのドロップダウンする機能 -->
          <div class="dropdown">
            <button class="dropdown-btn" id="dropdown-btn" onfocus="this.blur();">
              <p class="nav-contents2">SERCH</p>
            </button>
            <div class="dropdown-body">
              <button class="category-item" id="category-item">
                <p>カテゴリ</p>
              </button>
              <div class="dropdown-category">
                <ul class="dropdown-list">
                  <li><a href="long_wallet.php?category=<?php print $wallet ?>">長財布</a></li>
                  <li><a href="two_folded_wallet.php?category=<?php print $wallet2 ?>">二つ折り財布</a></li>
                  <li><a href="three_folded_wallet.php?category=<?php print $wallet3 ?>">三つ折り財布</a></li>
                  <li><a href="handbag.php?category=<?php print $handbag ?>">ハンドバッグ</a></li>
                  <li><a href="totebag.php?category=<?php print $totebag ?>">トートバッグ</a></li>
                </ul>
              </div>
              <button class="brand-item" id="brand-item">
                <p>ブランド</p>
              </button>
              <div class="dropdown-brand" >
                <ul class="dropdown-list">
                  <li><a href="gucci.php?brand=<?php print $gucci ?>">Gucci</a></li>
                  <li><a href="vuitton.php?brand=<?php print $vuitton ?>">Louis Vuitton</a></li>
                  <li><a href="loewe.php?brand=<?php print $loewe ?>">LOEWE</a></li>
                  <li><a href="spade.php?brand=<?php print $spade ?>">kate spade</a></li>
                  <li><a href="spade.php?brand=<?php print $bvlgari ?>">BVLGARI</a></li>
                </ul>
              </div>
            </div>
          </div>
           <!-- カテゴリーのドロップダウンする機能終了-->
          <a href="./staff/staff_login.php" class="nav-a"><p class="nav-contents">STAFF</p></a>

        </div>
        <a href="shop_cartlook.php"><i class="fas fa-shopping-cart mr-3" style="color:gray;"></i></a>
      </div>
    </div>

    <div class="header-right">
    <a href="rakuten.php?word=グッチ%E3%80%80腕時計" class="rakuten"><i class="fa fa-registered "></i></a>
    <?php if(isset($_SESSION['member_login']) === true): ?>
        <a href="member_logout.php"><i class="fa fa-user mr-3 mt-3"></i></a>
        <?php else: ?>
          <a href="member_login.php"><i class="fa fa-user mr-3 mt-3"></i></a>
      <?php endif ?>
      <a href="shop_cartlook.php"><i class="fas fa-shopping-cart mr-3"></i></a>
    </div>
  </div>
  <h1 class="title"><a href="index.php" class="home">BEST BRAND</a></h1>
</header>