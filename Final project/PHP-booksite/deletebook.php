<?php
    // If the user is not logged in, redirect them back to login.php.
    session_start();
    if(!isset($_SESSION["login"])) {
        header("Location: login.php");
        die;
    }
    // Read the file into array variable $books:
    $json = file_get_contents("books.json");
    $books = json_decode($json, true);
    
    // Check the POST parameter "bookid". If it's set, delete the corresponding book from the data file.
    // Hint: array_diff will not work here, since you'd need to create the whole book "object". Find the index and use array_splice instead.

    if(isset($_POST['bookid'])) {
        $id = $_POST['bookid'];
        $index = array_search($id, array_column($books, 'id'));
        if($index !== false) {
            array_splice($books, $index, 1);
            // Once you have removed the book from the variable $books write it into the file.
            file_put_contents("books.json", json_encode($books));
            // Redirect back to admin.php.
            header("Location: admin.php");
            die;
        }
    }