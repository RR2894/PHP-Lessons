<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task01: Positive Numbers</title>
</head>

<body>

    <?php

    if (!is_numeric($_POST["inputNumber"])) {
        echo "It's not an integer";
    } elseif ($_POST["inputNumber"] < 0 ) {
        echo "It's not a positive number";
    } else {
        for ($i = 0; $i <= $_POST["inputNumber"]; $i += 2) {
            echo $i . "<br>";
        }
    }
    ?>

</body>

</html>