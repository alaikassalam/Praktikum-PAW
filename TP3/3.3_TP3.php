<?php
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");
echo "Andy is " . $height['Andy'] . " cm tall. <br><br>";

echo "<br>";
echo "===========================================";
echo "<br>";

// 3.3.1
$height["David"] = "180";
$height["Ropul"] = "175";
$height["Asep"] = "160";
$height["Alex"] = "168";
$height["Dina"] = "162";
echo "Data tinggi badan: ";
var_dump($height);
$lastIndex = array_key_last($height);
echo "Indeks terakhir dari array height adalah: $lastIndex dengan nilai tinggi badan: " . $height[$lastIndex] . "cm<br>";

echo "<br>";
echo "===========================================";
echo "<br>";

// 3.3.2
unset($height["Dina"]);
echo "Data tinggi badan setelah penghapusan: ";
var_dump($height);
echo "<br>";
$lastIndex = array_key_last($height);
echo "Indeks terakhir dari array \$height setelah penghapusan adalah: $lastIndex dengan nilai tinggi badan: " . $height[$lastIndex] . "cm<br>";

echo "<br>";
echo "===========================================";
echo "<br>";

// 3.3.3
$weight = array("Budi" => "70", "Beni" => "60", "Eko" => "40");
$keys = array_keys($weight);
echo "Data ke-2 dari array weight adalah: " . $weight[$keys[1]] . "kg<br>";
?>