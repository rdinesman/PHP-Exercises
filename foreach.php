<?php

$ar = array('Sgt. Pepper', "11", null, array(1,2,3), 3.14, "12 + 7", false, (string) 11);

if ($argc > 1){
	for($i = 1; $i < $argc; $i++){
		$ar[count($ar)-1] = $argv[$i]; 
	}
}
fwrite(STDOUT, "\nPrinting Data Types:\n\n");
foreach($ar as $v){
	if (is_array($v)){
		 fwrite(STDOUT,"Array\n");
		 foreach ($v as $innerV) {
		 	fwrite(STDOUT, "    ".$innerV."\n");
		 }
	}
	
	elseif (is_integer($v)){
		 fwrite(STDOUT,"Integer\n");
	}
	
	elseif (is_float($v)){
		 fwrite(STDOUT,"Float\n");
	}
	
	elseif (is_bool($v)){
		 fwrite(STDOUT,"Boolean\n");
	}

	elseif (is_string($v)){
		 fwrite(STDOUT,"String\n");
	}
	
	elseif (is_null($v)){
		 fwrite(STDOUT,"Null\n");
	}
}

fwrite(STDOUT, "\n\nPrinting Scalars:\n\n");
foreach($ar as $v){
	if(is_scalar($v)){
		fwrite(STDOUT, $v."\n");
	}
}