<?php
	$title = 'LED Christmas Lights';
	include '../header.php';

	$command = escapeshellcmd('/home/pi/led_strips/set_config.py mode static');
	$output = shell_exec($command);
	echo "<p>";
	echo $output;
	echo "</p>";

	//header("Location: ../index.php");
?>
