<?php

// Big props to muukrls on twitch for his assistance in making this better/work.
// //
// $a = new DB();
// $query = $a->query_books();
// // // $query = DB::retrieve_authors(1);
// // // var_dump($query->fetch(PDO::FETCH_ASSOC));
// while (($r = $query->fetch(PDO::FETCH_ASSOC)) != null) {
//   echo $r['book_title'].'<br />';
// }
// // // echo $query['author'];
// // if ($query) {
// //   echo 'Fantastic, you remembered your password. You must be soooo clever.';
// // }
//$query->execute(array(':col' => $col, ':table' => $table, ':id' => $id));
// return $query->fetch(PDO::FETCH_ASSOC);

// Look at turning this into one reusable function

public function fetch_author($id)
{
  $query = $this->db->prepare('SELECT author FROM authors WHERE iden=:id ');
  $query->bindParam(':id', $id);
  $query->execute();
  return $query->fetch(PDO::FETCH_ASSOC);
}

public function fetch_publisher($id)
{
  $query = $this->db->prepare('SELECT publisher FROM publishers WHERE iden=:id');
  $query->bindParam(':id', $id);
  $query->execute();
  return $query->fetch(PDO::FETCH_ASSOC);
}

public function fetch_genre($id)
{
  $query = $this->db->prepare('SELECT genre FROM genres WHERE iden=:id');
  $query->bindParam(':id', $id);
  $query->execute();
  return $query->fetch(PDO::FETCH_ASSOC);
}

/* Hopefully this will replace the fetch_author, fetch_publisher and fetch_genre functions
public function fetch_data($col, $table, $id) {
$query = $this->db->prepare('SELECT author FROM authors WHERE author_id=:id');
//$query->bindParam(':col', $col);
//$query->bindParam(':table', $table);
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();
return $query->fetch(PDO::FETCH_ASSOC);
}*/

?>
