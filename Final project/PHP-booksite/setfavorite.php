<?php
// You will receive a GET parameter "id", which contains the book id.
// Check the cookie (with the name of your choice). It's recommended to save the favorite'd book ids as an array turned into string. E.g.
// $favorites = array(1, 4, 6);
// $favorites_string = implode(",", $favorites); // "1,4,6"
// setcookie("favorites", $favorites_string, time()+86400*30);
// $favorites = explode(",", $_COOKIE["favorites"]);

// If the cookie's not set or this id is not part of the cookie, add this id and send the cookie to the user.

// If it's part of the cookie, remove it and send the new cookie to the user.
// By far the easiest way to remove a specific item (not index) from array is to use array_diff function, e.g.
// $favorites = array_diff($favorites, array($id));
// This takes the items in the first array ($favorites) that are not in the second array (containing only the book id), and puts the result back to $favorites

// Redirect back to booksite.php. If you want to redirect to the exact page user came from, that's header("Location:" . $_SERVER["HTTP_REFERER"]);
// And no, that's not a typo. It is HTTP_REFERER.

$book_id = isset($_GET['id']) ? $_GET['id'] : header("Location:" . $_SERVER["HTTP_REFERER"]);
$favorite_id = isset($_COOKIE['favorite_id']) ? explode(",", $_COOKIE['favorite_id']) : [];

$favorite_index = array_search($book_id, $favorite_id);
if ($favorite_index !== false) {
    unset($favorite_id[$favorite_index]);
} else {
    $favorite_id[] = $book_id;
}

$favorites_string = implode(",", $favorite_id);
setcookie("favorite_id", $favorites_string, time()+86400*30);
header("Location:" . $_SERVER["HTTP_REFERER"]);
exit;
?>