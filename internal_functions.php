<?php

$nothing = null;
$something = '';
$array = array(7, 8, 9);

// Create a function that checks if a variable is set or empty, and display "$variable_name is SET|EMPTY"
function setOrEmpty($inp){
	if (empty($inp)){
		return "EMPTY";
	}
	elseif (isset($inp)){
		return "SET";
	}
}

// TEST: If var $nothing is set, display '$nothing is SET'

// TEST: If var $nothing is empty, display '$nothing is EMPTY'

// TEST: If var $something is set, display '$something is SET'

// Serialize the array $array, and output the results

// Unserialize the array $array, and output the results
echo "nothing: ".$nothing."\n";
echo "\$nothing is ".setOrEmpty($nothing)."\n";
$nothing = "12";
echo "nothing: ".$nothing."\n";
echo "\$nothing is ".setOrEmpty($nothing)."\n";
echo "something: ".$something."\n";
echo "\$something is ".setOrEmpty($something)."\n";

$array = serialize($array);
echo $array;
$array = unserialize($array);
print_r($array);