<?php
	$employeeName = 'Cameron Emerson';
	$hoursWorked = 40.0;
	$payRate = 54.50;
	$fedTax = 0.245;
	$stateTax = 0.055;

	echo "<table>\n" . "<tr>\n"; 
	echo "<th>Employee Name: </th>\n" . "<td>$employeeName</td>\n";
	echo "</tr>\n" . "<tr>\n";
	echo "<th>Hours Worked: </th>\n" . "<td>$hoursWorked</td>\n";
	echo "</tr>\n" . "<tr>\n";
	echo "<th>Pay Rate: </th>\n" . "<td>$" . number_format($payRate, 2) . "</td>\n";
	echo "</tr>\n" . "<tr>\n";
	echo "<th>Gross Pay: </th>\n" . "<td>$" . number_format(($payRate * $hoursWorked), 2) . "</td>\n";
	echo "</tr>\n" . "</table>\n";

	echo "<h3>Deductions:</h3>\n";
	echo "<table>\n" . "<tr>\n";
	echo "<th>Federal Withholding (24.5%): </th>" . "<td>$" . number_format((($payRate * $hoursWorked) * $fedTax), 2) . "</td>\n";
	echo "</tr>\n" . "<tr>\n";
	echo "<th>State Withholding (5.5%): </th>" . "<td>$" . number_format((($payRate * $hoursWorked) * $stateTax), 2) . "</td>\n";
	echo "</tr>\n" . "<tr>\n";
	echo "<th>Total Deduction: </th>" . "<td>$" . number_format(((($payRate * $hoursWorked) * $fedTax) + (($payRate * $hoursWorked) * $stateTax)), 2) . "</td>\n";
	echo "</tr>\n" . "</table>\n";

	echo "<h3></h3>\n";
	echo "<table>\n" . "<tr>\n"; 
	echo "<th>Net Pay: </th>\n" . "<td>$" . number_format(($payRate * $hoursWorked) - (((($payRate * $hoursWorked) * $fedTax) + (($payRate * $hoursWorked) * $stateTax))), 2) . "</td>\n";
	echo "</tr>\n" . "</table>\n";
?>
