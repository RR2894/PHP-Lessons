<?php
$page_title = "Example page";
$author = "Damien Kuosmanen";
$contents = "This is an example paragraph";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php print $page_title; ?>
    </title>
</head>

<body>
    <h1>
        <?php print $page_title; ?>
    </h1>

    <?php
    for ($i = 0; $i < 3; $i++) { ?>
        <p>
            <?php print $contents; ?>
        </p>
        <?php
    }
    ?>

</body>

</html>