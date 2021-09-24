<?php

function e13_table_header() {
	echo "<table>\n";
	echo "<tr><th style=\"text-align:left;width:150px\">Name</th><th>Course</th></tr>";
}

function e13_table_student($fn, $ln, $gender, $course) {
	static $even = true;
	echo "<tr";
	if ($even) echo " style=\"background-color:DDDDDD\"";
	echo "><td>$ln, $fn</td><td>$course</td></tr>";
	$even = !$even;
}

function e13_table_end() {
	echo "</table>";
}
	
?>
