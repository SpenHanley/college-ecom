<?php
// require_once 'db.php';
include 'utils.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Jim's Books</title>
  <meta charset="utf-8"  />
  <link rel="stylesheet" href="style/main.css" />
  <?php
	include 'bootstrap_header.php';
  ?>
</head>
<body>
  <nav>
	<div class="wrapper" >
		<div class="left">
		  <h1>Jim's Books</h1>
		</div>
		<div class="right">
		  <ul>
			<li>
			  <a href="#">Home</a>
			</li>
			<li>
			  <form action="login.php" method="post">
				<input type="text" placeholder="Username" name="un"/>
				<input type="password" placeholder="Password" name="pw"/>
				<input type="submit" value="Login" />
			  </form>
			</li>
		  </ul>
		</div>
	</div>
  </nav>
  <div class="wrapper">
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
  </div>
</body>
</html>
