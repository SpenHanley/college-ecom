<!DOCTYPE html>
<html>
	<head>
		<title>Successful Logout</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style/conf.css" />
		<script>
			function backward() {
				window.setTimeout(function () {window.location = "index.php"}, 5000);
			}
		</script>
	</head>
	<body onload="backward()" >
		<div class="wrapper" >
			<p>You have successfully logged out and will now be redirected to the homepage.</p>
		</div>
	</body>
</html>