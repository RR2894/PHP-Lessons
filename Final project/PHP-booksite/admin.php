<?php
    // If the user is not logged in, redirect them back to login.php.

    session_start();

    if(!isset($_SESSION["login"])) {
        header("Location: login.php");
        die;
    }

    $json = file_get_contents("books.json");
    $books = json_decode($json, true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Favorite Books</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="booksite.css">
</head>
<body>
    <div id="container">
        <header>
            <h1>Your Favorite Books</h1>
        </header>
        <nav id="main-navi">
        <ul>
                <li><a href="admin.php">Admin Home</a></li>
                <li><a href="addbook.php">Add a New Book</a></li>
                <li><a href="login.php?logout">Log Out</a></li>
            </ul>
        </nav>
        <main>
            <h2>All Books</h2>
            <?php
                // This is almost identical to booksite.php (minus the genres). Make sure to print the correct id to the delete form.
                foreach ($books as $book) {
                    $id = $book['id'];
                    $title = $book["title"];
                    $author = $book["author"];
                    $publishing_year = $book["publishing_year"];
                    $description = $book["description"]; ?>
                    <section class="book">
                    <form class="deleteform" action="deletebook.php" method="post">
                    <input type="hidden" name="bookid" value="<?php print $id; ?>">
                    <input type="submit" name="deletebook" value="Delete">
                    </form>
            <h3><?php print $title; ?></h3>
            <p class="publishing-info">
                <span class="author"><?php print $author; ?></span>,
                <span class="year"><?php print $publishing_year; ?></span>
            </p>
            <p class="description">
                <?php print $description; ?>
            </p>
        </section>

            <?php } 
            
            ?>
            
        </main>
    </div>    
</body>
</html>