<?php
session_start();
$uname = ucwords($_SESSION['un']);
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
						<h3 class="panel-title">Updated</h3>
					</div>
					<div class="panel-body">
					    Your update was successfully applied. You will now be forwarded to the dash.
					</div>
				</div>
			</div>
		</div>
	</body>
</html>