<?php   

include 'conection.php';



if (isset($_REQUEST['pag'])) {
	$pag = $_REQUEST['pag'];
	$limit_pag = $pag*3 - 3;
}else{
	$limit_pag = 3;
}

if (isset($_REQUEST['busqueda'])) {
	$busqueda = $_REQUEST['busqueda'];
	$q = "SELECT * FROM recurso WHERE nom_recur LIKE '%$busqueda%' OR descripcion AND disponibilidad=0 LIKE '%$busqueda%' ORDER BY 'ASC' LIMIT $limit_pag,3";
	$q_recursos = mysqli_query($link, $q);
	$recur_array = mysqli_fetch_array($q_recursos);
	$limit = mysqli_num_rows($q_recursos);
	$t = $limit/3;
}else{
	$q = "SELECT * FROM recurso WHERE disponibilidad=0 ORDER BY 'ASC' LIMIT $limit_pag,3";
	$r = "SELECT * FROM recurso WHERE disponibilidad=0 ORDER BY 'ASC'";
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



// EMPIEZA PAGINADO //
echo "<div class='paginado'>";
echo "<a href='reservar.php'><<</a> ";

$limite = ceil($t);
if (isset($_REQUEST['pag'])) {

	if ($limite==$pag || $limite-1==$pag) {
		if ($pag==$limite) {
			for ($num=$pag-4; $num < $pag; $num++) { 
			if ($num==1) {
				echo "<a href='reservar.php'>".$num."</a> ";
			}elseif ($num==0) {
				echo "";
			}else{
			echo "<a href='reservar.php?pag=$num'>".$num."</a> ";
			}
		}
		}else{
		for ($num=$pag-3; $num < $pag; $num++) { 
			if ($num==1) {
				echo "<a href='reservar.php'>".$num."</a> ";
			}elseif ($num==0) {
				echo "";
			}else{
			echo "<a href='reservar.php?pag=$num'>".$num."</a> ";
			}
		}
	}
	}else{
	for ($num=$pag-2; $num < $pag; $num++) { 
		if ($num==1) {
			echo "<a href='reservar.php'>".$num."</a> ";
		}elseif ($num==0) {
			echo "";
		}else{
		echo "<a href='reservar.php?pag=$num'>".$num."</a> ";
		}
	}
	}

	if ($limite==$pag || $limite-1==$pag) {
		if ($limite==$pag) {
			echo "<a href='reservar.php?pag=$num'>".$pag."</a> ";
		}else{
			echo "<a href='reservar.php?pag=$num'>".$pag."</a> ";
			$pag++;
			echo "<a href='reservar.php?pag=$pag'>".$pag."</a> ";
		}
		
		}elseif ($pag==2){
			for ($num=$pag; $num < $pag+4; $num++) { 
			echo "<a href='reservar.php?pag=$num'>".$num."</a> ";
		}
	}else{
			for ($num=$pag; $num < $pag+3; $num++) { 
			echo "<a href='reservar.php?pag=$num'>".$num."</a> ";
		}
	}
}else{
	for ($num=1; $num < 6; $num++) { 
		echo "<a href='reservar.php?pag=$num'>".$num."</a> ";
	}
}
echo " <a href='reservar.php?pag=$limite'>>></a>";
// ACABA PAGINADO //
echo "</div>";

?>