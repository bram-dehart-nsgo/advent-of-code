<?php
$input = file_get_contents('./input.txt');
$array = preg_split('/\r\n|\n|\r/', $input);

$highest = 0;
$current = 0;
foreach ($array as $entry) {
    if (!empty($entry)) {
        $current += intval($entry);
    } else {
        if ($current > $highest) {
            $highest = $current;
        }
        $current = 0;
    }
}

echo $highest;
