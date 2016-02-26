<?php
class DB {

  // This function is private so that only the member functions can
  // access and utilise it.
  public function __construct() {
	  try {
		$this->db = new PDO('mysql:host=127.0.0.1;dbname=ecom', 'root', '');
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	  } catch (PDOException $e) {
		  echo $e->getMessage();
	  }
  }

  // Function that retrieves all the books from the database
  // any formatting that is done to this information will
  // be done with style sheets and layouts within html
  public function query_books() {
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

  // This function will return true only if the username AND password
  // match the informations stored within the database
  public function check_user($una, $pwo) {
    $query = $this->db->prepare('SELECT pword FROM users WHERE uname=:un');
    $query->bindParam(':un', $una);
    $query->execute();
    $query = $query->fetch(PDO::FETCH_ASSOC);
    $pw = password_verify($pwo, $query['pword']);
    return $pw;
  }
  
  public function get_current($cur) {
	  $query = $this->db->prepare('SELECT * FROM '.$cur.'s');
	  $query->execute();
	  return $query;
  }
}