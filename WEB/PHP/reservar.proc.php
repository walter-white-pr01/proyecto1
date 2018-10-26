<?php   

include 'conection.php';



if (isset($_REQUEST['pag'])) {
	$paginado = $_REQUEST['pag'];
	$limit_pag = $paginado*3 - 3;
}else{
	$limit_pag = 0;
}

if (isset($busqueda)) {
	$q = "SELECT * FROM recurso WHERE nom_recur LIKE '%$busqueda%' OR descripcion AND disponibilidad=0 LIKE '%$busqueda%' ORDER BY 'ASC' LIMIT $limit_pag,3";
	$q_recursos = mysqli_query($link, $q);
	$recur_array = mysqli_fetch_array($q_recursos);
	$limit = mysqli_num_rows($q_recursos);
	$t = $limit/3;
}else{
	$q = "SELECT * FROM recurso ORDER BY 'ASC' WHERE disponibilidad=0 LIMIT $limit_pag,3";
	$r = "SELECT * FROM recurso ORDER BY 'ASC'";
	$q_recursos = mysqli_query($link, $q);
	$r_query = mysqli_query($link, $r);
	$limit = mysqli_num_rows($r_query);
	$t = $limit/3;
}

$cont = 0;
while ($recur_array=mysqli_fetch_array($q_recursos)) {
	if ($cont%2 == 0) {
		echo "<a href='recurso.php?id_elegido=".$recur_array['id_recurso']."' class='hiper''><div class='impar'>";
		echo "<div class='img' style='background: url(".$recur_array['img_src'].")'>";
		echo "</div>";
		echo "<div class='text'>";
		echo "<h2>".$recur_array['nom_recur']."</h2>";
		echo "<p>".$recur_array['descripcion']."</p>";
		echo "</div>";
		echo "</div></a>";
	}else{
		echo "<a href='recurso.php?id_elegido=".$recur_array['id_recurso']."' class='hiper'><div class='par'>";
		echo "<div class='text2'>";
		echo "<h2>".$recur_array['nom_recur']."</h2>";
		echo "<p>".$recur_array['descripcion']."</p>";
		echo "</div>";
		echo "<div class='img2' style='background: url(".$recur_array['img_src'].")'>";
		echo "</div>";
		echo "</div></a>";
		}
$cont++;
}

// PAGINADO
echo "<div class='paginado'>";
if (isset($_REQUEST['pag'])) {
	$t=ceil($t);
for ($c=$paginado; $c < $t+1; $c++) { 
	echo "<a href='reservar.php?pag=$c'>".$c."</a>";
}
}else{
	$t=ceil($t);
for ($c=1; $c < $t+1; $c++) { 

	echo "<a href='reservar.php?pag=$c'>".$c."</a>";
}
}
echo "</div>";

?>