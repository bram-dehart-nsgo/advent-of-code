<?php

$scores = [
    'A' => [
        'X' => 1 + 3,
        'Y' => 2 + 6,
        'Z' => 3 + 0
    ],
    'B' => [
        'X' => 1 + 0,
        'Y' => 2 + 3,
        'Z' => 3 + 6
    ],
    'C' => [
        'X' => 1 + 6,
        'Y' => 2 + 0,
        'Z' => 3 + 3
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
