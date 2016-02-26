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
        $query = $this->db->query('SELECT authors.author, publishers.publisher, genres.genre, year, price, img_path, book_title
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
    public function get_current($cur)
    {
        $query = $this->db->prepare('SELECT * FROM `' . $cur . 's`');
        $query->execute();
        return $query;
    }
    
}