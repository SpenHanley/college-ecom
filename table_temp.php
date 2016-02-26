<?php
	echo '<tr>';
	echo '<td><img src="'.$r['img_path'].'" alt="'.$r['book_title'].' cover image"/></td>';
	echo '<td>'.$r['author'].'</td>';
	echo '<td>'.$r['publisher'].'</td>';
	echo '<td>&pound;'.$r['price'].'</td>';
	echo '<td>'.$r['year'].'</td>';
	echo '<td>'.$r['genre'].'</td>';
	echo '</tr>';
?>