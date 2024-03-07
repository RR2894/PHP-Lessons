<?php

$number = "45.7";
print is_numeric($number);
print "\n";
print is_int($number);
print "\n";
print is_string($number);
print "\n";
print (float) $number + 5;


$minutes = 63;
$hours = (int) ($minutes / 60);
$extra_minutes = $minutes % 60;
print "$hours h $extra_minutes mins";
