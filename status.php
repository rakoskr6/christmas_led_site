<?php
// get current status of led lights
// wow this is bad
$handle = fopen("/opt/led_strips/status.log", "r");
if ($handle) {
    $pid = fgets($handle);
    $heartbeat = fgets($handle);
    fclose($handle);
} else {
    // error, uhhh it's dead
    $pid = "UNKNOWN";
    $heartbeat = "UNKNOWN";
}

if ($pid != "UNKNOWN") {
    $delay = time() - intval($heartbeat);
    if (intval($heartbeat)+1 >= time()) {
        $status = "Alive";
    } else {
        $status = "Dead";
    }
} else {
    $status = "UNKNOWN";
}

?>
