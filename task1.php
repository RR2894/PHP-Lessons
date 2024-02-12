<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
<?php

    if (!is_numeric($_POST["number"])) {
        echo "It's not a number";
    } else if ($_POST["number"] <= 0 OR !is_integer((int)$_POST["number"])) {
        echo "It's not a positive integer";
    } else {
        for ($i = 0; $i <= $_POST['number']; $i = $i + 2 ) {
    echo $i, '<br>';
        }
    }
  
    //Make a program which asks for a positive number from the user
    // and rpints all even positive numbres until to the number the user gave. 

?>
</body>
</html>