<html>
	<head>
		<title>Laravel</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		<script type="text/javascript">
		$(document).ready(function() {
			$("button").click(function() {
				$("#myDiv").load("ajdata");
			});
		});
		</script>

		
	</head>
	<body>
		<div class="container">
			<button type="button">Change Content</button>
			<p id="myDiv">Static Content</p>
		</div>
	</body>
</html>
