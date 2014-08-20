<?php

 // Create array to hold list of todo items
 $items = array();

 // List array items formatted for CLI
 function list_items($list)
 {
    $list_string = '';
    
    foreach ($list as $key => $value) {
        $list_string .= "\t" . ($key + 1) . ". $value" . PHP_EOL;
    }

     // Return string of list items separated by newlines.
     // Should be listed [KEY] Value like this:
     // [1] TODO item 1
     // [2] TODO item 2 - blah
     // DO NOT USE ECHO, USE RETURN
     return $list_string;
 }

 // Get STDIN, strip whitespace and newlines, 
 // and convert to uppercase if $upper is true
 function get_input($upper = FALSE) {
    if ($upper == TRUE) {
        $input = ucfirst(trim(fgets(STDIN)));

}   else {
        $input = trim(fgets(STDIN));
    }
     return $input;

     // Return filtered STDIN input
 }

 // The loop!
 do {
     // Echo the list produced by the function
     echo list_items($items);

     // Show the menu options
     echo '(N)ew item, (R)emove item, (Q)uit, (S)ort : ';

     // Get the input from user
     // Use trim() to remove whitespace and newlines
     $input = get_input(TRUE);

     // Check for actionable input
     if ($input == 'N') {
         // Ask for entry
         echo 'Enter item: ';
         // Add entry to list array
         $items[] = get_input();
     } elseif ($input == 'R') {
         // Remove which item?
         echo 'Enter item number to remove: ';
         // Get array key
         $key = get_input();
         $key--;
         // Remove from array
         unset($items[$key]);
     } elseif ($input == 'S') {
        echo '(A)-Z, (Z)-A, (O)rder entered, (R)everse order entered : ';
        $input = get_input();
        if ($input == 'a') {
            asort($items);
        } elseif ($input == 'z') {
            arsort($items);
        } elseif ($input =='o') {
            ksort($items);
        } elseif ($input == 'r') {
            krsort($items);
        }
     }
 // Exit when input is (Q)uit
 } while ($input != 'Q');

 // Say Goodbye!
 echo "Goodbye!\n";

 // Exit with 0 errors
 exit(0);