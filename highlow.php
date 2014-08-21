<?php

// cpu picks a random number
// prompt to pick a number
// user sees higher/lower according to guess
// correct guess leads to game over

if ($argc == 3) {
	$low = $argv[1];
	$high = $argv[2];
	$answer = mt_rand($low, $high);
} else {
	$answer = mt_rand(1, 100);
}

$guesses = 1;

fwrite(STDOUT, "Let's play a game. Guess what number I am thinking of.\n");

$user_guess = fgets(STDIN);

while ($user_guess != $answer) {
	// prompt user for another answer
	// capture stdin
	$guesses++; //tracks guesses for use later

	if ($user_guess > $answer) {
		echo "Lower.";
	}
	
	elseif ($user_guess < $answer) {
		echo "Higher.";
	}
	
	fwrite(STDOUT, " Guess again.\n");
	$user_guess = fgets(STDIN);

} // end while statement

		echo "Good guess!\n";
		echo "It took you $guesses tries to figure me out.";
?>