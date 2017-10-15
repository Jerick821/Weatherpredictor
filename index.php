<!doctype html>
<html>
<head>
	<title>Weather Predictor</title>
	
	<meta charset="utf-8" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/
	bootstrap.min.css">

	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/
	bootstrap-theme.min.css">

	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

	<link rel="stylesheet" href="style.css">

</head>


<body>
	<div class="container">
	
		<div class="row">
		
			<div class="col-md-6 col-md-offset-3 center">
			
				<h1 class="center title">Weather Predictor</h1>
				
				<p class="lead center subtitle">"Enter your city below to get a forecast weather"</p>
				
				<form>
				
					<div class="form-group">
						
						<input type="text" class="form-control" name="city" id="city" placeholder="Eg. London, Paris, San Francisco..." />
					
					</div>
					
					<button id="findMyWeather" class= "btn">Find my Weather</button>
				
				</form>
			
				<div id="success" class="alert alert-success">Success!</div>
				
				<div id="fail" class="alert alert-danger">Could not find weather data for that city. Please try again.</div>
			
				<div id="noCity" class="alert alert-danger">Please enter a city</div>
			
			
			
			</div>
			
		</div>
		
	</div>

<script  src="//code.jquery.com/jquery-3.1.0.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<script>

	$("#findMyWeather").click(function(event) {
		
		event.preventDefault();	
		
		$(".alert").hide();
		
		var warning;
		if ($("#city").val()!="") {
	
			$.get("scraper.php?city="+$("#city").val(), function( data ) {
				warning = data.search("Warning");				
				if (warning > 0) {
					$("#fail").fadeIn();
					
				} else {
					$("#success").html(data).fadeIn();
					
				}
		});
		
		} else {
			$("#noCity").fadeIn();
		}
	});



</script>


</body>
</html>