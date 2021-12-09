<?php
$temperature = -50;
while ($temperature <= 50) {
    $celsius = round(($temperature - 32) * 5 / 9, 2);
    echo "Температура: $temperature °F : $celsius °С" . '<br>';
    $temperature++;
}