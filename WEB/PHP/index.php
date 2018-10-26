<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<script type="text/javascript" src="../JS/functions.js"></script>
	<link rel="stylesheet" type="text/css" href="../CSS/stylesheet_index.css">
</head>
<body>
<!-- Llamamos al Header -->	
<!-- <?php 
	include 'header.php';
?>
 -->
<div class="centrado">
	<img src="../images/logo_index.png">
	<div class="text_centrado">
		<form method="POST" name="loggin" action="login.proc.php" onsubmit="return validate()">
			<label></label><input type="text" id="user" name="user" placeholder="Usuario/Email"><br><br>
			<label></label><input type="password" id="pass" name="pass" placeholder="Contraseña"><br><br>
			<div class="error_login">
			<?php

			if (isset($_REQUEST['err'])) {
				echo "<b>El usuario o la contraseña son incorrectos</b>";
			}
				
			?>
			</div><br>
			<input type="submit" name="submit">
		</form>
	</div>
</div>

</body>
</html>