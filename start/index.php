<?php
	$title = 'LED Christmas Lights';
	include '../header.php';
    include '../status.php';
    // this loads in $status, $pid, $delay
    error_log("Status is $status when START/STOP clicked");
    if ($status == "Alive") {
        error_log("Trying to kill pid $pid");
        $temp_pid = trim($pid);
        $command = escapeshellcmd("kill $temp_pid");
        //$command = "echo aaa > /home/pi/aaa.txt";
    } else {
        error_log("Trying to start again");
    	$command = '/home/pi/led_strips/start_from_server.sh';
    }
	//system($command, $retval);
    pclose(popen($command, 'r'));
	//exec($command, $out, $retval);
    //error_log("system($command), result -> $retval");
    //error_log("exec($command), result -> $retval, out -> " . implode($out, '|' ));
    // error_log("'$handle'; " . gettype($handle) . "\n");
    // $read = fread($handle, 2096);
    // error_log($read);
    // pclose($handle);
	// echo "<p>";
	// echo $handle;
    // error_log("LOG: $handle");
	// echo "</p>";

	header("Location: ../index.php");

?>
