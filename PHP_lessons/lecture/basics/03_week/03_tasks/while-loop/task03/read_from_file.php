<?php
// open the file - if it fails, terminate the program
$myfile = fopen(__DIR__ . "/datafile.txt", "r") or die("Unable to open file!");

$number = 1;

// "feof" means "file: end-of-file", so loop while we haven't reached the end of file yet
while (!feof($myfile)) {
    // let's get one line and put it into the variable $line
    $line = fgets($myfile);
    // YOUR TURN! Print that line to console.
    print "$number: $line";
    $number++;
}
fclose($myfile);