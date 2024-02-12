<?php
$foo = "This is a string";
$bar = " and another string";
$logLine = "2024-01-16,14:00,Helsinki,-14";
// print strlen($foo . $bar);
// print strpos($foo, 'is');
// print strToUpper($foo);
// print strToLower($foo);
// $baz = str_replace('This', 'That', $foo);
// print $foo . $bar . "\n";
// print 'HHH' . trim($bar) . 'HHH';
// trim(strtolower($serchString));
print var_dump(explode(',', $logLine));
print var_dump(explode(' ', $foo));