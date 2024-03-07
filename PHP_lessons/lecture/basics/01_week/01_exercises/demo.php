<?php
$foo = "That is a string";
$bar = "another string";
$logLine = "2024-01-16, 14:00, Helsinki, -14";

// printing string
// print strlen($foo . $bar);

// search for string position
print strpos($foo, 'is');  // will return 5
print("\n");

$baz = str_replace("That", "This", "foo");
print "baz is $baz";
print("\n");
print($foo . $bar . "\n");

print var_dump(explode(' ', $foo));
print var_dump(explode(',', $logLine));

