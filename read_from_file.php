<?php
// open the file - if it fails, terminate the program
$myfile = fopen("datafile.txt", "r") or die("Unable to open file!");

// "feof" means "file: end-of-file", so loop while we haven't reached the end of file yet
while(!feof($myfile)) {
    // let's get one line and put it into the variable $line
    $line = fgets($myfile);
    // YOUR TURN! Print that line to console.
    echo $line;
}
fclose($myfile);