<?php
session_start();
if (isset($_GET['err']))
{
    $err = $_GET['err'];
} else
{
    header('Location: index.php');
}

if ($err = 'Bad Filetype') {
    $type = 'file';
}
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
						<h3 class="panel-title"><?= $type; ?> Creation Failed</h3>
					</div>
					<div class="panel-body">
					    There was an error adding a <?= $type; ?>. The update failed because <?= $err; ?>
					    <?php echo $err; ?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>