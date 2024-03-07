<?php

$cars = ['Volvo', 'BMW', 'Toyota'];
print $cars[1] . "\n";  // BMW
$cars[1] = 'Ford';
print var_dump($cars);

// Defining Arrays
$list01 = [1, 2, 4];
$list01 = array(1, 2);

$words = [];
$words[13] = 'Business';
$words["42"] = 'College';  //42 will change to number
$words['Helsinki'] = 'Helsinki';  // index is a string
print var_dump($words);
print $words[0];  // undefined array key

// Associative Arrays
$sales = [
    "January" => 123,
    "February" => 234,
    "March" => 345,
];
$sales["May"] = 567;


// Arrays can hold values of any type:
$list = [1, 'test'];
$list = [1, [2, 'test']];
$list = ['a', 'b'];
$list[0]; //'a' --the index starts at 0
$list[1]; //'b'

$list = ['a', 'b'];
$list[] = 'c';
/*
$list == [
  "a",
  "b",
  "c",
]
*/


// array_unshift() to add the item at the beginning of the array
$list = ['b', 'c'];
array_unshift($list, 'a');
/*
$list == [
  "a",
  "b",
  "c",
]
*/

$list = ['a', 'b'];
count($list); //2
in_array('b', $list); //true
array_search('b', $list); //1

// removing items in an array
$foobar = "foobar \n";
print $foobar;
$unset($foobar);
print $foobar;