<!DOCTYPE html>

<html>

	<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="js/main.js"></script>
	<title>LankaNettiSivuSovellus</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	</head>

	<body>
	  	<div class="center spacetop">
		  	<input type="text" id="parametri" placeholder="Haku termi">
		  	<button onclick="button();" id="button">HAE LANKOJA</button>
		  	<button id="button" onclick="save()">Lisää Lankoja</button>
		  	<button id="button" onclick="del()">Poista Lankoja</button>

		  	<table id="tuloste" class="table">
		  		<thead>
		  			<tr>
		  				<th scope="col">Lanka</th>
		  				<th scope="col">Väri</th>
		  				<th scope="col">Värikoodi</th>
		  				<th scope="col">Paino</th>
		  			</tr>
		  		</thead>
		  	</table>
		</div>
	</body>
</html>