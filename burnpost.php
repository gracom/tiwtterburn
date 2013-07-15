<?php
 require_once("twitteroauth/twitteroauth.php");
 $reply_to = $_GET["replyto"];
 if(!isset($reply_to) || $reply_to === "") die("bad reply destination");
 # auth
 $consumerKey = "K1ZoMynXkGs5U0sZlKD7rA";
 $consumerSecret = "ZXkyUJ1ZKwErx459dJxZaOc11DlYljnn6MSJpSjpVA";
 $callback = "http://gracom.dip.jp/twitter/burnpost_execute.php";
 $consumer = new TwitterOAuth($consumerKey, $consumerSecret);
 $token = $consumer->getRequestToken($callback);
 $authUrl = $consumer->getAuthorizeUrl($token);

 session_start();
 $_SESSION['token'] = $token;
 $_SESSION['replyto'] = $reply_to;
 header('Location: ' . $authUrl );
?>
