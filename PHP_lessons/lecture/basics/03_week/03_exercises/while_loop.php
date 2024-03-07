<?php

$i = 1;
while ($i <= 10) {
    if ($i == 5) {
        $i++;
        continue;
    }
    print $i . "\n";
    $i++;
}

$j = 10;
while ($j >= 1) {
    print $j . "\n";
    $j--;
}