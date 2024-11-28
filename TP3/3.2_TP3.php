<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
$arrlength = count($fruits);

// for ($x = 0; $x < $arrlength; $x++) {
//     var_dump($fruits[$x]); 
// }

echo "<br>";
echo "===========================================";
echo "<br>";

// 3.2.1
$newFruits = array("Apel", "Mangga", "Manggis", "Anggur", "Melon");

for ($i = 0; $i < count($newFruits); $i++) {
    $fruits[] = $newFruits[$i]; 
}

$arrlength = count($fruits);
for ($x = 0; $x < $arrlength; $x++) {
    var_dump($fruits[$x]);
}
echo "<br>";
echo "===========================================";
echo "<br>";

// 3.2.2
$veggies = ["Bayam", "Wortel", "Sawi"];
for ($x = 0; $x < count($veggies); $x++) {
    var_dump($veggies[$x]) . "<br>";
}
?>
