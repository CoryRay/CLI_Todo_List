<?php

 // Create array to hold list of todo items
$items = [];

 // List array items formatted for CLI
function listItems($list)
{
    $listString = '';

    foreach ($list as $key => $value) {
        $listString .= "\t" . ($key + 1) . ". " . $value . PHP_EOL;
    }

     // Return string of list items separated by newlines.
    return $listString;
}

 // Get STDIN, strip whitespace and newlines,
 // and convert to uppercase if $upper is true
function getInput($upper = FALSE)
{
    if ($upper) {
        $input = ucfirst(trim(fgets(STDIN)));

    } else {
        $input = trim(fgets(STDIN));
    }

    // Return filtered STDIN input
    return $input;
}

function sortMenu($array)
{
    echo '(A)-Z, (Z)-A, (O)rder entered, (R)everse order entered : ';

    $keypress = getInput();

    switch ($keypress) {
        case 'a':
            asort($array);
            break;
        case 'z':
            arsort($array);
            break;
        case 'o':
            ksort($array);
            break;
        case 'r':
            krsort($array);
            break;
        default:
            break;
    }
    return $array;
}

function saveFile($saveLocation, $arrayToSave)
{
    $handle = fopen($saveLocation, 'w');
    $string = implode("\n", $arrayToSave);
    trim(fwrite($handle, $string));
}

/**
 * Execution Begins
 */

// The loop!
do {
    // Echo the list produced by the function
    echo listItems($items);

    // Show the menu options
    echo '(N)ew item, (R)emove item, (S)ort, (O)pen, S(A)ve, (Q)uit : ';

    // Get the input from user
    $input = getInput(TRUE);

    // Check for actionable input
    switch ($input) {
        case 'N':
            echo 'Enter item: ';

            // Add entry to list array
            $items[] = getInput();
            break;

        case 'O':
            echo "Please specify file location: ";
            $file = getInput();

            if (file_exists($file)) {
                $newItems = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                $items = array_merge($items, $newItems);

            } else {
                echo "This file does not exist." . PHP_EOL;
            }
            break;

        case 'R':
            echo 'Enter item number to remove: ';

            // Get array key and subtract 1
            $key = getInput() - 1;

            // Remove from array
            unset($items[$key]);
            break;

        case 'A':
            echo "Where do you want to save your file? ";
            $location = getInput();
            saveFile($location, $items);
            break;

        case 'S':
            $items = sortMenu($items);
            break;

        case 'F':
            array_shift($items);
            break;

        case 'L':
            array_pop($items);
            break;

        default:
            break;
    }

// Exit when input is (Q)uit
} while ($input != 'Q');

// Say Goodbye!
echo "Goodbye!" . PHP_EOL;

// Exit with 0 errors
exit(0);