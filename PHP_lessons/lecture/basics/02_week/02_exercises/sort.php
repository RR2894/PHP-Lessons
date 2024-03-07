<?php
$customersAges = [5, 6, 3, 5, 2, 7, 8, 9, 9, 12];
$customers_sorted = $customersAges;
sort($customers_sorted);
$lastCustomer = count($customers_sorted) - 1;
// or
// $lastCustomer = end($customers_sorted);
print var_dump($customers_sorted);
print "Youngest is $customers_sorted[0] years old";
print "Oldest is $lastCustomer ";