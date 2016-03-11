<?php
if (isset($_FILES['cover']))
{
    $img = $_FILES['cover'];
}
// This page is to add a book to the database
$isbn = $_POST['isbn'];
$title = $_POST['title'];
$author = $_POST['author'];
$publisher = $_POST['publisher'];
$genre = $_POST['genre'];
$price = $_POST['price'];
$year = $_POST['year'];

$cover_name = $cover['name'];
$cover_tmp = $cover['tmp_name'];
$cover_size = $cover['size'];


if (empty($isbn) || empty($title) || empty($author) || empty($publisher) || empty($genre) || empty($price) || empty($year) || empty($img)) {
    header('Location: bdInsert.php?err=Missing%20Parameter');
}

if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
} else {

}

?>