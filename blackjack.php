<?php
// complete all "todo"s to build a blackjack game
// create an array for suits
$suits = ['C', 'H', 'S', 'D'];
// create an array for cards
$cards = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];
// build a deck (array) of cards
// card values should be "VALUE SUIT". ex: "7 H"
// make sure to shuffle the deck before returning it
function buildDeck($suits, $cards) {
  $deck = [];
  $deck_shuffled = [];
  foreach($suits as $s){
  	foreach($cards as $c){
  		$deck[count($deck)] = $c.$s;
  	}
  }
  $count = count($deck) - 1;
  while ($count > 0){
  	$rand = rand(0, $count);
  	$deck_shuffled[count($deck_shuffled)] = $deck[$rand];
  	array_splice($deck, 1, 1);
  	$count--;
  }
  return $deck_shuffled;
}
// determine if a card is an ace
// return true for ace, false for anything else
function cardIsAce($card) {
  if ($card[1] == 'A'){
  	return true;
  }
  else{
  	return false;
  }
}
// determine the value of an individual card (string)
// aces are worth 11
// face cards are worth 10
// numeric cards are worth their value
function getCardValue($card) {
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
// get total value for a hand of cards
// don't forget to factor in aces
// aces can be 1 or 11 (make them 1 if total value is over 21)
function getHandTotal($hand) {
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
// draw a card from the deck into a hand
// pass by reference (both hand and deck passed in are modified)
function drawCard(&$hand, &$deck) {
 	$hand[count($hand)] = $deck[0];
 	array_splice($deck, -1, 0);
}
// print out a hand of cards
// name is the name of the player
// hidden is to initially show only first card of hand (for dealer)
// output should look like this:
// Dealer: [4 C] [???] Total: ???
// or:
// Player: [J D] [2 D] Total: 12
function echoHand($hand, $name, $hidden = false) {
	$hide = 0;
	echo "{$name}: ";
  foreach ($hand as $card) {
  	$cardStr = "[{$card[0]} {$card[1]}] ";
  	if ($hidden && $hide != 0){
  		echo $cardStr;
  	}
  	else{
  		echo "[???] ";
  	}
  	$hide++;
  }
  echo "Total: ".getHandTotal($hand)."\n";
}
// build the deck of cards
$deck = buildDeck($suits, $cards);
echo "shuffled deck: \n";
print_r($deck);
// initialize a dealer and player hand
$dealer = [];
$player = [];
// dealer and player each draw two cards
// todo
// echo the dealer hand, only showing the first card
// todo
// echo the player hand
// todo
// allow player to "(H)it or (S)tay?" till they bust (exceed 21) or stay
// while (false) {
//   // todo
// 	$todo = false;
// }
// show the dealer's hand (all cards)
// todo
// todo (all comments below)
// at this point, if the player has more than 21, tell them they busted
// otherwise, if they have 21, tell them they won (regardless of dealer hand)
// if neither of the above are true, then the dealer needs to draw more cards
// dealer draws until their hand has a value of at least 17
// show the dealer hand each time they draw a card
// finally, we can check and see who won
// by this point, if dealer has busted, then player automatically wins
// if player and dealer tie, it is a "push"
// if dealer has more than player, dealer wins, otherwise, player wins