<?php
require '_includes/utils.php';

$isbn = $_POST['isbn'];
$title = $_POST['title']
$author = $_POST['author'];
$publisher = $_POST['publisher'];
$genre = $_POST['genre'];
$price = round($_POST['price'], 2);
$year = $_POST['year'];
$cover_path = "";

if (isset($_FILES['cover']))
{
    $img = $_FILES['cover'];
    $cover_name = $img['name'];
    $cover_tmp = $img['tmp_name'];
    $cover_size = $img['size'];
    $ext = explode('.', $cover_name);
    $ext = strtolower(end($ext));
    $error = $img['error'];
    $cover_im = false;

    $allowed = array('png', 'jpg', 'gif', 'bmp');
    
    echo $ext;
    
    if (!(in_array($ext, $allowed))) {
        header('Location: bdInsert.php?err=Bad Filetype');
    } else if ($error === 0)
    {
        $cover_name_new = $isbn.'.'.$ext;
        $cover_dest = 'assets/img/books/'.$cover_name_new;
        
        if (move_uploaded_file($cover_tmp, $cover_dest))
        {
            $cover_path = $cover_dest;
            $cover_im = true;
        }
    } else
    {
        echo "The file errorred on upload";
        echo $error;
    }
} else
{
    echo "No cover file set";
}
// This page is to add a book to the database

if (!$cover_im) {
    $cover_im = 'NULL';
}

$db = DB::$instance;

if (!is_numeric($publisher))
{
    $publisher = update_field('publisher', $publisher);
}

if (!is_numeric($author))
{
    $author = update_field('author', $author);
}

if (!is_numeric($genre))
{
    $genre = update_field('genre', $genre);
}

$query = $db->add_book($isbn, $title, $author, $publisher, $genre, $year, $price, $cover_path);

if ($query->fetch() > 0)
{
    header('Location: dash.php');
}

if (empty($isbn) || empty($title) || empty($author) || empty($publisher) || empty($genre) || empty($price) || empty($year) || empty($img)) {
    header('Location: bdInsert.php?err=Missing%20Parameter');
}

?>