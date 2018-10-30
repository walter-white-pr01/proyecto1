<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include 'conection.php';
//$incidencia=$_REQUEST[''];
$sql="SELECT indicencias.id_incidencia, indicencias.tipo_incidencia, indicencias.asunto, indicencias.fecha_ini, indicencias.fecha_fin, recurso.nom_recur, recurso.descripcion,recurso.id_recurso, users.id_user, users.user_name, recurso.disponibilidad FROM indicencias INNER JOIN recurso ON indicencias.id_recurso=recurso.id_recurso INNER JOIN users ON indicencias.id_user=users.id_user WHERE indicencias.id_incidencia=11";
$query=mysqli_query($link,$sql);
while ($array = mysqli_fetch_array($query)) {
		echo  "<div class='asunto'>";
			echo $array['asunto'];
		echo "</div>";
		echo  "<div class='descripcion'>";
			echo $array['descripcion'];
		echo "</div>";
		echo  "<div class='recurso'>";
			echo $array['nom_recur'];
		echo "</div>";
		echo  "<div class='tipoincidencia'>";
			echo $array['tipo_incidencia'];
		echo "</div>";
		echo  "<div class='fechaini'>";
			echo $array['fecha_ini'];
		echo "</div>";
		$id=$array['id_recurso'];
		$dispo=$array['disponibilidad'];
}

if ($dispo==0) {
	echo "<a href='deshabilitar.proc.php?idr=$id&disponi=$dispo'>Deshabilitar</a>";
}else{
	echo "<a href='deshabilitar.proc.php?idr=$id&disponi=$dispo'>Habilitar</a>";
}
?>
</body>
</html>
