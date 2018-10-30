<?php
session_start();
include "conection.php";
//Asunto de la incidencia
$asunto=$_REQUEST['asunto'];
//Id del usuario
$id=$_SESSION['id'];
//Id del recurso
$resu=$_REQUEST['idrecurso'];
//Tipo del recurso
$tipo=$_REQUEST['tipo'];
//Descripcion de la incidencia
$desc=$_REQUEST['descripcion'];
//Fecha por partes
$hoy=getdate();
$hora=$hoy['hours'];
$minutos=$hoy['minutes'];
$dia=$hoy['mday'];
$mes=$hoy['mon'];
$año=$hoy['year'];
$segundos=$hoy['seconds'];
//Juntamos toda fecha en una misma variable
$fecha=$año."-".$mes."-".$dia." ".$hora.":".$minutos.":".$segundos;
//Consulta
$sql="INSERT INTO `indicencias` (`id_recurso`, `id_user`, `tipo_incidencia`, `asunto`, `fecha_ini`,`fecha_fin` ,`descripcion`) VALUES ($resu, $id, $tipo,'$asunto','$fecha', NULL,'$desc')";
//Ejecucion consulta
mysqli_query($link,$sql);
//Header
header("Location: recurso.php?id_elegido=$resu");
?>