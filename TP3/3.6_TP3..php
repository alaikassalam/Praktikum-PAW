<?php
// 3.6.1
echo "array_push";
$array1 = ["a", "b", "c"]; 
array_push($array1, 4, 5, 6);
var_dump($array1);

echo "<br>";
echo "===========================================";
echo "<br>";

// 3.6.2 
echo "array_merge";
$array1 = ["a", "b", "c"]; 
$array2 = [4, 5]; 
$mergedArray = array_merge($array1, $array2); 
var_dump($mergedArray);

echo "<br>";
echo "===========================================";
echo "<br>";

// 3.6.3
echo "array_values";
$array = ["a" => 1, "b" => 2, "c" => 3];
$valuesArray = array_values($array); 
var_dump($valuesArray); 

echo "<br>";
echo "===========================================";
echo "<br>";

// 3.6.4
echo "array_search";
$array = ["Apel", "Pisang", "Anggur"]; 
$searchValue = "Anggur";
$searchResult = array_search($searchValue, $array); 
var_dump($searchResult);

echo "<br>";
echo "===========================================";
echo "<br>";

// 3.6.5
echo "array_filter";
$array = [1, 2, 3, 4, 5]; 
$filteredArray = array_filter($array, function($value) {
    return $value % 2 == 0; 
});
var_dump($filteredArray);

echo "<br>";
echo "===========================================";
echo "<br>";

// 3.6.6
echo "sort";
$array = [8, 7, 1, 4, 2];
sort($array); 
var_dump($array);
?>