<?php

function add($a, $b) {
	if (!is_numeric($a) || !is_numeric($b)){
		echo error("notNum", $a, $b);
	}
	else{
		    echo $a + $b;
		}
}

function subtract($a, $b) {
	if (!is_numeric($a) || !is_numeric($b)){
		echo error("notNum", $a, $b);
	}
	else{
	    echo $a - $b;
	}
}

function multiply($a, $b) {
	if (!is_numeric($a) || !is_numeric($b)){
		echo error("notNum", $a, $b);
	}
	else{
	    echo $a * $b;
	}
}

function divide($a, $b) {
	if (!is_numeric($a) || !is_numeric($b)){
		echo error("notNum", $a, $b);
	}
	elseif ($b == 0){
		echo error("div0");
	}
	else{
	    echo $a / $b;
	}
}

function modulus($a, $b){
	if (!is_numeric($a) || !is_numeric($b)){
		echo error("notNum", $a, $b);
	}
	elseif ($b == 0){
		echo error("div0");
	}{
		echo $a % $b;
	}
}

function checkMod($a, $b){
	if (!is_numeric($a) || !is_numeric($b)){
		echo error("notNum", $a, $b);
	}
	else{
		echo $a - (floor($a / $b) * $b);
	}
}

function error($error, $valA = 0, $valB = 0){
	switch ($error){
		case("notNum"):
			if (!is_numeric($valA) && !is_numeric($valB)){
				return "$valA and $valB are not valid numbers. ";
			}
			elseif (!is_numeric($valA)){
				return "$valA is not a valid number. ";
			}
			elseif (!is_numeric($valB)){
				return "$valB is not a valid number. ";
			}
			return "Please enter a valid number.";
			break;
		case("div0"):
			return "You cannot divide by 0, please enter another number.";
			break;
		default:
			return "Error";
			break;
	}
}
echo "534095 + 2.2 = ";
add(534095, 2.2);
echo "\n";

echo "534095 - 'bananahammock' = ";
subtract(534095, 'bananahammock');
echo "\n";

echo "tribble * trabble = ";
multiply('tribble', 'trabble');
echo "\n";

echo "534095 / 0 = ";
divide(534095, 0);
echo "\n";

echo "534095 % 2.2 = ";
modulus(534095, 2.2);
echo "\n";

echo "Again, 534095 % 2.2 = ";
checkMod(534095, 2.2);
echo "\n";

