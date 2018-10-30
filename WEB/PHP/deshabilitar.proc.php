<?php
include 'conection.php';
$idrecurso=$_REQUEST['idr'];
$disponibilidades=$_REQUEST['disponi'];
echo "$idrecurso<br>";
echo "$disponibilidades";
if ($disponibilidades==0) {
	$disponibilidades2=1;
}else{ 
	$disponibilidades2=0;
}
$sql="UPDATE `recurso` SET `disponibilidad` = '$disponibilidades2' WHERE `recurso`.`id_recurso` = $idrecurso";
echo $sql;
mysqli_query($link,$sql);
header("Location: infoincidencias.php");

?>