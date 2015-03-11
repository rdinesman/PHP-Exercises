<?php

$minNum = 1;
$maxNum = 100;
// echo $argc."\n";
// echo print_r($argv);
if ($argc == 3 && $argv[2] - $argv[1] > 1){
	$minNum = $argv[1];
	$maxNum = $argv[2];
}
$play = true;

fwrite(STDOUT, "Welcome to Mr. Bones' Spooky Number Game!\n");
fwrite(STDOUT, "I, Mr.Bones, will think of a number between $minNum and $maxNum...\n");
fwrite(STDOUT, "and you will guess it!\n\n");
fwrite(STDOUT, "Enter q at any point to quit.\n");

while ($play){
	$turn = 1;
	$guesses = [];
	$num = rand($minNum, $maxNum);
	fwrite(STDOUT, "\nI AM THINKING OF A NUMBER BETWEEN $minNum AND $maxNum....\n");
	fwrite(STDOUT, "TAKE A GUESS! ");
	$guess = trim(fgets(STDIN));

	while ($guess != $num && $guess != "q"){
		if (is_float($guess)){
			fwrite(STDOUT, "Please guess an integer between $minNum and $maxNum. ");
			$guess = trim(fgets(STDIN));
		}
		elseif (!is_numeric($guess) ||  (int)$guess < $minNum || (int)$guess > $maxNum){
			fwrite(STDOUT, "Please guess an integer between $minNum and $maxNum. ");
			$guess = trim(fgets(STDIN));
		}
		else {
			if ($guess > $num){
				fwrite(STDOUT, "\nYour guess is too high!\n");
				fwrite(STDOUT, "Guess again!\n");
				$guess = trim(fgets(STDIN));
			}
			elseif ($guess < $num){
				fwrite(STDOUT, "\nYour guess is too low!\n");
				fwrite(STDOUT, "Guess again! ");
				$guess = trim(fgets(STDIN));
			}
			$turn++;
		}

	}
	if ($guess == "q"){
			fwrite(STDOUT, "Thanks for playing!\n");
			$play = false;
		}
	
	elseif ($guess != "q"){
		if ($turn == 1){
			fwrite(STDOUT, "\nWow! Yout got it on the first guess!\n");
			fwrite(STDOUT, "Good job!\n");
		}
		else{
			fwrite(STDOUT, "\nGood guess!\n");	
			fwrite(STDOUT, "It took you $turn turns to guess the number.");
		}
		fwrite(STDOUT, "Would you like to play again?\n");
		fwrite(STDOUT, "Enter y if you'd like to play again: ");
		$playPrompt = trim(fgets(STDIN));
		if ($playPrompt != "y"){
			$play = false;
		}
	}
}