<?php

function logMessage($logLevel, $message)
{
    $date = date("Y-m-d");
    $time = date("H\:i\:s");
    echo $date."\n";
    echo $time."\n";
    $handle = fopen("data/log-{$date}.txt", 'a');
    fwrite($handle, $date." ".$time." ".$logLevel." ".$message."\n");
}

logMessage("INFO", "This is an info message.");
logMessage("ERROR", "This is an info message.");
