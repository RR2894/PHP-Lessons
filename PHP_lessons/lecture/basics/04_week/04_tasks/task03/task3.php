<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
</head>

<body>
    <?php
        $name = $email = $password1 = $password2 = $gender =  '';
        
        // handle the submit
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            echo var_dump($_POST);

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            $gender = $_POST['gender'];
        
            if (empty($name) || empty($email) || $password1 == '' || empty($password2) ) {
                echo "All fields are required!<br>";
            } elseif ($password1 != $password2) {
                echo "Passwords do not match!<br>";
            } else {
                echo "Welcome, " . $name . "!";
                echo "Gender is ". $gender;
                // To do
                // print the values of variable $name, $email,
                // $password1 and $gender here on the page
            };
        };
    
    ?>
    <form action="task3.php" method="post">
        Name: <input name="name" value="<?php echo $name;?>" /> <br>
        Email: <input name="email" type="email" value="<?php echo $email;?>" /> <br>
        Password: <input name="password1" type="password" value="<?php echo $password1;?>" /> <br>
        Repeat password: <input name="password2" type="password" value="<?php echo $password2;?>" /> <br>


        <!-- 
            TODO:
            Add radio buttons for gender information
            male female other (+ fill in text field)
            if the user selected other handle the fill in field.
            In any case save the gender info to variable $gender as a string. 

        -->
        <p>Please select your gender:</p>
        <input type="radio" name="gender" id="male" value="Male">
        <label for="male">Male</label><br>
        <input type="radio" name="gender" id="female" value="Female">
        <label for="female">Female</label><br>
        <input type="radio" name="gender" id="other" value="Other">
        <label for="other">Other </label>
        <input type="text" name="gender_other" for="other" value="<?php echo $gender;?>">

        <br><br>


        <button type="submit">Register</button>

    </form>

</body>

</html>