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

	function printTable($col1, $col2, $col3, $col4, $employees, $data){
		$border = createBorder($col1[0].$col2[0].$col3[0].$col4[0]);
		echo $data[0]." ".$data[1]." ".$data[2]."\n";
		echo '     '.$border."\n";
		echo '     '.$col1[0].$col2[0].$col3[0].$col4[0]."\n";

		for($i = 0; $i < count($employees); $i++){
			echo '     '."________________________________________________\n";
			echo '     '.fillCell($col1[0], $employees[$i][$col1[1]]);
			echo fillCell($col2[0], $employees[$i][$col2[1]]);
			echo fillCell($col3[0], $employees[$i][$col3[1]]);
			echo fillCell($col4[0], $employees[$i][$col4[1]]);
			echo "\n";
		}

		echo '     '.$border."\n";
	}

	function write($toWrite, $overWrite = false){
		$writeType = 'a';
		if ($overWrite){
			$writeType = 'w';
		}
		$handle = fopen("data/report.txt", $writeType);
		fwrite($handle, $toWrite);
	}
//                                                       //
// GLOBAL VARIABLES ///////////////////////////////////////
	$handle = fopen("data/report.txt", 'r');
	$content = fread($handle, filesize("data/report.txt"));
	$content = explode("\n", $content);

	$title = array_shift($content);
	$date = array_shift($content);
	$office = array_shift($content);
	$data = [$title, $date, $office];

	$fill = array_shift($content).array_shift($content).array_shift($content);

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
	fclose($handle);
//                                                       //
// MAIN////////////////////////////////////////////////////
	do{
		echo "\n\n";
		printTable($fNameTitle, $fNameTitle, $lNameTitle, $salesTitle, $employees, $data);
		echo "Menu:\n";
		echo "(S)ort\n";
		echo "(A)dd employee\n";
		echo "(R)emove employee\n";
		echo "(Q)uit - q\n";
		$resp = strtolower(trim(fgets(STDIN)));
		if ($resp != 'q' && ($resp == 's' || $resp == 'a' || $resp == 'r')){
			echo "\nYou may (q)uit or go (b)ack at any point.\n";

			if ($resp == 's'){
				echo "\nWhat would you like to sort by?\n";
				echo "Employee (n)umber, (f)irst name, (l)ast name, or (s)alse? ";
				$resp = strtolower(trim(fgets(STDIN)));
				echo "Would you like to sort by (h)ighest or (l)owest? ";
				$order = strtolower(trim(fgets(STDIN)));
			}
			elseif ($resp == 'a'){
				do{
					echo "\nWhat is the first name of the new employee? ";
					$fName = trim(fgets(STDIN));
				}
				while(is_numeric($fName) && $fName != 'q' && $fName != 'b');


				if ($fName != 'q' && $fName != 'b'){
					do{
						echo "\nWhat is the last name of the new employee? ";
						$lName = trim(fgets(STDIN));
					}
					while (is_numeric($lName) && $lName != 'q' && $lName != 'b');


					if ($lName != 'q' && $lName != 'b'){
						do{
							echo "\nWhat is the employee's sale count? ";
							$sales = trim(fgets(STDIN));
						}
						while (!is_numeric($sales) && $sales != 'q' && $sales != 'b');
							if ($sales != 'q' && $sales != 'b'){
								$employees[count($employees)] = [
									'number' => count($employees) + 1,
									'fName' => $fName,
									'lName' => $lName,
									'sales' => $sales
								];
								write(count($employees).', '.$fName.', '.$lName.', '.$sales);
							}
							elseif($sales == 'q')
								$resp = 'q';
					}
					elseif($lName == 'q')
						$resp = 'q';
				}
				elseif($fName == 'q')
					$resp = 'q';
			}
			elseif ($resp == 'r'){
				do{
					echo "\nPlease enter the employee number that you'd like to remove: ";
					$resp = strtolower(trim(fgets(STDIN)));	
				}
				while (!is_numeric($resp) && $resp != 'q' && 'b');
				if ($resp != 'q' && $resp != 'b'){
					if (!$rmvEmployee($resp)){
						echo "Could not find employee #{$resp}, and thus could not remove that employee.\n";
					}
					else{
						echo "Removed employee #{$resp}.\n";
					}
				}
			}
		}
	}
	while ($resp != 'q');
///////////////////////////////////////////////////////////