<?php
require 'db.php';
function populate() {
	$a = new DB();
	$query = $a->query_books();
	while (($r = $query->fetch(PDO::FETCH_ASSOC)) != null) {
		// var_dump($r['img_path']);
		include 'table_temp.php';
	}
}

function populate_options($col) {
	$a = new DB();
	$query = $a->get_current($col);
	while (($r = $query->fetch(PDO::FETCH_ASSOC)) != null) {
		echo '<option value="'.$r[$col.'_id'].'">'.$r[$col].'</option>';
	}
}