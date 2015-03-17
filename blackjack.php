<?php
// complete all "todo"s to build a blackjack game
// create an array for suits
$suits = ['♣', '♥', '♠', '♦'];
// create an array for cards
$cards = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

function buildDeck($suits, $cards) {
	// build a deck (array) of cards
	// card values should be "VALUE SUIT". ex: "7 H"
	// make sure to shuffle the deck before returning it
  $newDeck = [];
  foreach($suits as $s){
  	foreach($cards as $c){
  		array_push($newDeck, [$c, $s]);
  	}
  }
  shuffle($newDeck);
  return $newDeck;
}

function cardIsAce($card) {
	// determine if a card is an ace
	// return true for ace, false for anything else
  if ($card[1] == 'A'){
  	return true;
  }
  else{
  	return false;
  }
}

function getCardValue($card) {
	// determine the value of an individual card (string)
	// aces are worth 11
	// face cards are worth 10
	// numeric cards are worth their value
  $val = $card[0];
  if (is_numeric($val)){
  	return (int)$val;
  }
  elseif($val != 'A'){
  	return 10;
  }
  else{
  	return 11;
  }
}

function getHandTotal($hand) {
	// get total value for a hand of cards
	// don't forget to factor in aces
	// aces can be 1 or 11 (make them 1 if total value is over 21)
	$tot = 0;
	$numAces = 0;
  foreach($hand as $card){
  	$tot += getCardValue($card);
  	if (getCardValue($card) == 11){
  		$numAces++;
  	}
  }
  if ($tot <= 21){
  	return $tot;
  }
  else{
  	while ($tot > 21 && $numAces > 0){
  		$tot -= 11;
  		$numAces--;
  	}
  	return $tot;
  }
}

function drawCard(&$hand, &$deck) {
	// draw a card from the deck into a hand
	// pass by reference (both hand and deck passed in are modified)
 	array_push($hand, $deck[0]);
 	array_shift($deck);
}

function echoHand($hand, $name, $hidden = false, $line = 0) {
	// print out a hand of cards
	// name is the name of the player
	// hidden is to initially show only first card of hand (for dealer)
	// output should look like this:
	// Dealer: [4 C] [???] Total: ???
	// or:
	// Player: [J D] [2 D] Total: 12

	$hide = 0;
	echo "$name: \n";
  	foreach ($hand as $card) {
	  	switch ($line){
	  		case(0):
	  			echo " ____  ";
	  			break;
		  	case(1):
			  	if ($card[0 == 10])
			  		echo "|{$card[0]} {$card[1]}  | ";
			  	else
			  		echo "|{$card[0]}    | ";
		  		break;
		  	case(2):
		  		if ($card[0] == 2){
		  			echo "|  {$card[1]}  | ";
		  		}
		  		elseif ($card[0 < 8]){
			  		echo "| {$card[1]} {$card[1]} | ";
			  	}
			  	elseif ($card[0] == 8 || $card[0] == 9 || $card[0] == 10){
			  		echo "|{$card[1]} {$card[1]} {$card[1]}| ";
			  	}
			  	elseif ($card[0] == 'J') {
			  		# code...
			  	}
			  	elseif ($card[0] == 'Q') {
			  		# code...
			  	}
			  	elseif ($card[0] == 'K') {
			  		# code...
			  	}
			  	elseif ($card[0] == 'A') {
			  		# code...
			  	}
		  		break;
		  	case(3):
		  		if ($card[0] < 5){
		  			echo "|     |";
		  		}
		  		elseif ($card[0] == 5){
		  			echo "|  {$card[1]}  | ";
		  		}
		  		elseif ($card[0] == 6 || $card[0] == 8){
			  		echo "| {$card[1]} {$card[1]} | ";
			  	}
			  	elseif ($card[0] == 7 || $card[0] == 9 || $card[0] == 10){
			  		echo "|{$card[1]} {$card[1]} {$card[1]}| ";
			  	}
			  	elseif ($card[0] == 'J') {
			  		# code...
			  	}
			  	elseif ($card[0] == 'Q') {
			  		# code...
			  	}
			  	elseif ($card[0] == 'K') {
			  		# code...
			  	}
			  	elseif ($card[0] == 'A') {
			  		# code...
			  	}
		  		break;
		  	case(4):
		  		if ($card[0] < 4){
		  			echo "|  {$card[1]}  | ";
		  		}
		  		elseif ($card[0 < 8]){
			  		echo "| {$card[1]} {$card[1]} | ";
			  	}
			  	elseif ($card[0] == 8 || $card[0] == 9 || $card[0] == 10){
			  		echo "|{$card[1]} {$card[1]} {$card[1]}| ";
			  	}
			  	elseif ($card[0] == 'J') {
			  		# code...
			  	}
			  	elseif ($card[0] == 'Q') {
			  		# code...
			  	}
			  	elseif ($card[0] == 'K') {
			  		# code...
			  	}
			  	elseif ($card[0] == 'A') {
			  		# code...
			  	}
		  		break;
		  	case(5):
	  			echo "|    {$card[0]}| ";
		  		break;
		  	default:
	  			echo " ____  ";
		  		break;
		}
  	}	
  if (!$hidden)
  	return $resp."Total: ".getHandTotal($hand);
  else 
  	return $resp;
}

