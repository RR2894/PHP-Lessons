<?php

// starting program
print "Hello World\n";

// creating a new variable
$myName = "Alex";
print $myName;
print "\n$myName\n";

print var_dump($myName);

$x = "World";
print "Hello \n";


print "print does not require parentheses.";

// No newline or space is added; the below outputs "helloworld" all on one line
print "hello";
print "world";

print "This string spans
multiple lines. The newlines will be
output as well";

print "This string spans\nmultiple lines. The newlines will be\noutput as well.";

// The argument can be any expression which produces a string
$foo = "example";
print "foo is $foo"; // foo is example

$fruits = ["lemon", "orange", "banana"];
print implode(" and ", $fruits); // lemon and orange and banana

// Non-string expressions are coerced to string, even if declare(strict_types=1) is used
print 6 * 7; // 42

// Because print has a return value, it can be used in expressions
// The following outputs "hello world"
if ( print "hello" ) {
    echo " world";
}

// The following outputs "true"
( 1 === 1 ) ? print 'true' : print 'false';
