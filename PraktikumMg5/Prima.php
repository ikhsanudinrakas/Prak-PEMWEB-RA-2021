<?php
    function prima($angka){
        for($i=1;$i<=$angka;$i++){
            $a=0;
            for($j=1;$j<=$i;$j++){
                if($i % $j == 0){
                    $a++;
                }
            }
            if($a == 2){
                echo $i. ' ';
            }
        }
    }
    $nilai=50;
    echo "Bilangan Prima antara 1-50 : <br>";
    echo prima($nilai);
?>