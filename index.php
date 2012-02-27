<?php
require_once("core/Tabler.php");
$table = new Tabler("select * from Users");
$table->SetCssClass("classname");



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Tabler</title>
	<meta name="description" content="Tabler builds a table with a query you give it." />
	<link rel="stylesheet" href="themes/default/default.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="js/tablesorter.js"></script>
</head>
<body>

	<script>
		$(function(){
			$('table').tablesorter();
		});
	</script>
	<?php echo $table; ?>

	

</body>
</html>