<?php
/*
Write a function called `checkAge` which will return true if the `age` is equal or over 18
Otherwise it returns false.
*/

/*
Write a function called boolToString, which returns string value "true" or "false"
based on boolean input.
*/



function checkAge($age)
{
    if (is_numeric($age) && $age >= 18) {
        return true;
    } else {
        return false;
    }
}

function boolToString($string)
{
    if ($string) {
        return 'true';
    }
    return 'false';
}


// examples:
print "Age 25 is " . boolToString(checkAge(25)) . "\n"; // true
print "Age -2 is " . boolToString(checkAge(-2)) . "\n"; // false
print "Age 'A' is " . boolToString(checkAge('A')) . "\n"; // false
print "Age 12345678 is " . boolToString(checkAge(12345678)) . "\n"; //true


