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

    $pair = [
        toRangeArray(intval($pair[0][0]), intval($pair[0][1])),
        toRangeArray(intval($pair[1][0]), intval($pair[1][1]))
    ];

     if (count(array_intersect($pair[0], $pair[1])) > 0) {
         $totalSum++;
     }

//    var_dump($intersections);
//    die();
}

echo $totalSum;

function toRangeArray($num1, $num2) {
    $array = [];
    for ($num1; $num1 <= $num2; $num1++) {
        $array[] = $num1;
    }
    return $array;
}
function overlaps($first, $second) {
    return ($first[0] >= $second[0] && $first[0] <= $second[1]) ||
        ($second[0] >= $first[0] && $second[1] <= $first[1]);
}
