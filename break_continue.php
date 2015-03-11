<?php

$i = 0;
while ($i < 101){
	$i++;
	if ($i % 2 == 0){
		fwrite(STDOUT, "$i\n");
		if ($i == 10){
			break;
		}
		continue;
	}
}