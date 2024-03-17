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
                <li><a href="booksite.php">Home</a></li>
                <li><a href="booksite.php?genre=adventure">Adventure</a></li>
                <li><a href="booksite.php?genre=classic">Classic Literature</a></li>
                <li><a href="booksite.php?genre=coming-of-age">Coming-of-age</a></li>
                <li><a href="booksite.php?genre=fantasy">Fantasy</a></li>
                <li><a href="booksite.php?genre=historical">Historical Fiction</a></li>
                <li><a href="booksite.php?genre=horror">Horror</a></li>
                <li><a href="booksite.php?genre=mystery">Mystery</a></li>
                <li><a href="booksite.php?genre=romance">Romance</a></li>
                <li><a href="booksite.php?genre=scifi">Science Fiction</a></li>
            </ul>
        </nav>
        <main>
            <?php
                
                
                //Reads file into array varibable $books
                $books = json_decode(file_get_contents("books.json"), true);
                
                // Here you should display the books of the given genre (GET parameter "genre"). Check the links above for parameter values.
                // If the parameter is not set, display all books.
                $genre = $_GET['genre'] ?? null;
                
                $genre_books = [];
                foreach ($books as $book) {
                    if ($genre === null || ($book['genre']) === ($genre)) {
                        $genre_books[] = $book;
                    }
                }
                
                // Use the HTML template below and a loop (+ conditional if the genre was given) to go through the books in file  
                // You also need to check the cookies to figure out if the book is favorite or not and display correct symbol.
                // If the book is in the favorite list, add the class "fa-star" to the a tag with "bookmark" class.
                // If not, add the class "fa-star-o". These are Font Awesome classes that add a filled star and a star outline respectively.
                // Also, make sure to set the id parameter for each book, so the setfavorite.php page gets the information which book to favorite/unfavorite.
                

                
            ?>
            <h2>Genre Name or "All Books"</h2>
            <?php foreach($genre_books as $book): ?>
                <?php
                    $favorite_id = isset($_COOKIE['favorites']) ? explode(",", $_COOKIE['favorite_id']) : [];
                    $favorite_icon = in_array($book['id'], $favorite_id) ? "fa-star" : "fa-star-o";
                    
                ?>  
            <section class="book">
                <a class="bookmark fa <?php echo $favorite_icon?>" href="setfavorite.php?id=<?php echo $book["id"]?>"></a>
                <h3><?php echo $book["title"]?></h3>
                <p class="publishing-info">
                    <span class="author"><?php print $book["author"]?></span>,
                    <span class="year"><?php print $book["publishing_year"]?></span>
                </p>
                <p class="description">
                <?php print $book["description"]?>
                </p>
            </section>
            <?php endforeach; ?>

        </main>
    </div>    
</body>
</html>