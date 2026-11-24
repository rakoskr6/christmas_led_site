<?php
	$title = 'LED Christmas Lights';
	include '../header.php';
?>
<body>

	<div class="container">

        <!-- Volume -->

		<div class="row">
			<h1 style="text-align: center">Volume</h1>
		</div>

		<div class="row">
			<div class="slidecontainer">
				<?php
                    // Current capture volume (0-100), or 50 if it can't be read
                    $volume = filter_var(trim((string)shell_exec(LED_DIR . '/website_get_volume.sh')), FILTER_VALIDATE_INT,
                                         ['options' => ['min_range' => 0, 'max_range' => 100]]);
                    if ($volume === false) {
                        $volume = 50;
                    }
                ?>
				<input type="range" min="0" max="100" value="<?php echo $volume; ?>" class="slider" id="volRange">
				<p>Volume: <span id="volume"></span>%</p>
				</div>

				<script>
				var slider_vol = document.getElementById("volRange");
				var output_vol = document.getElementById("volume");
				output_vol.innerHTML = slider_vol.value;

				// Show the number while dragging; set the volume when the slider is let go
				slider_vol.oninput = function() {
				  output_vol.innerHTML = this.value;
				}
				slider_vol.onchange = function() {
				  $.post("volume.php", {volume: this.value})
				    .fail(function() { alert("Couldn't set the volume."); });
				}
				</script>	
			</div>

        <!-- Brightness -->

		<div class="row">
			<h1 style="text-align: center">Brightness</h1>
		</div>

		<div class="row">
			<div class="slidecontainer">
				<input type="range" min="0" max="100" value="50" class="slider" id="myRange">
				<p>Brightness: <span id="demo"></span>%</p>
				</div>

				<script>
				var slider = document.getElementById("myRange");
				var output = document.getElementById("demo");
				output.innerHTML = slider.value;

				slider.oninput = function() {
				  output.innerHTML = this.value;
				}
				</script>	
			</div>

		<div class="row">
			<h1 style="text-align: center">Select a Pattern (static mode only)</h1>
		</div>
		<div class="row">
			<div class ="col-xs-3">
				<button type="button" class="btn btn-default">Pattern 1</button>
			</div>
			
			<div class ="col-xs-3">
				<button type="button" class="btn btn-default">Pattern 2</button>
			</div>
			
			<div class ="col-xs-3">
				<button type="button" class="btn btn-default">Pattern 3</button>
			</div>
			<div class ="col-xs-3">
				<button type="button" class="btn btn-default">Pattern 4</button>
			</div>
		</div>

		<div class="row">
			<br>
		</div>

		<div class="row">
			<div class ="col-xs-3">
				<button type="button" class="btn btn-default">Pattern 5</button>
			</div>
			
			<div class ="col-xs-3">
				<button type="button" class="btn btn-default">Pattern 6</button>
			</div>
			
			<div class ="col-xs-3">
				<button type="button" class="btn btn-default">Pattern 7</button>
			</div>
			<div class ="col-xs-3">
				<button type="button" class="btn btn-default">Pattern 8</button>
			</div>
		</div>


		<div class="row">
			<br>
			<br>
		</div>


		<div class="row">
			<h1 style="text-align: center">Select Colors (static mode only)</h1>
		</div>

		<div class="row">
			<div class ="col-xs-3">
				<button type="button" class="btn btn-default">Red</button>
			</div>
			
			<div class ="col-xs-3">
				<button type="button" class="btn btn-default">Green</button>
			</div>
			
			<div class ="col-xs-3">
				<button type="button" class="btn btn-default">White</button>
			</div>
			<div class ="col-xs-3">
				<button type="button" class="btn btn-default">Blue</button>
			</div>
		</div>

	</div>


<?php include '../smallfooter.php';?>


</html>
