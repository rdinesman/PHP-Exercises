<?php

$bottles = 99;
$switch = "bottles";
while ($bottles > 0){
	fwrite(STDOUT, "\n$bottles $switch of beer on the wall, $bottles $switch of beer.\nTake one down, pass it around, ");
	$bottles--;
	if ($bottles == 1){
		$switch = "bottle";
	}
	else{
		$switch = "bottles";
	}
	if ($bottles == 0){
		$bottles = "no more";
	}
	fwrite(STDOUT, "$bottles $switch of beer on the wall!\n");
}
fwrite(STDOUT, "\nNo more bottles of beer on the wall, no more bottles of beer.\nGo to the store, buy some more, 99 bottles of beer on the wall!");