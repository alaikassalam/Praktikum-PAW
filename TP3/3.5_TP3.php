<?php
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665"),
);
for ($row =0; $row < 3; $row++){
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col= 0; $col<3; $col++){
    echo "<li>".$students[$row][$col]."</i>";
    }
    echo "</ul>";
}

echo "<br>";
echo "===========================================";
echo "<br>";

//3.5.1
array_push($students,
    array("Dio", "230411", "0812345670"),
    array("Eka", "230412", "0812345671"),
    array("Fioni", "230413", "0812345672"),
    array("Gita", "230414", "0812345673"),
    array("Hana", "230415", "0812345674"),
);
var_dump($students);

echo "<br>";
echo "===========================================";
echo "<br>";

// 3.5.2
echo "<table border='1' style='border-collapse: collapse;'>";
echo "<tr><th>Name</th><th>NIM</th><th>Mobile</th></tr>"; // Header tabel

for ($row = 0; $row < count($students); $row++) {
    echo "<tr>";
    for ($col = 0; $col < 3; $col++) {
        echo "<td>" . $students[$row][$col] . "</td>"; 
    }
    echo "</tr>"; 
}
echo "</table>";
?>