<?php
require "vendor/autoload.php";
use Abraham/TwitterOAuth/TwitterOAuth;

$consumerKey       = "t98vdIl2uZMlHoIAloiy9eRdg";
$consumerSecret    = "6hTdJZkotWT6CiDIoCDaM50hR3e9jhsFW7wrsbSQfje5CdblR0";
$accessToken       = "1313316897010507776-jK1aTnLV9IUGLcVbzpNIdmk8oD0TkI";
$accessTokenSecret = "lzxox0BOksTXy6Qt2FgMpdnbXeTJr7oAkR2PNJ3dRWqzD";

$twitter = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

print '<p><a href="https://twitter.com/compose/tweet" target="_blank">https://twitter.com/compose/tweet</a>'.$result = $twitter->post("statuses/update", array("status" => "TEST Tweet.")).'</p>';
?>