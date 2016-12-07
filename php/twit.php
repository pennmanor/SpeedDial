<?php
require_once("config.php");
session_start();
require_once("twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library

$notweets = 3;

function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}

$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);

$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);

echo json_encode($tweets);

$fh = fopen($file, 'w') or die("can't open file");
fwrite($fh, json_encode($tweets));
fclose($fh);

if (file_exists($file)) {
    echo $file . " successfully written (" .round(filesize($file)/1024)."KB)";
}
?>
