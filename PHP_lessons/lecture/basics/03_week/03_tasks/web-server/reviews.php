<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Travel Reviews</title>
</head>

<body>
    <h1>Travel Reviews</h1>
    <?php
    $travel_reviews = array(
        array(
            "author" => "Alice",
            "date" => "2023-05-15",
            "location" => "Paris, France",
            "comments" => "Paris was absolutely breathtaking! The Eiffel Tower at night is a must-see."
        ),
        array(
            "author" => "Bob",
            "date" => "2023-07-20",
            "location" => "Kyoto, Japan",
            "comments" => "Kyoto's temples are serene and beautiful. I could spend days wandering around the bamboo forests."
        ),
        array(
            "author" => "Charlie",
            "date" => "2023-09-10",
            "location" => "Rome, Italy",
            "comments" => "Rome is like an open-air museum. The Colosseum is awe-inspiring."
        ),
        array(
            "author" => "Diana",
            "date" => "2023-11-05",
            "location" => "Cusco, Peru",
            "comments" => "Cusco is rich in history and culture. Machu Picchu is a once-in-a-lifetime experience."
        ),
        array(
            "author" => "Eva",
            "date" => "2023-12-25",
            "location" => "Sydney, Australia",
            "comments" => "Spending Christmas in Sydney was amazing! Bondi Beach is perfect for a holiday getaway."
        ),
        array(
            "author" => "Frank",
            "date" => "2024-01-15",
            "location" => "New York City, USA",
            "comments" => "New York City never sleeps! The diversity of cultures and cuisines is unmatched."
        )
    );
    ?>
    <div id="review-container">
        <!-- Below is the HTML template for one review. Using the $travel_reviews variable defined above and
    a foreach loop, print all the reviews. You only need one HTML template since the loop goes
    through all reviews.

    The variable contains an indexed array of associate arrays. You should loop through the indexed array
    and access the associative array fields with the square brackets, e.g. $single_review["author"].
    -->


        <section class="review">
            <h2 class="location">Paris, France</h2>
            <p class="author">Alice</p>
            <p class="date">2023-05-15</p>
            <p class="comments">Paris was absolutely breathtaking! The Eiffel Tower at night is a must-see.</p>
        </section>

    </div>
</body>
π

</html>