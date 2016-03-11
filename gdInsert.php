<?php
$meh = "";
if (isset($_GET['nm']) && !isset($_GET['tl']))
{
    $meh = $_GET['nm'];
    $type = "User";
} else if (isset($_GET['tl']) && !isset($_GET['nm']))
{
    $meh = $_GET['tl'];
    $type = "Book";
} else
{
    header('Location: index.php');
}
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
						<h3 class="panel-title"><?= $type; ?> Added</h3>
					</div>
					<div class="panel-body">
					    <?= $meh; ?> has been added. You will now be redirected to the dash.
					</div>
				</div>
			</div>
		</div>
	</body>
</html>