 <?php

 // first names
 $names = ['Tina', 'Dana', 'Mike', 'Amy', 'Adam'];

 $compare = ['Tina', 'Dean', 'Mel', 'Amy', 'Michael'];

 function arraySearch($array, $val){
 	foreach ($array as $item) {
 		if ($item == $val){
 			return true;
 		}
 	}
 	return false;
 }

 function compArrays($ar1, $ar2){
 	$count = 0;
 	foreach ($ar1 as $value) {
 		if (arraySearch($ar2, $value))
 		{
 			$count++;
 		}
 	}
 	return $count;
 }

 echo "Array 1 and Array 2 share ".compArrays($names, $compare)." components.\n";

