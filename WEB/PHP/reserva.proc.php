<?php
session_start();
//id de usuario
$id=$_SESSION['id'];
//conexion
include "header.php";
//id de recurso
$resu=$_REQUEST['idrecurso'];
//fecha por partes
$hoy=getdate();
$hora=$hoy['hours'];
$minutos=$hoy['minutes'];
$dia=$hoy['mday'];
$mes=$hoy['mon'];
$año=$hoy['year'];
$segundos=$hoy['seconds'];
//fecha en una sola variable
$fecha=$año."-".$mes."-".$dia." ".$hora.":".$minutos.":".$segundos;
//Consultas
$sql="UPDATE recurso SET disponibilidad = 1 WHERE recurso.id_recurso = $resu";
$sql2="INSERT INTO `reservas` (`id_reserva`, `id_user`, `id_recurso`, `fecha_ini`, `fecha_fin`,`Estado`) VALUES (NULL, $id, $resu, '$fecha', NULL,0)";
//Ejecucion de consultas
mysqli_query($link,$sql);
mysqli_query($link,$sql2);
header("Status: 301 Moved Permanently");
header("Location: reservar.php");
?>
