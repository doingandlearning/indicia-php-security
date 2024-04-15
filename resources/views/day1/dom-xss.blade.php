	<head>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script>
			let output = "";

			<?php
			if (isset($_GET['q'])) {
				printf('output = "%s";', $_GET['q']);
			}
			?>
			$(function() {

				$("#output").html(output);
			})
		</script>

	</head>

	<body>
		<p id="output"></p>
	</body>