function printline($interior = ""){
	$line = "";
	if ($interior == "border"){
		for ($i = 0; $i < 86; $i++){
			echo "~";
		}
		echo "\n";
	}
	else{
		$mid = 84 - count($interior);
		$line = $line."~";
		for ($i = 0; $i < $mid/3; $i++){
			$line = $line." ";
		}
		$line = $line.$interior;
		for ($i = 0; $i < $mid/3; $i++){
			$line = $line." ";
		}
		echo $line."~\n";
	}
}

function printTable($dealerHand, $playerHand, $dealerHide = true){
	printline("border");

	printline(echoHand($dealerHand, "Dealer", $dealerHide));

	for($i = 0; $i < 21; $i++){
		printline();
	}
	printline(echoHand($playerHand, "Player"));

	printline("border");
}

function turns(&$turns, &$deck){
	if (getHandTotal($turns["Dealer"]) == 21){
		printTable($turns["Dealer"], $turns["Player 1"]);
	}
	else{
		$numPlayers = count($turns)-1;
		for($i = 1; $i <= $numPlayers; $i++){
			do{
				$done = false;
				$resp;
				// If a player is dealt a blackjack, notify them.
				if (getHandTotal($turns["Player $i"]) == 21 && count($turns["Player $i"]) == 2){
						printTable($turns["Dealer"], $turns["Player 1"]);
						echo "Blackjack! Hit enter to continue. ";
						fgets(STDIN);
						$done = true;
					}
				else{
					do{
						printTable($turns["Dealer"], $turns["Player 1"]);
						echo "Player $i, would you like to hit, or stay? ";
						$resp = strtolower(trim(fgets(STDIN)));
					}
					while ($resp != 'h' && $resp != 's' && $resp != 'hit' && $resp != 'stay');
					if ($resp == 'stay' || $resp == 's'){
						$done = true;
					}
					else{
						drawCard($turns["Player $i"], $deck);
						printTable($turns["Dealer"], $turns["Player 1"]);
						if (getHandTotal($turns["Player $i"]) > 21){
							echo "You busted. Hit enter to continue. ";
							fgets(STDIN);
							$done = true;
						}
					}
				}
			}
			while(!$done);
		}

		do{
			$done = false;
			printTable($turns["Dealer"], $turns["Player 1"], false);
			if (getHandTotal($turns["Dealer"]) >= 16){
				$done = true;
				if (getHandTotal($turns["Dealer"]) > 21){
					echo "The Dealer busted!\n";
				}
			}
			else{
				echo "Dealer drawing...";
				drawCard($turns["Dealer"], $deck);
				sleep(1);
			}

		}
		while(!$done);
	}
}

function findWinner($players){
	$results = [];
	$dealer = getHandTotal($players["Dealer"]);
	for ($i = 1; $i <= count($players) -1; $i++){
		$playerTot = getHandTotal($players["Player $i"]);
		if ($playerTot > $dealer && $playerTot < 22){
			$results ["Player $i"] = "won";
		}
		else if ($playerTot > 21 || $playerTot < $dealer){
			$results ["Player $i"] = "lost";
		}
		else
			$results["Player $i"] = "pushed";
	}
	return $results;
}

function checkBlackJack(){
	$dealerBJ = false;
	foreach ($turn as $key => $val){
		if (getHandTotal($val) == 21){
			$printTable($turn["Dealer"], $turn["Player 1"]);
			echo "$key, you have a blackjack! Hit enter to continue. ";
			fgets(STDIN);
			if ($key == "Dealer"){
				$dealerBJ = true;
			}
		}
	}
	return $dealerBJ;
}

function printResults($results){
	echo "Player 1 {$results['Player 1']}";
	if (count($results) >= 3){
		for ($i = 2; $i <= count($results); $i++){
			echo ", Player $i {$results['Player $i']}";
		}
	}
	echo ". ";
}

do{

	$dealer = [];
	$player = [];
	$deck = buildDeck($suits, $cards);

	

	drawCard($player, $deck);
	drawCard($dealer, $deck);

	drawCard($player, $deck);
	drawCard($dealer, $deck);	

	$turn = ["Player 1" => $player, "Dealer" => $dealer];
	$play = false;

	
	if (checkBlackJack()){
		$printTable($turn["Dealer"], $turn["Player 1"]);
		echo "Dealer had blackjack.";
	}
	else
		turns($turn, $deck);
	printResults(findWinner($turn));
	echo "Would you like to play again? ";
	$resp = strtoupper(trim(fgets(STDIN)));
	if ($resp == 'Y' || $resp == 'YES'){
		$play = true;
	}
	else{
		$play = false;
	}
}
while($play);