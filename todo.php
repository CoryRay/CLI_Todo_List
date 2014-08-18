<?php

// create array to hold list of todo items
$items = array();
// The loop!
	echo "Welcome to my TODO list!" . PHP_EOL;
do {
	// iterate each item
	foreach ($items as $key => $item) {
		// display each item and a newline
		echo "\t" . ($key + 1) . ". $item" . PHP_EOL;
	}
		echo "---------------------" . PHP_EOL;

	// show the menu options
	echo "Magic Words: (N)ew item, (R)emove item, (Q)uit : ";

	// get the unput from user
	// use trim() to remove whitespaces and add newlines
	$input = ucfirst(trim(fgets(STDIN)));

	// check for actionable input
	if ($input == 'N') {
		// ask for entry
		echo 'Enter item: ';
		// add entry to list array
		$items[] = trim(fgets(STDIN));
	} elseif ($input == "R") {
		// Remove which item?
		echo 'Enter item number to remove: ' . PHP_EOL;
		 // Get array key
        $key = trim(fgets(STDIN));
		// remove from array
		unset($items[$key]);
		// yells at user for trying to beat the system
	} elseif ($input != "Q") {
		echo "PERMISSION DENIED....and...." . PHP_EOL;
		usleep(500000);
		// // easter egg
		// for ($i=0; $i > -42; $i++) { 
		// 	echo "YOU DIDNT SAY THE MAGIC WORD!" . PHP_EOL;
		//}
	}
// exit when input is (Q)uit
} while ($input !='Q');

// Say goodbye!
echo "Goodbye!" . PHP_EOL;

// Exit with 0 errors
exit(0);