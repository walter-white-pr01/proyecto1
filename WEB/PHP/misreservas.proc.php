
<?php 
	include "conection.php";
	$id=$_SESSION['id'];
	$consulta= "Select permisos from users where id_user=$id";
		// echo "$consulta";
		$permiso= mysqli_query($link, $consulta);
		$permisos=mysqli_fetch_array($permiso);
		if ($permisos[0]==1) {
			// echo "Admin";
			$consultaReservasActivas= "Select recurso.nom_recur, recurso.categoria, recurso.disponibilidad, reservas.id_reserva, reservas.fecha_ini, reservas.Estado, reservas.fecha_fin, users.id_user, users.user, users.user_name, users.user_telf from reservas inner join recurso on reservas.id_recurso=recurso.id_recurso inner join users on reservas.id_user=users.id_user WHERE reservas.Estado=0";
			$consultaReservas= "Select recurso.nom_recur, recurso.categoria, recurso.disponibilidad, reservas.id_reserva, reservas.fecha_ini, reservas.Estado, reservas.fecha_fin, users.id_user, users.user, users.user_name, users.user_telf from reservas inner join recurso on reservas.id_recurso=recurso.id_recurso inner join users on reservas.id_user=users.id_user WHERE reservas.Estado=1";
			$consultaIncidencias= "Select indicencias.id_incidencia, indicencias.tipo_incidencia, indicencias.asunto, indicencias.fecha_ini, indicencias.fecha_fin, recurso.nom_recur, recurso.descripcion, users.id_user, users.user_name FROM indicencias INNER JOIN recurso ON indicencias.id_recurso=recurso.id_recurso INNER JOIN users ON indicencias.id_user=users.id_user";
			// echo "$consultaReservas $consultaIncidencias";

		}elseif ($permisos[0]==2) {
			// echo "Eres Normal";
			$consultaReservasActivas= "Select recurso.nom_recur, recurso.categoria, recurso.disponibilidad, reservas.id_reserva, reservas.fecha_ini, reservas.fecha_fin, users.user_name, users.user_name, users.user_telf from reservas inner join recurso on reservas.id_recurso=recurso.id_recurso inner join users on reservas.id_user=users.id_user where users.id_user=$id and reservas.Estado=0";
			$consultaReservas= "Select recurso.nom_recur, recurso.categoria, recurso.disponibilidad, reservas.id_reserva, reservas.fecha_ini, reservas.fecha_fin, users.user_name, users.user_name, users.user_telf from reservas inner join recurso on reservas.id_recurso=recurso.id_recurso inner join users on reservas.id_user=users.id_user where users.id_user=$id and reservas.Estado=1";
			// echo $consultaReservas;

		}elseif ($permisos[0]==3) {
			// echo "Tecnico";
			$consultaIncidencias = "Select indicencias.id_incidencia, indicencias.tipo_incidencia, indicencias.asunto, indicencias.fecha_ini, indicencias.fecha_fin, recurso.nom_recur, recurso.descripcion, users.id_user, users.user_name FROM indicencias INNER JOIN recurso ON indicencias.id_recurso=recurso.id_recurso INNER JOIN users ON indicencias.id_user=users.id_user";
			// echo "$consultaIncidencias";

		}else{
			// echo "Error 001 Permiso no asignado";
			header('Location: index.php?err=1');
		}
		//consulta reservas activas
		if (isset($consultaReservasActivas)) {
			$reservasA=mysqli_query($link,$consultaReservasActivas);
				if(mysqli_num_rows($reservasA)>0){
					echo "<h1>Reservas Activas</h1>";
					while($resA=mysqli_fetch_array($reservasA)){
						echo "<div class='tarjeta'>";
							echo "<div class='title'>";
								echo $resA['nom_recur'];
							echo "</div>";
							echo "<div class='fecha'>";
								echo $resA['fecha_ini'];
							echo "</div";
							echo "<div class='opciones'>";
								echo "<a href='cancelR?idr=".$resA['id_reserva']."'><i>X</i></a>";
							echo "</div>";
							echo "<div>";
								echo "<div class='activo'>";
							echo "</div>";
						echo "</div>";
					}
					
				}else{
					echo "<p class='eBusqueda'>Parece que no hay ninguna reserva activa</p>";
				}

			}
			//consultas inactivas
			if (isset($consultaReservas)) {
			echo "<div class='ventana'>";
				echo "<h1>Reservas Anteriores</h1>";

			$reservasR=mysqli_query($link,$consultaReservas);
				if(mysqli_num_rows($reservasR)>0){
					while($res=mysqli_fetch_array($reservasR)){
						echo "<div class='tarjeta'>";
							echo "<div class='title'>";
								echo $res['nom_recur'];
							echo "</div>";
							echo "<div class='fecha'>";
								echo $res['fecha_ini'];
							echo "</div>";
							echo "<div class='fecha2'>";
								echo $res['fecha_fin'];
							echo "</div>";
							echo "<div class='opciones'>";
								echo "<a href='cancelR?idr=".$res['id_reserva']."'><i>X</i></a>";
							echo "</div>";
							echo "<div>";
								echo "<div class='activo'></div>";
							echo "</div>";
						echo "</div>";
					}
					
				}else{
					echo "<p class='eBusqueda'>Parece que no hay ninguna reserva activa</p>";
				}
				echo "</div>";
			}
			//consulta incidencias
			if (isset($consultaIncidencias)) {
			$incidencia=mysqli_query($link,$consultaIncidencias);
				if(mysqli_num_rows($incidencia)>0){
					echo "<h1>Incidencias</h1>";
					while($in=mysqli_fetch_array($incidencia)){
						echo "<div class='tarjeta'>";
							echo "<div class='title'>";
								echo $in['asunto'];
							echo "</div>";
							echo "<div class='fecha'>";
								echo $in['descripcion'];
							echo "</div";
							echo "<div class='opciones'>";
								echo "<a href='cancelR?idr=".$in['id_incidencia']."'><i>X</i></a>";
							echo "</div>";
							echo "<div>";
								echo "<div class='inactivo'>";
							echo "</div>";
						echo "</div>";
					}
					
				}else{
					echo "<p class='eBusqueda'>Parece que no hay incidencias</p>";
				}

			}
?>