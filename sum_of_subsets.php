<?php
function calculateCombinations($candidates, $target, $collection, &$result, $startIndex) {
	//the candidates meet the target requirement thus they are pushed to result array!
    if($target == 0) {
        array_push($result, $candidates);
        return;
    } else {
        for($index = $startIndex; $index < count($collection); $index++) {
            if($collection[$index] > $target) {
                return;
            }
            
            array_push($candidates, $collection[$index]);
            calculateCombinations($candidates, $target - $collection[$index], $collection, $result, $index + 1);
            array_pop($candidates); //Backtrack
        }
    }
}

$candidates = [];
$target = 21;
$collection = [16,6,11,5,10]; //Unsorted list
sort($collection, SORT_NUMERIC); //Collection must be sorted
$result = [];
calculateCombinations($candidates, $target, $collection, $result, 0);

print_r($result);
