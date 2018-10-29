<!DOCTYPE html>
<html>
<head>
	<title> Reservar </title>
	<script type="text/javascript" src="../JS/functions.js"></script>
	<link rel="stylesheet" type="text/css" href="../CSS/stylesheet_reservar.css">
	<?php
	include 'conection.php';
	?>
</head>
<body>
	<?php include "header.php" ?>

	<div class="centrado">
		<form action="reservar.php">
			<input type="text" name="busqueda" placeholder="Búsqueda avanzada">
			<select name="cate" class="categorias">
				<option value=""> --- </option>
				<?php
				$q = "SELECT * FROM categorias";
				$query = mysqli_query($link, $q);
				while ($array = mysqli_fetch_array($query)) {
					echo "<option value='".$array['cat_id']."'>".$array['cat_nom']."</option>";
				}

				?>
			</select>
			Vista:  <select name="vista" class="vista">
						<option value="3"> 3 </option>
						<option value="6"> 6 </option>
						<option value="0"> Todos </option>
					</select>
					<?php 
					$user_query = "SELECT * FROM users WHERE id_user=$id";
					$user_q = mysqli_query($link, $user_query);
					$perm = mysqli_fetch_array($user_q);
					if ($perm['permisos']==1) {
						echo "Disponibilidad ";
						echo "<select name='disponibilidad' class='disponibilidad'>";
						echo "<option value='all'> Todos </option>";
						echo "<option value='disp'> Disponible </option>";
						echo "<option value='Ndisp'> No Disponible </option>";
						echo "</select>";
					}

				
					?>
			<input type="submit" name="submit">
		</form>
		<?php 

		include 'reservar.proc.php';

		?>
	</div>

	<?php include "footer.php" ?>
</body>
</html>