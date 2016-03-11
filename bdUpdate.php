<?php
session_start();
$err = $_GET['err'];
?>
<!DOCTYPE html>
<html>
	<head>
		<script>
			function forward()
			{
				// window.setTimeout(function () { window.location = "dash.php" }, 5000);
			}
		</script>
		<?php include '_includes/bootstrap_header.php'; ?>
	</head>
	<body onload="forward()">
		<div class="container">
			<div class="text-center">
				<div class="panel panel-danger">
					<div class=panel-heading>
						<h3 class="panel-title">Update Failed</h3>
					</div>
					<div class="panel-body">
					    Unfortunately the update failed. The update failed because
					    <?php echo $err; ?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>