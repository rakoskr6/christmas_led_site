<?php
$volume = $_GET["volume"];
$command = escapeshellcmd("/home/pi/led_strips/website_set_volume.sh $volume");
// error_log("Trying to set volume to $volume ($command)");
pclose(popen($command, 'r'));
?>
