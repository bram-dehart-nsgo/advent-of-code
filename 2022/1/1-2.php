<?php
$input = file_get_contents('./input.txt');
$array = preg_split('/\r\n|\n|\r/', $input);

$current = 0;
$items = [0,0,0];

foreach ($array as $entry) {
    if (!empty($entry)) {
        $current += intval($entry);
    } else {
        $bigger_then = array_filter($items, function ($i) use ($current) {
            return $current > $i;
        });

        if (count($bigger_then) > 0) {
            $value = min($bigger_then);
            $items[array_search($value, $items)] = $current;
        }

        $current = 0;
    }
}

var_dump($items);
echo array_sum($items);
