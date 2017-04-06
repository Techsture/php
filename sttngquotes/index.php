<?php

// Written by Michael Andrews (mail@michaelandrews.net)

// Test mode: 0 is off, 1 is on
$testMode = '0';

// Include twitteroauth
require_once('twitteroauth.php');

// Set keys
$consumerKey = 'lxvHZdA9y9H7TpmGpqQW7LYmD';
$consumerSecret = 'ualJHyeWaZJMWRlhWis7q5m7kzUC9pxEEquoXA3K0kt78KqZZt';
$accessToken = '2709978181-7AHUHPiRFI0h6x5NPifbdEezryyc4A3QNvlbPM4';
$accessTokenSecret = 'OQ569exfYCmyd7S8Y1Mh8dQoyXQhMPKzTUnB6qflvoC5m';

// Create object
$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

// Check for 140 characters
if($testMode == '0')
{
  if(strlen($tweetMessage) <= 140)
  {
    // Set line number to tweet
    $lineNumber = rand(1,76518);
    // Set status message
    $linesFile = new SplFileObject('lines.txt');
    $linesFile -> seek($lineNumber - 1);
    $linesFile -> current();
    $tweetMessage = $linesFile -> current();
    // Post the status message
    $tweet->post('statuses/update', array('status' => $tweetMessage));
  }
}
else if($testMode == '1')
{
  // Set line number
  $lineNumber = rand(1,76518);
  // Set status message
  $linesFile = new SplFileObject('lines.txt');
  $linesFile -> seek($lineNumber - 1);
  $linesFile -> current();
  $tweetMessage = $linesFile -> current();
  // Print test message on page
  print("lineNumber = $lineNumber<br>");
  print("tweetMessage = $tweetMessage<br>");
}
else
{
  print("testMode variable is out of bounds: $testMode");
}

?>
