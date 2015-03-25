<?php

// function logMessage($logLevel, $message)
// {
//     $date = date("Y-m-d");
//     $time = date("H\:i\:s");
//     $handle = fopen("data/log-{$date}.txt", 'a');
//     fwrite($handle, $date." ".$time." ".$logLevel." ".$message."\n");
// }

// logMessage("INFO", "This is an info message.");
// logMessage("ERROR", "This is an info message.");

require 'Log.php';

$newLog = new Log('update', 'Now added constructor.');
// $newLog->fileName = 'data/log-'.date("Y-m-d").'.txt';
// $newLog->info('Log class is working.'); 
