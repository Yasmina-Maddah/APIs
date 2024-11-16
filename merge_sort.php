<?php
function mergeSort($arr) {
    if (count($arr) <= 1) {
        return $arr;
    }
    $middle = floor(count($arr) / 2);
    $left = array_slice($arr, 0, $middle);
    $right = array_slice($arr, $middle);

    $left = mergeSort($left);
    $right = mergeSort($right);

    return merge($left, $right);
}

function merge($left, $right) {
    $result = [];
    $i = $j = 0;

    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] <= $right[$j]) {
            $result[] = $left[$i];
            $i++;
        } else {
            $result[] = $right[$j];
            $j++;
        }
    }

    while ($i < count($left)) {
        $result[] = $left[$i];
        $i++;
    }

    while ($j < count($right)) {
        $result[] = $right[$j];
        $j++;
    }

    return $result;
}

$unsortedArray = [38, 27, 43, 3, 9, 82, 10];
$sortedArray = mergeSort($unsortedArray);

echo "Unsorted Array: " . implode(", ", $unsortedArray) . "\n";
echo "Sorted Array: " . implode(", ", $sortedArray) . "\n";
?>