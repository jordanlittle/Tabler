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
			$('#t_1').tablesorter();
		});
	</script>
	<table id="t_1" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Make</th>
				<th>Model</th>
				<th>Year</th>
				<th>Trim</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Jordan Little</td>
				<td>iamjordanlittle@gmail.com</td>
				<td>Mazda</td>
				<td>Miata</td>
				<td>2000</td>
				<td>LS</td>
			</tr>
			<tr>
				<td>Brent Coney</td>
				<td>brentconey@gmail.com</td>
				<td>Honda</td>
				<td>Civic</td>
				<td>2008</td>
				<td>Mugen Si</td>
			</tr>
		</tbody>
	</table>


</body>
</html>