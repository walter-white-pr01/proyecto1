<?php
session_start();
$id=$_SESSION['id'];
$link = mysqli_connect('172.24.17.144', 'Marc', '159753', 'bd_casal_ww');
$resu=$_REQUEST['idrecurso'];
$hoy=getdate();
$hora=$hoy['hours'];
$minutos=$hoy['minutes'];
$dia=$hoy['mday'];
$mes=$hoy['mon'];
$año=$hoy['year'];
$segundos=$hoy['seconds'];
$fecha=$año."-".$mes."-".$dia." ".$hora.":".$minutos.":".$segundos;
$sql="UPDATE recurso SET disponibilidad = 1 WHERE recurso.id_recurso = $resu";
$sql2="INSERT INTO `reservas` (`id_reserva`, `id_user`, `id_recurso`, `fecha_ini`, `fecha_fin`) VALUES (NULL, $id, $resu, '$fecha', NULL)";
mysqli_query($link,$sql);
mysqli_query($link,$sql2);
header("Status: 301 Moved Permanently");
header("Location: reservar.php");
?>
