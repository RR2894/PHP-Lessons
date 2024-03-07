<?php
    $file_path = 'poem.txt';
    // if the form has been sent, add the new verse to the file
    if(isset($_POST['new-verse'])) {
        $new_verse = $_POST['new-verse'];
        file_put_contents($file_path, $new_verse . PHP_EOL, FILE_APPEND);
    }
    /* This code block above checks if the form has been submitted by checking if the new-verse field is present in the $_POST superglobal array.

    If the form has been submitted (isset($_POST['new-verse']) returns true), it retrieves the value of the new-verse field from the $_POST array and assigns it to the variable $new_verse.
    
    It then appends the new verse ($new_verse) to the file specified by $file_path using the file_put_contents() function. The PHP_EOL constant represents the end-of-line character, ensuring that each verse is appended on a new line. The FILE_APPEND flag ensures that the content is added to the end of the file without overwriting existing content. */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write a poem</title>
</head>
<body>
    <h3>Write a poem</h3>

    <div id="poem">
        <?php
            // read the poem from file and display here
            if(file_exists($file_path)) {
                // Read the contents of the file and display each verse
                $poem_content = file_get_contents($file_path);
                echo nl2br($poem_content); // Use nl2br() to preserve line breaks
            } else {
                echo "Start writing your poem!";
            }

            /* This part of the code above is HTML markup mixed with PHP code. It represents the structure of an HTML document.
    
            Inside the <div id="poem"> element, there's PHP code that checks if the file specified by $file_path exists. If it does, the contents of the file are read using file_get_contents() and displayed. The nl2br() function is used to convert newline characters to <br> tags, preserving line breaks in HTML.
    
    
            The form allows users to input a new verse in a textarea field and submit it using the "Add verse" button. The form's action attribute points to the current script (write_poem.php), indicating that form submission should be handled by the same script.
    
    
            When the form is submitted, the PHP code at the top processes the input and appends the new verse to the file specified by $file_path.
    
    
            If the file doesn't exist, a message "Start writing your poem!" is displayed in place of the poem content. */

        ?>
    </div>

    <form action="write_poem.php" method="post">
        <textarea name="new-verse" rows="3" cols="50"></textarea><br>
        <input type="submit" name="add-to-poem" value="Add verse">
    </form>
    
</body>
</html>