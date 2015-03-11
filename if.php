<?php

$a = 5;
$b = 10;
$c = '10';

if ($a > $b)
	echo "$a > $b\n";
else
	echo "$b > $a\n";

if ($b >= $c)
	echo "$b is greater than or equal to $c\n";
else 
	echo "$b is not greater than nor equal to $c\n";

if ($b === $c)
	echo "$b is identical to $c\n";
elseif ($b == $c)
	echo "$b equals $c\n";
elseif ($b !== $c)
	echo "$b is not identical to $c\n";
else
	echo "$b is not equal to $c\n";
