<?php 
	include "conection.php";
	$id=$_SESSION['id'];
	$consulta= "Select permisos from users where id_user=$id";
		// echo "$consulta";
		$permiso= mysqli_query($link, $consulta);
		$permisos=mysqli_fetch_array($permiso);
		if (isset($_REQUEST['desh'])) {
			$idrecur = $_REQUEST['namerec'];
			if ($_REQUEST['desh']==0) {
				$hab = "update recurso set disponibilidad=0 where id_recurso=$idrecur";
				$habilitar = mysqli_query($link, $hab);
			}elseif ($_REQUEST['desh']==1) {
				$hab = "update recurso set disponibilidad=1 where id_recurso=$idrecur";
				$habilitar = mysqli_query($link, $hab);
			}
		}
		if (isset($_REQUEST['cual'])) {
			$cual = $_REQUEST['cual'];
			$wUser = "";
			$wCat = "";
			$wRecu = "";
			$wOrden = "";
			$wUser1 = "";
			$wCat1 = "";
			$wRecu1 = "";
			$wOrden1 = "";
			$wUser2 = "";
			$wCat2 = "";
			$wRecu2 = "";
			$wOrden2 = "";
			if ($cual == 1) {
				if ($_REQUEST['filt_user']!="") {
					$qUser = $_REQUEST['filt_user'];
					$wUser = "AND users.user='$qUser'";
				}
				if ($_REQUEST['filt_cat']!="") {
					$categoriaw = $_REQUEST['filt_cat'];
					$wCat = "AND recurso.categoria='$categoriaw'";
				}
				if ($_REQUEST['filt_recu']!="") {
					$recurw = $_REQUEST['filt_recu'];
					$wRecu = "AND recurso.id_recurso='$recurw'";
				}
				if ($_REQUEST['orden']!="") {
					$ordenw = $_REQUEST['orden'];
					$wOrden = " ORDER BY fecha_ini $ordenw";
				}
			}elseif ($cual == 2) {
				if ($_REQUEST['filt_user']!="") {
					$qUser = $_REQUEST['filt_user'];
					$wUser1 = "AND users.user='$qUser'";
				}
				if ($_REQUEST['filt_cat']!="") {
					$categoriaw = $_REQUEST['filt_cat'];
					$wCat1 = "AND recurso.categoria='$categoriaw'";
				}
				if ($_REQUEST['filt_recu']!="") {
					$recurw = $_REQUEST['filt_recu'];
					$wRecu1 = "AND recurso.id_recurso='$recurw'";
				}
				if ($_REQUEST['orden']!="") {
					$ordenw = $_REQUEST['orden'];
					$wOrden1 = " ORDER BY fecha_ini $ordenw";
				}
			}elseif ($cual == 3){
				if ($_REQUEST['filt_user']!="") {
					$qUser = $_REQUEST['filt_user'];
					$wUser2 = " AND users.user='$qUser'";
				}
				if ($_REQUEST['filt_cat']!="") {
					$categoriaw = $_REQUEST['filt_cat'];
					$wCat2 = " AND recurso.categoria='$categoriaw'";
				}
				if ($_REQUEST['filt_recu']!="") {
					$recurw = $_REQUEST['filt_recu'];
					$wRecu2 = " AND recurso.id_recurso='$recurw'";
				}
				if ($_REQUEST['orden']!="") {
					$ordenw = $_REQUEST['orden'];
					$wOrden2 = " ORDER BY fecha_ini $ordenw";
				}
			}
		}else{
			$wUser = "";
			$wCat = "";
			$wRecu = "";
			$wOrden = "";
			$wUser1 = "";
			$wCat1 = "";
			$wRecu1 = "";
			$wOrden1 = "";
			$wUser2 = "";
			$wCat2 = "";
			$wRecu2 = "";
			$wOrden2 = "";
		}
		if ($permisos[0]==1) {
			// echo "Admin";
			$consultaReservasActivas= "Select recurso.nom_recur, recurso.categoria, recurso.disponibilidad, reservas.id_reserva, reservas.fecha_ini, reservas.Estado, reservas.fecha_fin, users.id_user, users.user, users.user_name, users.user_telf from reservas inner join recurso on reservas.id_recurso=recurso.id_recurso inner join users on reservas.id_user=users.id_user WHERE reservas.Estado=0 $wUser $wCat $wRecu $wOrden";
			$consultaReservas= "Select recurso.nom_recur, recurso.categoria, recurso.disponibilidad, reservas.id_reserva, reservas.fecha_ini, reservas.Estado, reservas.fecha_fin, users.id_user, users.user, users.user_name, users.user_telf from reservas inner join recurso on reservas.id_recurso=recurso.id_recurso inner join users on reservas.id_user=users.id_user WHERE reservas.Estado=1 $wUser1 $wCat1 $wRecu1 $wOrden1";
			$consultaIncidencias= "Select indicencias.id_incidencia, indicencias.tipo_incidencia, indicencias.asunto, indicencias.fecha_ini, indicencias.fecha_fin, recurso.id_recurso, recurso.nom_recur, recurso.descripcion, users.id_user, users.user_name, tipo_incidencia.nom_incidencia, recurso.disponibilidad FROM indicencias INNER JOIN recurso ON indicencias.id_recurso=recurso.id_recurso INNER JOIN users ON indicencias.id_user=users.id_user INNER JOIN tipo_incidencia ON tipo_incidencia.id_tipo=indicencias.tipo_incidencia WHERE 1 $wUser2 $wCat2 $wRecu2 $wOrden2";
		}elseif ($permisos[0]==2) {
			// echo "Eres Normal";
			$consultaReservasActivas= "Select recurso.nom_recur, recurso.categoria, recurso.disponibilidad, reservas.id_reserva, reservas.fecha_ini, reservas.fecha_fin, users.user_name, users.user_name, users.user_telf from reservas inner join recurso on reservas.id_recurso=recurso.id_recurso inner join users on reservas.id_user=users.id_user where users.id_user=$id and reservas.Estado=0 $wUser $wCat $wRecu $wOrden";
			$consultaReservas= "Select recurso.nom_recur, recurso.categoria, recurso.disponibilidad, reservas.id_reserva, reservas.fecha_ini, reservas.fecha_fin, users.user_name, users.user_name, users.user_telf from reservas inner join recurso on reservas.id_recurso=recurso.id_recurso inner join users on reservas.id_user=users.id_user where users.id_user=$id and reservas.Estado=1 $wUser1 $wCat1 $wRecu1 $wOrden1";
			// echo $consultaReservas;
		}elseif ($permisos[0]==3) {
			// echo "Tecnico";
			$consultaIncidencias = "Select indicencias.id_incidencia, indicencias.tipo_incidencia, indicencias.asunto, indicencias.fecha_ini, indicencias.fecha_fin, recurso.nom_recur, recurso.descripcion, users.id_user, users.user_name, recurso.id_recurso, tipo_incidencia.nom_incidencia, recurso.disponibilidad FROM indicencias INNER JOIN recurso ON indicencias.id_recurso=recurso.id_recurso INNER JOIN users ON indicencias.id_user=users.id_user INNER JOIN tipo_incidencia ON tipo_incidencia.id_tipo=indicencias.tipo_incidencia WHERE 1 $wUser2 $wCat2 $wRecu2 $wOrden2";
			// echo "$consultaIncidencias";
		}else{
			// echo "Error 001 Permiso no asignado";
			header('Location: index.php?err=1');
		}
		$fltrd_user = "select * from users";
		$fltrd_cat = "select * from categorias";
		$fltrd_rec = "select id_recurso, nom_recur from recurso";
		$fltrd_user= mysqli_query($link, $fltrd_user);
		$fltrd_cat= mysqli_query($link, $fltrd_cat);
		$fltrd_rec= mysqli_query($link, $fltrd_rec);
		//consulta reservas activas
		if (isset($consultaReservasActivas)) {
			echo "<h1>Reservas Activas</h1>";
			echo "Filtrar por: <br>";
			echo "<form action='misreservas.php' method='POST'>";
			if ($permisos[0]==1) {
			echo "Usuario <select name='filt_user' class='filtrar'>";
				echo "<option value=''> --- </option>";
				while ($filtrado = mysqli_fetch_array($fltrd_user)) {
					echo "<option value='".$filtrado['user']."'> ".$filtrado['user']." </option>";;
				}
			echo "</select>";
		}
			echo "Categoria <select name='filt_cat' class='filtrar'>";
				echo "<option value=''> --- </option>";
				while ($filtrado = mysqli_fetch_array($fltrd_cat)) {
					echo "<option value='".$filtrado['cat_id']."'> ".$filtrado['cat_nom']." </option>";;
				}
			echo "</select>";
			echo "Recurso <select name='filt_recu' class='filtrar'>";
				echo "<option value=''> --- </option>";
				while ($filtrado = mysqli_fetch_array($fltrd_rec)) {
					echo "<option value='".$filtrado['id_recurso']."'> ".$filtrado['nom_recur']." </option>";;
				}
			echo "</select>";
			echo "Fecha <select name='orden' class='filtrar'>";
					echo "<option value='ASC'> Ascendente </option>";
					echo "<option value='DESC'> Ascendente </option>";
			echo "</select>";
				echo "<input type='hidden' value='1' name='cual'>";
				echo " <input type='submit' name='submit'>";
			echo "</form>";
			$reservasA=mysqli_query($link,$consultaReservasActivas);
				if(mysqli_num_rows($reservasA)>0){
					
					while($resA=mysqli_fetch_array($reservasA)){
						echo "<div class='tarjeta'>";
							echo "<div class='title'>";
								echo "Reserva '".$resA['nom_recur']."'";
							echo "</div>";
							if ($permisos[0]==1) {
								echo "<div class='user'>";
									echo $resA['user_name'];
								echo "</div>";
							}
							echo "<div class='fecha'>";
								echo $resA['fecha_ini'];
							echo "</div";
							echo "<div class='opciones'>";
								echo "<a href='cancel.proc.php?tip=1&id=".$resA['id_reserva']."'><i class='fas fa-check'></i></a>";
							echo "</div>";
							echo "<div>";
								echo "<div class='activo'>";
								echo "<i class='fas fa-circle'></i></i>";
								echo "";
							echo "</div>";
						echo "</div>";
					}
					
				}else{
					echo "<p class='eBusqueda'>Parece que no hay ninguna reserva activa</p>";
				}
			}
		$fltrd_user = "select * from users";
		$fltrd_cat = "select * from categorias";
		$fltrd_rec = "select id_recurso, nom_recur from recurso";
		$fltrd_user= mysqli_query($link, $fltrd_user);
		$fltrd_cat= mysqli_query($link, $fltrd_cat);
		$fltrd_rec= mysqli_query($link, $fltrd_rec);
			//consultas inactivas
			if (isset($consultaReservas)) {
				echo "<h1>Reservas Anteriores</h1>";
			echo "Filtrar por: <br>";
			echo "<form action='misreservas.php' method='POST'>";
						if ($permisos[0]==1) {
			echo "Usuario <select name='filt_user' class='filtrar'>";
				echo "<option value=''> --- </option>";
				while ($filtrado = mysqli_fetch_array($fltrd_user)) {
					echo "<option value='".$filtrado['user']."'> ".$filtrado['user']." </option>";;
				}
			echo "</select>";
		}
			echo "Categoria <select name='filt_cat' class='filtrar'>";
				echo "<option value=''> --- </option>";
				while ($filtrado = mysqli_fetch_array($fltrd_cat)) {
					echo "<option value='".$filtrado['cat_id']."'> ".$filtrado['cat_nom']." </option>";;
				}
			echo "</select>";
			echo "Recurso <select name='filt_recu' class='filtrar'>";
				echo "<option value=''> --- </option>";
				while ($filtrado = mysqli_fetch_array($fltrd_rec)) {
					echo "<option value='".$filtrado['id_recurso']."'> ".$filtrado['nom_recur']." </option>";;
				}
			echo "</select>";
			echo "Fecha <select name='orden' class='filtrar'>";
					echo "<option value='ASC'> Ascendente </option>";
					echo "<option value='DESC'> Descendente </option>";
			echo "</select>";
				echo "<input type='hidden' value='2' name='cual'>";
				echo " <input type='submit' name='submit'>";
			echo "</form>";
			}
			if (isset($consultaReservas)) {
			echo "<div class='ventana'>";
				
			$reservasR=mysqli_query($link,$consultaReservas);
				if(mysqli_num_rows($reservasR)>0){
					while($res=mysqli_fetch_array($reservasR)){
						echo "<div class='tarjeta'>";
							echo "<div class='title'>";
								echo "Reserva '".$res['nom_recur']."'";
							echo "</div>";
							if ($permisos[0]==1) {
								echo "<div class='user'>";
									echo $res['user_name'];
								echo "</div>";
							}
							echo "<div class='fecha'>";
								echo $res['fecha_ini'];
							echo "</div>";
							echo "<div class='fecha2'>";
								echo $res['fecha_fin'];
							echo "</div>";
							echo "<div class='opciones'>";
								echo "<a href='cancel.proc.php?tip=2&id=".$res['id_reserva']."'><i class='fas fa-times-circle'></i></a>";
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
		$fltrd_user = "select * from users";
		$fltrd_cat = "select * from categorias";
		$fltrd_rec = "select id_recurso, nom_recur from recurso";
		$fltrd_user= mysqli_query($link, $fltrd_user);
		$fltrd_cat= mysqli_query($link, $fltrd_cat);
		$fltrd_rec= mysqli_query($link, $fltrd_rec);
			//consulta incidencias
			if (isset($consultaIncidencias)) {
				echo "<h1>Incidencias</h1>";
			echo "Filtrar por: <br>";
			echo "<form action='misreservas.php' method='POST'>";
						if ($permisos[0]==1 || $permisos[0]==3) {
			echo "Usuario <select name='filt_user' class='filtrar'>";
					echo "<option value=''> --- </option>";
				while ($filtrado = mysqli_fetch_array($fltrd_user)) {
					echo "<option value='".$filtrado['user']."'> ".$filtrado['user']." </option>";;
				}
			echo "</select>";
		}
			echo "Categoria <select name='filt_cat' class='filtrar'>";
				echo "<option value=''> --- </option>";
				while ($filtrado = mysqli_fetch_array($fltrd_cat)) {
					echo "<option value='".$filtrado['cat_id']."'> ".$filtrado['cat_nom']." </option>";;
				}
			echo "</select>";
			echo "Recurso <select name='filt_recu' class='filtrar'>";
				echo "<option value=''> --- </option>";
				while ($filtrado = mysqli_fetch_array($fltrd_rec)) {
					echo "<option value='".$filtrado['id_recurso']."'> ".$filtrado['nom_recur']." </option>";;
				}
			echo "</select>";
			echo "Fecha <select name='orden' class='filtrar'>";
					echo "<option value='ASC'> Ascendente </option>";
					echo "<option value='DESC'> Descendente </option>";
			echo "</select>";
				echo "<input type='hidden' value='3' name='cual'>";
				echo " <input type='submit' name='submit'>";
			echo "</form>";
		
			$incidencia=mysqli_query($link,$consultaIncidencias);
				if(mysqli_num_rows($incidencia)>0){
					
					while($in=mysqli_fetch_array($incidencia)){
						echo "<div class='tarjeta'>";
							echo "<div class='title'>";
								echo "Incidencia '".$in['asunto']."'";
							echo "</div>";
							echo "<div class='tipo'>";
								echo $in['nom_incidencia'];
							echo "</div>";
							echo "<div class='user'>";
								echo $in['user_name'];
							echo "</div";
							echo "<div class='fecha_ini'>";
								echo $in['fecha_ini'];
							echo "</div>";
							echo "<div class='fecha_fin'>";
								echo $in['fecha_fin'];
							echo "</div>";
							if ($in['disponibilidad']==0) {
								echo "<a href='misreservas.php?desh=1&namerec=".$in['id_recurso']."'><i class='fas fa-arrow-circle-down'></i></a>";
							}else{
								echo "<a href='misreservas.php?desh=0&namerec=".$in['id_recurso']."'><i class='fas fa-arrow-circle-up'></i></a>";
							}
							echo "<div class='habilitar'>";
								echo "";
							echo "</div>";
							echo "<div class='opciones'>";
								echo "<a href='cancel.proc.php?tip=3&id=".$in['id_incidencia']."&que=2&recid=".$in['id_recurso']."'><i class='fas fa-check'></i></a>";
							echo "</div>";
							echo "<div class='opciones'>";
								echo "<a href='cancel.proc.php?tip=3&id=".$in['id_incidencia']."&que=1&recid=".$in['id_recurso']."'><i class='fas fa-times-circle'></i></a>";
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