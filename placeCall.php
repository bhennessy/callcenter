<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>CSS3 Contact Form</title>

<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript"  src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript"  src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
	
		
		$("#button2").click(function(){
				
			n = $("#number").val();
			$("#status").load('outboundCall.php',{p:n});
			$("#number").val('');
			
		});
		
	});
</script>
</head>

<body>

<div id="contact">
	<h1>Place a Robo-Call</h1>
	
		<fieldset>
			<label for="name">Phone:</label>
			<input type="tel" id="number" name="number" placeholder="Enter number to robocall" />

	<!--		<label for="email">Email:</label>
			<input type="email" id="email" placeholder="Enter your email address" />

			<label for="message">Message:</label>
			<textarea id="message" placeholder="What's on your mind?"></textarea>-->
			
			<button id="button2">Place Call</button>
		
		</fieldset>
			<p>
			<label for="status">Status:</label><br />
			<p id="status" name="status"></p>
			</p>
</div>


</body>
</html>