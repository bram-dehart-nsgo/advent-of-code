<?php
$input = file_get_contents('./input.txt');
$inputArray = preg_split('/\r\n|\n|\r/', $input);

$totalSum = 0;
$groups = [];
$group = [];

foreach ($inputArray as $value) {
    if (count($group) === 3) {
        $groups[] = $group;
        $group = [];
    }

    $group[] = $value;
}

foreach ($groups as $group) {
    $common = implode(array_unique(array_intersect(
        str_split($group[0]),
        str_split($group[1]),
        str_split($group[2])
    )));

    $totalSum += getPriority($common);
}

//var_dump($groups);
//var_dump($inputArray);

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
