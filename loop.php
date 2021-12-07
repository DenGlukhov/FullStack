<?php
$temperature = -50;
while ($temperature <= 50) {
    $celcius = round(($temperature - 32) * 5 / 9, 2);
    echo "Температура: $temperature °F : $celcius °С" . '<br>';
    $temperature++;
}