<?php
declare(strict_types=1);
require_once('RefData.php');
?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Test Page</title>
	<style>
		table {
			width: 50%;
			border-collapse: collapse;
		}

		table, th, td {
			border: 1px solid black;
		}
	</style>

</head>

<body>
	<h1>Test Page</h1>

	<table>
		<tr>
			<th>id</th>
			<th>name</th>
		</tr>
<?php
	foreach(getRefData('Ethnicity') as $id => $name)
	{
		printf('<tr><td>%1$s</td><td>%2$s</td></tr>' . PHP_EOL, $id, $name);
	}
?>
	</table>

</body>

</html>
