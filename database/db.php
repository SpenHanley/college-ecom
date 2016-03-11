<?php

class DB
{
    
    // To query, DB::$instance->methods();
    // Here's where other languages take control.
    public static $instance;
    
    public static function init()
    {
        self::$instance = new DB();
    }
    
    public $db;
    
    // This function is private so that only the member functions can
    // access and utilise it.
    private function __construct()
    {
        try
        {
            $this->db = new PDO('mysql:host=127.0.0.1;dbname=ecom', 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    
    // Function that retrieves all the books from the database
    // any formatting that is done to this information will
    // be done with style sheets and layouts within html
    public function query_books()
    {
        $query = $this->db->query('SELECT authors.author, publishers.publisher, genres.genre, year, price, img_path, book_title, isbn_no
            FROM books
            INNER JOIN authors
            ON books.author_id = authors.author_id
            INNER JOIN publishers
            ON books.publisher_id = publishers.publisher_id
            INNER JOIN genres
            ON books.genre_id = genres.genre_id
        ');
        $query->execute();
        return $query;
    }
    
    function add_book($isbn, $title, $author, $publisher, $genre, $year, $price, $cover)
    {
        if ($cover != null)
        {
        $query = $this->db->prepare('INSERT INTO books (isbn_no, book_title, author_id, year, price, publisher_id, genre_id, img_path) VALUES(:in, :bt, :ai, :yr, :pr, :pi, :gi, :ip)');
        $query->execute([':in' => $isbn, ':bt' => $title, ':ai' => $author, ':yr' => $year, ':pr' => $price, ':pi' => $publisher, ':gi' => $genre, ':ip' => $cover]);
        } else
        {
        $query = $this->db->prepare('INSERT INTO books (isbn_no, book_title, author_id, year, price, publisher_id, genre_id) VALUES(:in, :bt, :ai, :yr, :pr, :pi, :gi)');
        $query->execute([':in' => $isbn, ':bt' => $title, ':ai' => $author, ':yr' => $year, ':pr' => $price, ':pi' => $publisher, ':gi' => $genre]);
        }
        
        return $query;
    }
    
    function add($table, $value)
    {
        $table = $table . "s";
        $query = $this->db->prepare('INSERT INTO `' . $table . '` VALUES(NULL, :val)');
        $query->execute([":val" => $value]);
        return $this->db->lastInsertId();
    }
    
    public function get_current($cur)
    {
        $query = $this->db->prepare('SELECT * FROM `' . $cur . 's`');
        $query->execute();
        return $query;
    }
    
}