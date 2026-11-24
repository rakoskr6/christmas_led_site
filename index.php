<?php
	$title = 'LED Christmas Lights';
	include 'header.php';
	$status = led_status();
?>

<body>
	<a name="about"></a>
	<div class="intro-header">
		<div class="container">

		<div class="row">
				<div class="col-lg-12">
					<div class="intro-message">

						<h1>LED Christmas Lights</h1>
						<h3>Control LED Christmas Lights on Hudson!</h3>
						<hr class="intro-divider">
						<ul class="list-inline intro-social-buttons">
							<li>
                                <?php if ($status == "Alive") : ?>
								<a href="#" id="startbutton" class="btn btn-danger btn-lg" onclick="return requestStartStop('stop')"> <span id="starttext" class="network-name">Stop</span></a>
                                <?php else : ?>
								<a href="#" id="startbutton" class="btn btn-info btn-lg" onclick="return requestStartStop('start')"> <span id="starttext" class="network-name">Start</span></a>
                                <?php endif; ?>
                                <script>
                                    function requestStartStop(action) {
                                        if (action == "stop" && !confirm('Are you sure?')) {
                                            return false;
                                        }
                                        document.getElementById("startbutton").classList.add("disabled");
                                        document.getElementById("starttext").innerHTML =
                                            (action == "stop") ? "Stopping..." : "Starting...";
                                        $.post("/start/", {action: action})
                                            .fail(function() { alert("Couldn't " + action + " the lights."); })
                                            // Starting takes ~5 s (Arduino reset, Pixelblaze connections) before it reports in
                                            .always(function() { setTimeout(function() { location.reload(); }, 8000); });
                                        return false;
                                    }

                                    // Switch mode, then say whether it worked
                                    function setMode(url, name) {
                                        $.post(url)
                                            .done(function() { $("#modemsg").text(name + " on"); })
                                            .fail(function() { $("#modemsg").text("Couldn't switch to " + name); });
                                        return false;
                                    }
                                </script>
							</li>
							<li>
								<a href="#" class="btn btn-default btn-lg" onclick="return setMode('/lights_pattern/', 'Pattern mode')"> <span class="network-name">Pattern Mode</span></a>
							</li>
							<li>
								<a href="#" class="btn btn-default btn-lg" onclick="return setMode('/lights_all/', 'Music mode (all)')"> <span class="network-name">Music Mode - All</span></a>
							</li>
							<li>
								<a href="#" class="btn btn-default btn-lg" onclick="return setMode('/lights_tree/', 'Music mode (tree only)')"> <span class="network-name">Music Mode - Tree Only </span></a>
							</li>
							<li>
								<a href="/options/" class="btn btn-default btn-lg"> <span class="network-name">Options</span></a>
							</li>
						</ul>
						<p id="modemsg"></p>
					</div>
				</div>
			</div>

		</div>
		<!-- /.container -->

	</div>
	<!-- /.intro-header -->

	<!-- Page Content -->


	</div>
	<!-- /.content-section-a -->

	<div class="content-section-b">

		<div class="container">

			<div class="row">
				<div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
					<hr class="section-heading-spacer">
					<div class="clearfix"></div>
					<p class="lead">Created by: Kyle Rakos and Chris Chow</p>
		</div>
			</div>

		</div>


		<!-- /.container -->

	</div>
   <?php include 'footer.php';?>


</html>
