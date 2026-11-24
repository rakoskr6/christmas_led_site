<?php
	$title = 'LED Christmas Lights';
	include 'header.php';
    include 'status.php';
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
								<a href="#" id="startbutton" class="btn btn-danger btn-lg" onclick="requestStartStop()" > <span id="starttext" class="network-name">Stop</span></a>
                                <?php else : ?>
								<a href="#" id="startbutton" class="btn btn-info btn-lg" onclick="requestStartStop()"> <span id="starttext" class="network-name">Start</span></a>
                                <?php endif; ?>
                                <script>
                                    function requestStartStop() {
                                        var status = "<?php Print($status); ?>";
                                        if (status == "Alive") {
                                                console.log("stopping...");
                                            if (confirm('Are you sure?')) {
                                                //document.getElementById("startbutton").classList.remove("btn-danger");
                                                document.getElementById("startbutton").classList.add("disabled");
                                                document.getElementById("starttext").innerHTML = "Stopping...";
                                                $.get("/start/index.php");
                                            }
                                        } else {
                                                console.log("starting...");
                                                //document.getElementById("startbutton").classList.remove("btn-info");
                                                document.getElementById("startbutton").classList.add("disabled");
                                                document.getElementById("starttext").innerHTML = "Starting...";
                                                $.get("/start/index.php");
                                        }
                                        setTimeout(function() {
                                            location.reload();
                                        }, (8 * 1000));
                                        // document.getElementById("demo").style.color = "red";
                                    }

                                    function staticMode() {
                                        $.get("/lights_pattern/index.php");
                                        
                                    }

                                    function musicAll() {
                                        $.get("/lights_all/index.php");
                                        
                                    }

                                    function musicTree() {
                                        $.get("/lights_tree/index.php");
                                        
                                    }


                                </script>
							</li>
							<li>
								<a href="/patterns/" class="btn btn-default btn-lg" onclick="staticMode()"> <span class="network-name">Pattern Mode</span></a>
							</li>
							<li>
								<a href="/music/" class="btn btn-default btn-lg" onclick="musicAll()"> <span class="network-name">Music Mode - All</span></a>
							</li>
							<li>
								<a href="/music/" class="btn btn-default btn-lg" onclick="musicTree()"> <span class="network-name">Music Mode - Tree Only </span></a>
							</li>
							<li>
								<a href="/options/" class="btn btn-default btn-lg"> <span class="network-name">Options</span></a>
							</li>
						</ul>
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
