<?php
    $burger = 4.95;
    $cocktail = 1.95;
    $cola = 0.85;

    $tips = 16;
    $nds = 7.5;

    $price = 2*$burger + 1*$cocktail + 1*$cola;

    $fullTips = ($price*$tips)/100;

    $fullNds = (($price/* + $tips*/)*$nds)/100;

    $fullPrice = $price + $fullTips + $fullNds;

        echo "Итого: " . $fullPrice . "$<br>";
      
        echo "Чаевые: " . $fullTips . "$<br>";
       
        echo "Налог: " . $fullNds . "$<br>";

        