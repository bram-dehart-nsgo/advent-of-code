<?php
$input = file_get_contents('./input.txt');
$inputArray = preg_split('/\r\n|\n|\r/', $input);

$totalSum = 0;
foreach ($inputArray as $value) {
    if (empty($value)) {
        continue;
    }

    $pair = preg_split('/,/', $value);
    $pair = [
        preg_split('/-/', $pair[0]),
        preg_split('/-/', $pair[1])
    ];
    if (fullyIn($pair[0], $pair[1])) {
        $totalSum++;
    }
//    echo "fully in: " . fullyIn($pair[0], $pair[1]) . '<br>';
}

echo $totalSum;

function fullyIn($first, $second) {
    return ($first[0] >= $second[0] && $first[1] <= $second[1]) ||
        ($second[0] >= $first[0] && $second[1] <= $first[1]);
}
