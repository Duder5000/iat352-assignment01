<?php

function e13_table_header() {
	echo "<table>\n";
	echo "<tr><th style=\"text-align:left;width:150px\">Name</th><th>type</th></tr>";
}

function e13_table_student($name, $list, $type) {
	static $even = true;
	echo "<tr";
	if ($even) echo " style=\"background-color:DDDDDD\"";
	echo "><td>$name</td><td>$type</td></tr>";
	$even = !$even;
}

function e13_table_end() {
	echo "</table>";
}
	
?>
