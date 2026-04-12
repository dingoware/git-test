<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
	$month = filter_input(INPUT_POST, "Month", FILTER_SANITIZE_SPECIAL_CHARS);
	$day = filter_input(INPUT_POST, "Day", FILTER_SANITIZE_NUMBER_INT);
	$year = filter_input(INPUT_POST, "Year", FILTER_SANITIZE_NUMBER_INT);
	$hour = filter_input(INPUT_POST, "Hour", FILTER_SANITIZE_NUMBER_INT);
	$minute = filter_input(INPUT_POST, "Minute", FILTER_SANITIZE_NUMBER_INT);
	$ampm = filter_input(INPUT_POST, "AMPM", FILTER_SANITIZE_SPECIAL_CHARS);

	$date_string = "$day $month $year $hour:$minute $ampm";
	$date = date_create($date_string);

	if($date) {
		echo "<h1>Birthday Formatter</h1>";
		echo "<p>" . date_format($date, 'l F jS, Y - g:ia') . "</p>";
		$timestamp = date_format($date, 'Y-m-d H:i:s');
		echo "<a href='?iso_date=" . urlencode($timestamp) . "'>Show date in ISO format.</a>";
	}

	exit();
} else if(isset($_GET['iso_date'])) {
	echo "<h1>Birthday Formatter</h1>";
	$iso_output = htmlspecialchars($_GET['iso_date']);
	echo "<p>$iso_output</p>";

	exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title>Birthday Formatter</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<style>
		table, th, td {
			border: 1px solid black;
		}
	</style>

</head>
<body>

	<h1>Birthday Formatter</h1>

	<form method="POST" action="birthdays.php">
		<table>
			<tr>
				<th>Month</th>
				<th>Day</th>
				<th>Year</th>
				<th>Hour</th>
				<th>Minute</th>
				<th>AM/PM</th>
			</tr>
			<tr>
				<td>
					<select name="Month">
						<option value='January'>January</option>
						<option value='February'>February</option>
						<option value='March'>March</option>
						<option value='April'>April</option>
						<option value='May'>May</option>
						<option value='June'>June</option>
						<option value='July'>July</option>
						<option value='August'>August</option>
						<option value='September'>September</option>
						<option value='October'>October</option>
						<option value='November'>November</option>
						<option value='December'>December</option>
					</select>
				</td>
				<td>
					<select name="Day">
<?php
for($x=1; $x<=31; $x++) {
	echo "<option value=" . $x . ">" . $x . "</option>\n";
}
?>
					</select>
				</td>
				<td>
					<select name="Year">
<?php
for($x=1900; $x<=date('Y'); $x++) {
	echo "<option value=" . $x . ">" . $x . "</option>\n";
}
?>
					</select>
				</td>
				<td>
					<select name="Hour">
						<option value=1>1</option>
						<option value=2>2</option>
						<option value=3>3</option>
						<option value=4>4</option>
						<option value=5>5</option>
						<option value=6>6</option>
						<option value=7>7</option>
						<option value=8>8</option>
						<option value=9>9</option>
						<option value=10>10</option>
						<option value=11>11</option>
						<option value=12>12</option>
					</select>
				</td>
				<td>
					<select name="Minute">
<?php
for($x=0; $x<60; $x++) {
	echo "<option value=" . $x . ">" . $x . "</option>\n";
}
?>
					</select>
				</td>
				<td>
					<select name ="AMPM">
						<option value='AM'>AM</option>
						<option value='PM'>PM</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Format Date" />
				</td>
			</tr>
		</table>
	</form>

</body>
</html>