<?php
$matkul = array("PTI","ALPRO","DPW","STRUKDAT","JARKOM","PAW","PSBF","RPL");


for($i = 0; $i < count($matkul);$i++) {
    if($i == 6 or $i == 7) {
        echo "Saya tidak mengambil matkul $matkul[$i]"; 
    } else {
        echo "Saya suka $matkul[$i]";
    };
    echo"<br>";
}
?>