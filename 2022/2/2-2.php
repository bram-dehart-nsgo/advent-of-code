<?php

$scores = [
    'A' => [
        'X' => 3 + 0, // lose
        'Y' => 1 + 3, // draw
        'Z' => 2 + 6 // win
    ],
    'B' => [
        'X' => 1 + 0, // lose
        'Y' => 2 + 3, // draw
        'Z' => 3 + 6 // win
    ],
    'C' => [
        'X' => 2 + 0, // lose
        'Y' => 3 + 3, // draw
        'Z' => 1 + 6 // win
    ]
];

$input = file_get_contents('./input.txt');
$array = preg_split('/\r\n|\n|\r/', $input);

$total = 0;
foreach ($array as $key => $value) {
    if (!empty($value)) {
        $moves = explode(" ", $value);
        $total += $scores[$moves[0]][$moves[1]];
    }
}

var_dump($total);
