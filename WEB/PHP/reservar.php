<!DOCTYPE html>
<html>
<head>
	<title> Reservar </title>
	<script type="text/javascript" src="../JS/functions.js"></script>
	<link rel="stylesheet" type="text/css" href="../CSS/stylesheet_reservar.css">
</head>
<body>
	<?php include "header.php" ?>

	<div class="centrado">
		<form action="reservar.php">
			<input type="text" name="busqueda" placeholder="Búsqueda avanzada">
		</form>
		<?php 

		include 'reservar.proc.php';

		?>
	</div>

	<?php include "footer.php" ?>
</body>
</html>