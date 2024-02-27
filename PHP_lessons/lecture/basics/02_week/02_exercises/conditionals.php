<?php
$age = 17;

if ($age >= 18) {
    print "Can vote \n";
    print " ";
} else {
    print "Can not vote \n";
}


$age = 29;
$nationality = 'Brazilian';

if ($age >= 20) {
    print "You are 20+";
} elseif ($nationality !== 'Finnish') {
    print "You can not vote \n";
} else {
    print "You are under 20";
}