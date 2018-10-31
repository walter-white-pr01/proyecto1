<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../CSS/estilo.css">
	<?php
		include 'conection.php';
		session_start();
		$user= $_SESSION['nombre'];
		$id= $_SESSION['id'];
		echo "<title>Mis Reservas | $user</title>";
	?>

</head>
<body>
	<nav class="menu">
		<a href=""></a>
		<a href="#">Hola
            	<?php
            	// session_start();
				echo $_SESSION['nombre'];
				?> 
				<
        </a>
                
	</nav>
</body>
</html>
