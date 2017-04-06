<?php

// Written by Michael Andrews (mail@michaelandrews.net)

// Test mode: 0 is off, 1 is on
$testMode = '0';

// Include twitteroauth
require_once('twitteroauth.php');

// Set keys
$consumerKey = 'tYLsdaiARI0WrUYjWhAnhM0Tw';
$consumerSecret = 'WoIOuKhnwQ4FGpTguW0vmOqFQjfq5b987BN0K77XAzhUvx0EkZ';
$accessToken = '2733165601-JmTXL0niVo7AB3goUFUUuVgpaMGR4PQDwSAUp6j';
$accessTokenSecret = 'ofPuXOoYLUE7wCqJIB3log8ezOkvA0pe8gY65qOaXcRRL';

// Create object
$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

// Check for 140 characters
if($testMode == '0')
{
  if(strlen($tweetMessage) <= 140)
  {
    // Set line number to tweet
    $lineNumber = rand(1,87196);
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
