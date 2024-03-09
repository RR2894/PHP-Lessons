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
                // Here you should display the books of the given genre (GET parameter "genre"). Check the links above for parameter values.
                // If the parameter is not set, display all books.
                // Use the HTML template below and a loop (+ conditional if the genre was given) to go through the books in file  

                
                // You also need to check the cookies to figure out if the book is favorite or not and display correct symbol.
                // If the book is in the favorite list, add the class "fa-star" to the a tag with "bookmark" class.
                // If not, add the class "fa-star-o". These are Font Awesome classes that add a filled star and a star outline respectively.
                // Also, make sure to set the id parameter for each book, so the setfavorite.php page gets the information which book to favorite/unfavorite.
                
                // Read the file into array variable $books:
                $json = file_get_contents("books.json");
                $books = json_decode($json, true);
                
                if(isset($_COOKIE['favorites'])) {
                    $favorites = json_decode($_COOKIE["favorites"]);
                } else {
                    $favorites = [];
                }
                
                $genreSearch = array (
                    'adventure' => 'Adventure',
                    'classic' => 'Classic Literature',
                    'coming-of-age' => 'Coming-of-age',
                    'fantasy' => 'Fantasy',
                    'historical' => 'Historical Fiction',
                    'horror' => 'Horror',
                    'mystery' => 'Mystery',
                    'romance' => 'Romance',
                    'scifi' => 'Science Fiction'
                );
                
                if(isset($_GET["genre"])) {
                    $genre = $_GET["genre"];
                } else {
                    $genre = null;
                }
                
                function isFavorite($bookId, $favorites) {
                    return in_array($bookId, $favorites);
                }
                ?>

                <h2>
                    <?php
                    if (isset($genre)) {
                        echo $genreSearch[$genre];
                    } else {
                        echo "All Books";
                    }
                    ?>
                </h2>

                <?php foreach ($books as $book): ?>
                    <?php
                    // Check if the book belongs to the specified genre or if no genre is specified
                    if ($genre === null || in_array($genre, $book['genres'])) {
                        // Determine if the book is a favorite or not
                        $isFavorite = isFavorite($book['id'], $favorites);
                        // Determine the appropriate Font Awesome class based on the favorite status
                        if ($isFavorite) {
                            $starClass = 'fa-star';
                        } else {
                            $starClass = 'fa-star-o';
                        }                    
                        ?>
                    <section class="book">
                        <a class="bookmark fa <?php echo $starClass; ?>" href="setfavorite.php?id=<?php echo $book['id']; ?>"></a>
                        <h3><?php echo $book['title']; ?></h3>
                        <p class="publishing-info">
                            <span class="author"><?php echo $book['author']; ?></span>,
                            <span class="year"><?php echo $book['year']; ?></span>
                        </p>
                        <p class="description">
                            <?php echo $book['description']; ?>
                        </p>
                    </section>
                    <?php } ?>
                <?php endforeach; ?>