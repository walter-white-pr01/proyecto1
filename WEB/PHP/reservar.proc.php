<?php   

include 'conection.php';



if (isset($paginado)) {
	$limit_pag = $paginado*3 - 3;
}else{
	$limit_pag = 0;
}

if (isset($busqueda)) {
	$q = "SELECT * FROM recurso WHERE nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%' ORDER BY 'ASC' LIMIT $limit_pag,3";
	$q_recursos = mysqli_query($link, $q);
	$recur_array = mysqli_fetch_array($q_recursos);
	$limit = mysqli_rows();
}else{
	$q = "SELECT * FROM recurso ORDER BY 'ASC' LIMIT $limit_pag,3";
	$q_recursos = mysqli_query($link, $q);
}

$cont = 0;
while ($recur_array=mysqli_fetch_array($q_recursos)) {
	if ($cont%2 == 0) {
		echo "<a href='recurso.php?id_elegido=".$recur_array['id_recurso']."'><div class='impar'>";
		echo "<div class='img' background: url('".$recur_array['img_src']."')>";
		echo "</div>";
		echo "<div class='text'>";
		echo "<h2>".$recur_array['nom_recur']."</h2>";
		echo "<p>".$recur_array['descripcion']."</p>";
		echo "</div>";
		echo "</div></a>";
	}else{
		echo "<a href='recurso.php?id_elegido=".$recur_array['id_recurso']."'><div class='par'>";
		echo "<div class='text'>";
		echo "<h2>".$recur_array['nom_recur']."</h2>";
		echo "<p>".$recur_array['descripcion']."</p>";
		echo "</div>";
		echo "<div class='img' background: url('".$recur_array['img_src']."')>";
		echo "</div>";
		echo "</div></a>";
		}
$cont++;
}



?>