<html>
	<head>
		<title>Laravel</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		<script type="text/javascript">
		function loadData()
		{
			var xmlhttp=new XMLHttpRequest();

			xmlhttp.onreadystatechange=function()
			  {
			  	document.getElementById("myDiv").innerHTML=xmlhttp.readyState;
			  
			  }
			xmlhttp.open("GET","ajdata",true);
			xmlhttp.send();
		}
		</script>

		
	</head>
	<body>
		<div class="container">
			<button type="button" onclick="loadData()">Change Content</button>
			<p id="myDiv">Static Content</p>
		</div>
	</body>
</html>
