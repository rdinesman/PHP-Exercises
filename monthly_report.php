<?php
///////////////////////////////////////////////////////////
// GLOBAL FUNCTIONS ///////////////////////////////////////
	function createBorder($row){
		$borderShell = '';
		for($i = 0; $i < strlen($row); $i++){
			if ($row[$i] == '|')
				$borderShell = $borderShell.'+';
			else
				$borderShell = $borderShell.'~';
		}
		return $borderShell;
	}

	function fillCell($col, $contents){
		$size = strlen($col) - 1;
		$cell = '|'.$contents;
		while(strlen($cell) < $size){
			$cell = $cell.' ';
		}
		return $cell.'|';
	}

	function printTable($col1, $col2, $col3, $col4, $employees){
		$border = createBorder($col1[0].$col2[0].$col3[0].$col4[0]);
		echo $border."\n";
		echo $col1[0].$col2[0].$col3[0].$col4[0]."\n";

		for($i = 0; $i < count($employees); $i++){
			echo "________________________________________\n";
			echo fillCell($col1[0], $employees[$i][$col1[1]]);
			echo fillCell($col2[0], $employees[$i][$col2[1]]);
			echo fillCell($col3[0], $employees[$i][$col3[1]]);
			echo fillCell($col4[0], $employees[$i][$col4[1]]);
			echo "\n";
		}

		echo $border."\n";
	}
//                                                       //
// GLOBAL VARIABLES ///////////////////////////////////////
	$handle = fopen("data/report.txt", 'r');
	$content = fread($handle, filesize("data/report.txt"));
	$content = explode("\n", $content);

	$title = array_shift($content);
	$date = array_shift($content);
	$office = array_shift($content);

	array_shift($content);
	array_shift($content);
	array_shift($content);

	$employees = [];

	foreach ($content as $line) {
		$shell = explode(',', $line);
		$employees[count($employees)] = [
			'number' => $shell[0],
			'fName' => $shell[1],
			'lName' => $shell[2],
			'sales' => $shell[3]
		];
	}

	$numTitle = ['| # |', 'number'];
	$fNameTitle = ['|First Name |', 'fName'];
	$lNameTitle = ['|Last Name  |', 'lName'];
	$salesTitle = ['|Sales  |', 'sales'];
//                                                       //
// MAIN////////////////////////////////////////////////////
	printTable($numTitle, $fNameTitle, $lNameTitle, $salesTitle, $employees);
	fclose($handle);
///////////////////////////////////////////////////////////