<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
echo "I like " . $fruits[0] . ", " . $fruits[1]. " and " . $fruits[2] . ".";
echo"<br><br>";

// 3.1.1 
array_push($fruits, "Apel", "Mangga", "Manggis", "Anggur", "Melon");
echo "array fruits setelah ditambah : ";
var_dump($fruits);
echo "Nilai dengan indeks tertinggi : " . end($fruits) . "<br>";
echo "Indeks tertinggi dari array : " . count($fruits) - 1;

echo "<br>";
echo "===========================================";
echo "<br>";

// 3.1.2 
unset($fruits[3]);
echo "array fruits setelah dihapus index tertentu : ";
$fruits = array_values($fruits);
var_dump($fruits);
echo "Nilai dengan indeks tertinggi : " . end($fruits) . "<br>";
echo "Indeks tertinggi dari array : " . array_key_last($fruits);

echo "<br>";
echo "===========================================";
echo "<br>";

//3.1.3 
$veggies = ["Bayam", "Wortel", "Sawi"];
echo "Isi array veggies :";
var_dump($veggies);
?>