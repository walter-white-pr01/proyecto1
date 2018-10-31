<?php

include 'conection.php';
$tipo = $_REQUEST['tip'];
$id = $_REQUEST['id'];

if (isset($_REQUEST['que'])) {
	$que = $_REQUEST['que'];
	$rec_id = $_REQUEST['recid'];
}

if ($tipo == 1) {
	$query = 'UPDATE';
	$tabla = 'reservas';
	$where = "WHERE id_reserva=".$id;
	$set = "SET Estado=1 ";

	$hoy=getdate();
	$hora=$hoy['hours'];
	$minutos=$hoy['minutes'];
	$dia=$hoy['mday'];
	$mes=$hoy['mon'];
	$año=$hoy['year'];
	$segundos=$hoy['seconds'];
	//fecha en una sola variable
	$fecha=$año."-".$mes."-".$dia." ".$hora.":".$minutos.":".$segundos;
	$int_fecha = "SET fecha_fin='".$fecha."'";
	$fecha_query = "$query $tabla $int_fecha $where";
	$fecha_q = mysqli_query($link, $fecha_query);
}else{
	$set = "";
}

if ($tipo == 2) {
	$query = 'DELETE FROM';
	$tabla = 'reservas';
	$where = "WHERE id_reserva=".$id;
}

if ($tipo == 3) {
	if ($que == 1) {
		$query = 'DELETE FROM';
		$tabla = 'indicencias';
	}elseif ($que == 2) {
		$query = 'UPDATE';
		$tabla = 'indicencias';
		$set = "SET estado=1";
		$hoy=getdate();
		$hora=$hoy['hours'];
		$minutos=$hoy['minutes'];
		$dia=$hoy['mday'];
		$mes=$hoy['mon'];
		$año=$hoy['year'];
		$segundos=$hoy['seconds'];
		//fecha en una sola variable
		$fecha=$año."-".$mes."-".$dia." ".$hora.":".$minutos.":".$segundos;
		$int_fecha = "SET fecha_fin='".$fecha."'";
		$fecha_query = "$query $tabla $int_fecha WHERE id_incidencia=".$id;
		$fecha_q = mysqli_query($link, $fecha_query);
		echo "$fecha_query";
	}else{
		$set = "";
	}
	$where="WHERE id_incidencia=".$id;
}

$status="$query $tabla $set $where";
// echo "$status";
$query = mysqli_query($link, $status);


if ($tipo == 1) {
	$recur="update recurso SET disponibilidad=0 WHERE id_recurso=".$id;
}elseif ($tipo == 3) {
	$recur="update recurso SET disponibilidad=0 WHERE id_recurso=".$rec_id;
}
	$query2 = mysqli_query($link, $recur);
// // echo "$recur";
header('Location: misreservas.php');