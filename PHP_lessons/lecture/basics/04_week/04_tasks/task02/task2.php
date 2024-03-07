<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
</head>

<body>
    <?php
    // Check that all the fields are filled and that the passwords match
    // If everything is ok show a personalized Welcome message
    // If something is wrong show a link back to the form

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        

        if (empty($name) || empty($email) || empty($password1) || empty($password2) ) {
            echo "All fields are required!<br>";
            echo "<a href='task2.html'>Back to the form</a>";
        } elseif ($password1 != $password2) {
            echo "Passwords do not match!<br>";
            echo "<a href='task2.html'>Back to the form</a>";
        } else {
            echo "Welcome, " . $name . "!";
        }
    
    ?>

</body>

</html>