<?php

include  '_includes/utils.php';

$isbn = $_POST['isbn'];
$title = $_POST['title'];
$author = $_POST['author'];
$publisher = $_POST['publisher'];
$genre = $_POST['genre'];
$price = $_POST['price'];
$year = $_POST['year'];
$cover = $_POST['img'];

if (empty($isbn) || empty($title) || empty($author) || empty($publisher) || empty($genre) || empty($price) || empty($year) || empty($cover)) {
    header('Location: bdUpdate.php?err=Missing%20Parameter');
}

// I need to find a way to turn this into a single function so that I am not repeating it each time :(
$publisher = update_field('publisher', $publisher);
$author = update_field('author', $author);
$genre = update_field('genre', $genre);

$query = DB::$instance->db->prepare('UPDATE books SET

    `book_title`=:book_title,
    `author_id`=:author,
    `publisher_id`=:publisher,
    `genre_id`=:genre,
    `price`=:price,
    `year`=:year,
    `img_path`=:img_path
    
    WHERE `isbn_no`=:isbn_no
');
$query->execute(array(':isbn_no' => $isbn, ':book_title' => $title, ':author' => $author, ':publisher' => $publisher, ':genre' => $genre,':price' => $price, ':year' => $year, ':img_path' => $cover));
if ($query)
{
    header('Location: gdUpdate.php');
} else
{
    header('Location: bdUpdate.php');
}

?>