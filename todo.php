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
// Sort menu
function sort_menu($input, $array) {
    echo '(A)-Z, (Z)-A, (O)rder entered, (R)everse order entered : ';
        $keypress = get_input();
        if ($keypress == 'a') {
            asort($array);
        } elseif ($keypress == 'z') {
            arsort($array);
        } elseif ($keypress =='o') {
            ksort($array);
        } elseif ($keypress == 'r') {
            krsort($array);
        } return $array;
}

function open_file($file_name) {
    $handle = fopen("$file_name", 'r');
    $content = trim(fread($handle, filesize("$file_name")));
    fclose($handle);
    $more_items = explode("\n", $content);
    return $more_items;
}

//////////////////////////////Execution begins////////////////////////////////// 
 // The loop!
 do {
     // Echo the list produced by the function
     echo list_items($items);

     // Show the menu options
     echo '(N)ew item, (R)emove item, (Q)uit, (S)ort, (O)pen : ';

     // Get the input from user
     // Use trim() to remove whitespace and newlines
     $input = get_input(TRUE);

     // Check for actionable input
     if ($input == 'N') {
         // Ask for entry
         echo 'Enter item: ';
         // Add entry to list array
          $items[] = get_input();
     } elseif ($input == 'O') {
        echo "Please specify file location: ";
        $file = get_input();
        $addl_items = open_file($file);
        $items = array_merge($items, $addl_items);
     } elseif ($input == 'R') {
         // Remove which item?
         echo 'Enter item number to remove: ';
         // Get array key
         $key = get_input();
         $key--;
         // Remove from array
         unset($items[$key]);
    // Make a sort menu function!
     } elseif ($input == 'S') {
        $items = sort_menu($input, $items);
     } elseif ($input == 'F') {
        array_shift($items);
     } elseif ($input == 'L') {
         array_pop($items);
     }

 // Exit when input is (Q)uit
 } while ($input != 'Q');

 // Say Goodbye!
 echo "Goodbye!\n";

 // Exit with 0 errors
 exit(0);