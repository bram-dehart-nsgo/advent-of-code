<?php
$input = file_get_contents('./input.txt');
$inputArray = preg_split('/\r\n|\n|\r/', $input);

$totalSum = 0;
foreach ($inputArray as $value) {
    $half = strlen($value) / 2;
    $first = substr($value, 0, $half);
    $second = substr($value, $half, strlen($value));
    $arrayFirst = str_split($first);
    $arraySecond = str_split($second);
//    echo $value . '<br>';
//    echo $first . '<br>';
//    echo $second . '<br>';
    $common = implode(array_unique(array_intersect($arrayFirst, $arraySecond)));
//    echo $common . '<br>';
//    die();
    $totalSum += getPriority($common);
}

echo $totalSum;

function getPriority($input) {
    $alphabetArray = str_split('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
    foreach ($alphabetArray as $key => $value) {
        if ($input === $value) {
            return $key + 1;
        }
    }
    return null;
}
