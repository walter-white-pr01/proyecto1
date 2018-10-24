<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<!-- Llamamos al Header -->	
<?php 
	include 'header.php';
?>
<div>
	<div>
		<form method="POST" action="login.proc.php" onsubmit="validate()">
			<label>Introduce el usuario/email</label><input type="text" name="user">
			<label>Introduce la contraseña</label><input type="password" name="pass">
			<div class="error_login">
			<?php
			if (isset($_REQUEST['err'])) {
				# code...
			}
				echo "El usuario o la contraseña son incorrectos";
			?>
			</div>
			<input type="submit" name="submit">
		</form>
	</div>
</div>

</body>
</html>