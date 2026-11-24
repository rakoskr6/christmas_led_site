<?php
	$title = 'LED Christmas Lights';
	include '../header.php';

	$command = escapeshellcmd('/opt/led_strips/set_config.py wireless_music false');
	$output = shell_exec($command);
	$command = escapeshellcmd('/opt/led_strips/set_config.py mode music');
	$output = shell_exec($command);
	echo "<p>";
	echo $output;
	echo "</p>";

	header("Location: ../index.php");
?>
