
<!DOCTYPE html>
<html lang="en">
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
    <div class="container API">
        <header>
            <a href="https://www.rakuten.co.jp/">
                <img src="https://hbb.afl.rakuten.co.jp/hsb/16a03e6c.4680d7a7.14eb9498.783a8d0d/?me_id=1&me_adv_id=575088&t=pict" class="rakuten-icon">
            </a>  
        </header>
              
        
        <main>
            <h1 class="rakuten-h1">楽天商品検索APIを利用した楽天商品検索アプリ</h1>
            <p class="rakuten-text">
                日本最大級の膨大な商品群の中からお求めの商品を快速表示します。
                もちろんここから、今、買うことも出来ます。
                商品画像をクリックすると当サイトを離れて、楽天市場に商品を出展している店舗のサイトへリンクします。
            </p>
            <form method="get">
                <input type="text" name="word" value="グッチ 長財布" class="serch">
                <input type="submit" value="探す">
            </form>
            <a href="index.php" class="home-btn">ショップへ戻る</a>

            <?php
            //初期処理
            $applicationId = '1093306250285415867';
            $affiliateId = '1d572e29.92fdba84.1d572e2a.223ba42a';

            $sort = '-itemPrice';

            $hits = 12;//１ページあたりの表示件数

            if(empty($_GET['page'])) {
                $nowPage = 1;
            }
            else{
                $nowPage = $_GET['page'];
            }

            $keyword = '';

            if(!empty($_GET['word'])){
                $keyword = urlencode($_GET['word']);
            }
            //API関連処理
            $url = "https://app.rakuten.co.jp/services/api/IchibaItem/Search/20170706?format=json&keyword={$keyword}&sort={$sort}&applicationId={$applicationId}&hits={$hits}&page={$nowPage}&affiliateId={$affiliateId}";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// exec時に出力させない
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);// リダイレクト許可
            curl_setopt($ch, CURLOPT_MAXREDIRS, 5);// 最大リダイレクト数
            $body = curl_exec($ch);
            curl_close($ch);
            $decode_json = json_decode($body);

            //ページの計算
            $nextPage = $nowPage + 1;
            $prevPage = $nowPage - 1 ;
            //その他画面表示に必要な情報
            $allCount = $decode_json->count;
            $firstCount = $decode_json->first;
            $lastCount = $decode_json->last;
            ?>

            
            <p>「条件検索の入力例：グッチ 長財布」</p>
            <div class="serch-count">全 <?php echo $allCount;?>件   <?php echo $firstCount;?>件～<?php echo $lastCount;?>件（<?php echo $hits;?>件表示）</div>
            <!-- <a href="index.php">ショップへ</a> -->
            <?php
            print '<div class="rakuten-main">';
            foreach ($decode_json->Items as $item) {
                print '<br>' . "\n";
                $itemsName = (string)$item->Item->itemName;
                $itemsName = mb_substr($itemsName, 0, 70,"UTF-8") .'・・・';
                $mediumImageUrl = $item->Item->mediumImageUrls[0]->imageUrl;
                $affiliateUrl = $item->Item->affiliateUrl;
                print '<div class="rakuten-item">';
                    print '<div><a href="' . $affiliateUrl . '" target="_blank"><img src="' . $mediumImageUrl . '" class="rakuten-img"></a></div>';
                    print '<p class="rakuten-name">'.$itemsName.'</p>';
                print '</div>';
            }
            print '</div>';
            ?>
            
            <br>
            <?php if($prevPage != 0):?>
            <a href="rakuten.php?page=<?php echo $prevPage;?>" class="prev">前へ</a>
            <?php endif;?>
            <a href="rakuten.php?page=<?php echo $nextPage;?>" class="next">次へ</a>
            <a href="rakuten.php?page=1" class="next">スタートページに戻る</a>
     
        </main>

        <footer>
            <p class="footer-rakuten1">■プライバシーポリシー</p>
            <p class="footer-rakuten">・当サイト（システム）は、ユーザー様が入力等の操作による情報の全てを、取得・収集・保存等を
            行うことは一切ありません。</p>
            <p class="footer-rakuten">・当サイトは楽天（Rakuten Developers）会員です。</p>
            <div class="footer-part1">
                <p>Copyright ©<a href="rakuten.php">楽天商品検索APIを利用した楽天商品検索アプリ</a></p>
                <a href="https://www.rakuten.co.jp/"><img src="https://webservice.rakuten.co.jp/img/credit/200709/credit_31130.gif" ></a>
            </div>
        </footer>
    </div>
</body>
</html>