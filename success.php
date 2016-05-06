<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<script>
			function forward()
			{
				window.setTimeout(function () { window.location = "dash.php" }, 5000);
			}
		</script>
		<?php include '_includes/bootstrap_header.php'; ?>
	</head>
	<body onload="forward()">
		<div class="container">
			<div class="text-center">
				<div class="panel panel-primary">
					<div class=panel-heading>
						<h3 class="panel-title">Logged In</h3>
					</div>
					<div class="panel-body">
						You have successfully logged in. You will now be redirected to the dashboard.
					</div>
				</div>
			</div>
		</div>
	</body>
</html>