<?php
$matkul = array("PTI","ALPRO","DPW","STRUKDAT","JARKOM","PAW","PSBF","RPL");
$praktikum = array("JARKOM","PAW");

for($i = 0; $i < count($matkul);$i++){ 
    if($matkul[$i] == $praktikum[0] or $matkul[$i] == $praktikum[1]){
        echo "Saya sedang mengambil matkul $matkul[$i] termasuk praktikum nya";
    }elseif($i == 6 or $i == 7){
        echo "Saya belum mengambil matkul $matkul[$i]"; 
    }else{
        echo "Saya sudah mengambil matkul $matkul[$i] semester lalu";
    };
    echo"<br>";
};    



?>