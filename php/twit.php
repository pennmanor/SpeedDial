<?php
session_start();
require_once("twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library

$twitteruser = "pennmanor";
$notweets = 2;
$consumerkey = "pR7MrMSBX6nAIaHwyVp1A";
$consumersecret = "S5FOxgvWLd7ig05aHtQghtY9b7rjXZm9svEDLU3E08";
$accesstoken = "35283009-rODeLTE6NKCNDMWHlBSwob8wBnGuIt8iGTyTv0K37";
$accesstokensecret = "Zj6LRwLDJn7yZZ5jU28kMjxIQP6kURk2EiQJTYcA";

function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}

$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);

$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);

echo json_encode($tweets);
$file = "/var/www/mainsite/a/homepage/php/pennmanor-tweets.txt";
$fh = fopen($file, 'w') or die("can't open file");
fwrite($fh, json_encode($tweets));
fclose($fh);

if (file_exists($file)) {
    echo $file . " successfully written (" .round(filesize($file)/1024)."KB)";
}
?>
