<?php
	require_once 'student.php';
	require_once 'grade-calc.php';

	$student1 = new Student("Hoshimi", "Miyabi", 1001, "CPSC222", "CPSC333", "CPSC404", 99, 96, 83);
	$student2 = new Student("Von", "Lycaon", 1002, "CPSC232", "CPSC433", "CPSC404", 100, 76, 93);
	$student3 = new Student("Pan", "Yinhu", 1003, "CPSC110", "CPSC333", "CPSC354", 44, 60, 94);

	$students = [$student1, $student2, $student3];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Grades</title>
	<style>
		table, th, td {
			border: 1px solid black;
			padding: 5px;
			margin: 5px;
		}
	</style>
</head>
<body>
	<h1>Student Grades (Ch. 5 & 6)</h1>
	<?php
		for($i = 0; $i < count($students); $i++) {
			echo "<table><tr><th>Name</th><td>{$students[$i]->getLName()}, {$students[$i]->getFName()}</td></tr>\n";
			echo "<tr><th>Student ID</th><td>{$students[$i]->getID()}</td></tr>\n";
			echo "<tr><th>Grades</th><td><ul>";
			foreach ($students[$i]->getCourses() as $course => $grade) {
					echo "<li>" . $course . " - " . $grade . " " . gradeCalc($grade) . "</li>\n";
				}
			echo "</ul></td></tr></table>\n";
		}
	?>
</body>
</html>