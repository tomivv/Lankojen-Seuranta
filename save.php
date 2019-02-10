<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <title>LankaNettiSivuSovellus</title>
</head>
<body>
	<div style="margin: 1% 30% 0px 30%;">
		<button id="button" onclick="index()">Takaisin</button>
	</div>
	<div style="margin: 2% 30% 0px 30%;">
		<?php
		if (isset($_GET['err'])) {
			echo "Virhe tallentaessa: Lanka tai väri ei voi alkaa tai loppua välilyöntiin";
		}elseif (isset($_GET['empty'])) {
			echo "Virhe tallentaessa: kaikki tiedot pitää täyttää!";
		}
		elseif (isset($_GET['done'])) {
			echo "Tiedot tallennettu!";
		}
		?>
		<form action="form.save.php" method="POST" id="formi">
			<div class="form-group">
				<label for="lanka">Lanka:</label> 
				<input type="text" name="lanka" class="form-control">
			</div>
			<div class="form-group">
				<label for="vari">Väri</label>
				<input type="text" name="vari" class="form-control">
			</div>
			<div class="form-group">	
				<label for="vkoodi">Värikoodi</label>
				<input type="number" name="vkoodi" class="form-control">
			</div>
			<div class="form-group">	
				<label for="paino">Paino</label>
				<input type="number" name="paino" class="form-control">
			</div>
				<input type="submit" value="submit" class="btn btn-primary">
				<input type="reset" value="reset" class="btn">
		</form>
	</div>
	<div>
		<?php 
			if ( isset($_GET['virhe'] ) ) {
				echo "virhe tallentaessa. kokeile uudelleen!";
			}
		?>
	</div>
</body>
</html>