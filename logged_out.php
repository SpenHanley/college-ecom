<!DOCTYPE html>
<html>
	<head>
		<title>Successful Logout</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style/conf.css">
		<script>
			function forward()
			{
				window.setTimeout(function () {window.location = "index.php"}, 5000);
			}
		</script>
		<?php include '_includes/bootstrap_header.php'; ?>
	</head>
	<body onload="forward()">
		<div class="container">
			<div class="text-center">
				<div class="panel panel-primary">
					<div class=panel-heading>
						<h3 class="panel-title">Logged out</h3>
					</div>
					<div class="panel-body">
						You have successfully logged out. You will now be redirected to the homepage.
					</div>
				</div>
			</div>
		</div>
	</body>
</html>