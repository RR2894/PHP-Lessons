<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

</head>
<body>

    <?php
        $name = $email = $password1 = $password2 = $gender = '';
        // Handle the form submit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
 
            if ($name == '' OR $email == '' OR $password1 == '' OR $password2 == '' OR $gender == '') {
                echo "Please fill all the fields.";
            } elseif ($_POST['password1'] != $_POST['password2']) {
                echo "Passwords don't match.";
            } else {
                // Save the values to the database...
                echo "Welcome ", $_POST['name'];
            }

            if ($gender === "other") {
                    $gender = $_POST["otherGender"];
                    echo $gender;
        } 
    }
    ?>

    <form action="task3.php" method="post">
        Name:
        <input name="name" value="<?php echo $name;?>" /><br>
        Gender:
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender=="female") echo "checked";?>
        value="female">Female
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender=="male") echo "checked";?>
        value="male">Male
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender=="other") {} echo "checked";?>
        value="other">Other<br>
        Email:
        <input name="email" type="email" value="<?php echo $email;?>"/><br>
        Password:
        <input name="password1" type="password" value="<?php echo $password1;?>"/><br>
        Repeat password:
        <input name="password2" type="password" value="<?php echo $password2;?>"/><br>

        <button type="submit">Register</button>

        <!--

            TODO:
            Add radio buttons for gender information
            male female other (+ fill in text field)
            if the user selected other handle the fill in field.
            In any case save the gender info to variable $gender as a string. 

        -->

    </form>
</body>
</html>
