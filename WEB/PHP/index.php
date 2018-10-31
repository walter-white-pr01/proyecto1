<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<script type="text/javascript" src="../JS/functions.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../CSS/estilo.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
</head>
<body class="login">
<!-- Llamamos al Header -->	
<!-- <?php 
	//include 'header.php';
?>
 -->
<div class="centrar">
	<div class="centrarV">
		<div class="form">	
			<img src="../images/logo_index.png">
			<div class="text_centrado">
				<form method="POST" name="loggin" action="login.proc.php" onsubmit="return validate()">
					<label></label><input type="text" id="user" name="user" placeholder="Usuario/Email" autofocus>
					<label></label><input type="password" id="pass" name="pass" placeholder="Contraseña">
					<div class="error_login">
					<?php

					if (isset($_REQUEST['err'])) {
						echo "<b>El usuario o la contraseña son incorrectos</b>";
					}
						
					?>
					</div>
					<input class="btn" type="submit" name="submit">
				</form>
			</div>
		</div>
	</div>
</div>

</body>
</html>