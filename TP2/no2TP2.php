<?php
$matkul = array("PTI","ALPRO","DPW","STRUKDAT","JARKOM","PAW","PSBF","RPL");
$praktikum = array("JARKOM","PAW");

foreach ($matkul as $a) {
    switch( $a ) {
        case "PTI":
            echo"Saya suka $a";
            break;
        case "ALPRO":
            echo"Saya suka $a";
            break;
        case "DPW":
            echo"Saya suka $a";
            break;
        case "STRUKDAT":
            echo"Saya suka $a";
            break;
        case "JARKOM":
            echo"Saya suka $a";
            break;
        case "PAW":
            echo"Saya suka $a";
            break;
        default:
            echo "Saya tidak mengambil matkul $a";
            break;
    }
    echo"<br>";
}
?>