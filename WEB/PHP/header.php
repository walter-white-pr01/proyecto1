<html>
<head>
	<link href="../CSS/headcss.css" rel="stylesheet" type="text/css" />
	<link href="../CSS/misreservas.css" rel="stylesheet" type="text/css" />
	<?php
		include 'conection.php';
		session_start();
		$user= $_SESSION['nombre'];
		$id= $_SESSION['id'];
		echo "<title>Mis Reservas | $user</title>";
	?>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">


</head>
<body>
	<nav>
	<div class="todo">
		<div class="imagen">
			<br>
			<img src="../images/prueba.jpg"width="110" height="40"/>
		</div>
		<a href='misreservas.php'>Mis Reservas</a>
		<a href='reservar.php'>Reservas</a>
		<div class="menuCSS3">
        <ul>
            </li>
            <li><a href="#">Hola
            	<?php
            	// session_start();
				echo $_SESSION['nombre'];

				?> 
				</a>
                <ul>
                    <li><a href="index.php">Cerrar sesion</a></li>
                </ul>

            </li>
        </ul>
    </div
			</li>
		</ul>
	</div>
		</div>
	</div>
	</nav>
</body>
</html>
