<?php
$i = 1;
while ($i < 101){
	$div3 = (bool)($i % 3 == 0);
	$div5 = (bool)($i % 5 == 0);
	$resp = "";
	if ($div3){
		$resp = $resp."Fizz";
	}
	if ($div5){
		$resp = $resp."Buzz";
	}
	if ($resp){
		echo $resp."\n";
	}
	else{
		echo $i."\n";
	}

	$i++;
}