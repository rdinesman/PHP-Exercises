<?php
$inc = 1;
if ($argc == 2){
	if (is_numeric($argv[1])){
		$inc = $argv[1];
	}
}
do{
	fwrite(STDOUT, "\nWhat number would you like to start at? ");
	$start = trim(fgets(STDIN));

	if (!is_numeric($start)){
		fwrite(STDOUT, "\nPlease enter a number.");
	}
}
while (!is_numeric($start));
do{
	fwrite(STDOUT, "\nWhat number would you like to stop at? ");
	$end = trim(fgets(STDIN));

	if (!is_numeric($end)){
		fwrite(STDOUT, "\nPlease enter a number.");
	}
	elseif ($end == $start){
		fwrite(STDOUT, "\nPlease enter an ending number that is different from the starting number.");
	}
}
while (!is_numeric($end) || $end == $start);

if ($end > $start){
	for ($i = $start; $i <= $end; $i += $inc){
		fwrite(STDOUT, "\n$i");
	}
}
else{
	for ($i = $start; $i >= $end; $i -= $inc){
		fwrite(STDOUT, "\n$i");
	}
}

fwrite(STDOUT, "\n\nHIT ENTER, AND PREPARE TO FIZZ! AND THEN BUZZ!\n");
fgets(STDIN);

for ($i = 1; $i < 101; $i++){
	if ($i % 3 == 0 && $i % 5 == 0){
		fwrite(STDOUT, "FizzBuzz\n");
	}
	elseif ($i % 3 == 0){
		fwrite(STDOUT, "Fizz\n");
	}
	elseif ( $i % 5 == 0){
		fwrite(STDOUT, "Buzz\n");
	}
	else{
		fwrite(STDOUT, $i."\n");
	}
}