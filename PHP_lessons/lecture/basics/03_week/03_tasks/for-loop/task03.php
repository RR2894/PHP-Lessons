<?php

/*
Task 3: Loop inside a loop (optional)

You can also put a loop inside another loop. This is called a nested loop. Make a program to print the following pattern, using nested for loop.

*  
* *  
* * *  
* * * *  
* * * * *

Hint: The upper limit of the inner loop is the current value of the outer loop. So while the “row” is 1, the inner loop prints one star, etc.
*/
$maxthing = 10;
// for ($row = 1; $row <= $maxthing; $row++) {
//     for ($column = 1; $column <= $row; $column++) {
//         print "* ";
//     }
//     print "\n";
// } 

print "\n";

for ($row = 1; $row <= $maxthing; $row++) {
    for ($i = 0; $i < $row - 1; $i++) {
        print " ";
    }

    for ($column = $row; $column <= $maxthing; $column++) {
        print "* ";
    }
    print "\n";

}

