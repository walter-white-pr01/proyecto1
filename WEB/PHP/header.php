<html>
<head>
	<link href="../CSS/headcss.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<nav>
	<div class="todo">
		<div class="imagen">
			<br>
			<img src="../images/prueba.jpg"width="110" height="40"/>
		</div>
		<a href='Misreservas.php'>Mis Reservas</a>
		<a href='Reservas.php'>Reservas</a>
		<div class="menuCSS3">
        <ul>
            </li>
            <li><a href="#">Hola
            	<?php
            	session_start();
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
