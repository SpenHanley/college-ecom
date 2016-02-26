<?php
error_reporting(E_ALL);
session_start();
include "utils.php";

if (!isset($_SESSION['un'])) {
	header('Location: index.php');
	document.write('Session variable not present');
}

$uname = $_SESSION['un'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome <?php echo $uname; ?></title>
	<?php
		include 'bootstrap_header.php';
	?>
	<link rel="stylesheet" href="style/main.css" />
	<script>
	function show_extra(el, counter) {
		if (el.value == 'new') {
			console.log(counter);
			document.getElementById(counter).className = "";
			el.name = "";
		}
	}
	</script>
</head>
<body >
<nav>
	<div class="container" >
		<div class="left" >
			Jim's Books
		</div>
		<div class="right" >
			<ul>
				<li><a href="#add" >Add Book</a></li>
				<li><a href="#list" >List</a></li>
				<li><a href="#mod" >Modify Book</a></li>
				<li><a href="logout.php" >Logout</a></li>
			</ul>
		</div>
	</div>
</nav>
<div class="containe" >
	<p id="add" >
		<form class="form-group" >
			<label for="isbn" >ISBN No.</label>
			<input type="text" name="isbn" id="isbn" />
			<label for="title">Title</label>
			<input type="text" name="title" />
					<br>
			Author: <select name="author" onchange="show_extra(this, 'new_au')" >
						<?php
							populate_options('author');
						?>
						<option value="new" >Other</option>
					</select>
					<input type="text" name="author" class="hidden" id="new_au" />
					<br>
			Publisher: 	<select name="publisher" onchange="show_extra(this, 'new_pub')" >
							<?php
								populate_options('publisher');
							?>
							<option value="new" >Other</option>
						</select>
						<input type="text" name="publisher" class="hidden" id="new_pub" >
					<br>
			Genre: 	<select name="genre" onchange="show_extra(this, 'new_gen')" >
							<?php
								populate_options('genre');
							?>
							<option value="new" >Other</option>
						</select>
						<input type="text" name="genre" class="hidden" id="new_gen" >
					<br>
			Year Published: <input type="date" name="year" />
					<br>
			Price: &pound; <input type="number" step="0.01" name="price" />
					<br>
			Cover Image: <input type="file" name="img" id="cover" class="hidden" accept="image/*" />
						<label for="cover">Choose File</label>
					<br>
		</form>
	</p>
	<p id="list" >
		<table class="table table-striped" >
		  <tr>
			<td>
			  Cover Image
			</td>
			<td>
			  Author
			</td>
			<td>
			  Publisher
			</td>
			<td>
			  Price
			</td>
			<td>
			  Year Published
			</td>
			<td>
			  Genre
			</td>
		  </tr>
		  <?php
			populate();
		  ?>
		</table>
	</p>
	<p id="mod" >
	</p>
</div>
</body>
</html>