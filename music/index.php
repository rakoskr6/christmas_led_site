<?php
	$title = 'LED Christmas Lights';
	include '../header.php';

	$command = escapeshellcmd('python3 music.py');
	$output = shell_exec($command);
	echo "<p>";
	echo $output;
	echo "</p>";

	header("Location: ../index.php");

?>