<?php
 require_once("twitteroauth/twitteroauth.php");
 $consumerKey = "K1ZoMynXkGs5U0sZlKD7rA";
 $consumerSecret = "ZXkyUJ1ZKwErx459dJxZaOc11DlYljnn6MSJpSjpVA";
 session_start();
 $token = $_SESSION['token'];
 $reply_to = '@' . $_SESSION['replyto'];

 $twitter = new TwitterOAuth($consumerKey, $consumerSecret, $token["oauth_token"], $token["oauth_token_secret"]);
 $access_token = $twitter->getAccessToken($_GET["oauth_verifier"]);
 print "<pre>";
 print_r($token);
 print_r($access_token);

 $count = 0;
 while($count < 127) {
  $tweet = $reply_to . ' ' . rand();
  echo $tweet . "<br />";
  # test to post
  $result = $twitter->OAuthRequest("https://api.twitter.com/1.1/statuses/update.json" , "POST", array("status" => $tweet));
  echo $result . "<br />";
  $count = $count + 1;
  #sleep(28);
 }
 echo "<h2><a href = \"https://twitter.com/\">Twitterを見る</a></h2>"; 
?>
