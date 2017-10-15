<?php
require "../config.php";
require "../vendor/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;
$connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
$search = $_GET['coin'];
$type = $_GET['type'];
$statuses = $connection->get("search/tweets", ["q" => $search, "count" => 50, "result_type" => $type]);
foreach ($statuses as $status) {
  foreach ($status as $key) {
    $tweets[] = $key;
  }
}
echo json_encode($tweets);
