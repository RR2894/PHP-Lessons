<?php
/*
Task01: Variables and basic datatypes

Create a variable named ´$age´ and assign it an integer value
Create a variable named ´$name´ and assign it a string value
Create a variable named ´$isStudent´ and assign it a booleanvalue
Use print to print each variable to the console.
Use the ´var_dump()´ function to check the data type of each variable and print the result using print
*/

$age = 29;
$name = "Adel";
$isStudent = true;

print "Age is: \"$age\"\n";
print "Name is: \"$name\"\n";
print "Is student: \"$isStudent\"\n";

print var_dump($age, $name, $isStudent);