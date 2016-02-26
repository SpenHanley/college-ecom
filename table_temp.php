<?php
	echo '<tr>';
	echo '<td><img src="' . $r['img_path'] . '" alt="' . $r['book_title'] . ' cover image" class="img img-thumbnail img-responsive" style="width:150px"></td>';
	echo '<td>' . $r['author'] . '</td>';
	echo '<td>' . $r['publisher'] . '</td>';
	echo '<td>&pound;' . $r['price'] . '</td>';
	echo '<td>' . $r['year'] . '</td>';
	// ucwords() -> php.net/ucwords
	echo '<td>' . ucwords($r['genre']) . '</td>';
	echo '</tr>';
?>