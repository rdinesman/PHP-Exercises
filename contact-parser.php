<?php

function parseContacts($filename)
{
    $contacts = array();

    // todo - read file and parse contacts
    $handle = fopen($filename, 'r');
    $contents = fread($handle, filesize($filename));
    $contactArray = explode("\n", $contents);
    $contents = implode("|", $contactArray);
    $contactArray = explode("|", $contents);
    // print_r($contactArray);
    for ($i = 0; $i < count($contactArray) -1; $i+=2){
    	$contacts[count($contacts)] = 
    	[
	    	"name" => $contactArray[$i],
	    	"number" => substr($contactArray[$i+1], 0, 3)."-".substr($contactArray[$i+1], 3, 3)."-".substr($contactArray[$i + 1], 6)
    	];
    }
    return $contacts;
}
var_dump(parseContacts('data/contacts.txt'));
