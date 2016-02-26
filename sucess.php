<?php
session_start();
$uname = ucwords($_SESSION['un']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome <?php echo $uname; ?></title>
	<link rel="stylesheet" href="style/conf.css" />
	<script>
	function forward() {
		window.setTimeout(function () {window.location = "dash.php"}, 5000);
	}
	</script>
</head>
<body onload="forward()" >
	<div class="wrapper" >
		<p>
			<?php
			echo $uname;
			?>
			You have successfuly logged in. <br />
			You shall now be forwarded to the main dashboard. If you are not redirected click <a href="dash.php" >here</a>
		</p>
	</div>
</body>
</html>