<?php   

include 'conection.php';

if (isset($_REQUEST['vista'])) {
	$vista = $_REQUEST['vista'];
}else{
	$vista = 3;
}

if (isset($_REQUEST['pag'])) {
	$pag = $_REQUEST['pag'];
	$limit_pag = $pag*$vista - $vista;
}else{
	$limit_pag = 0;
}

if (isset($_REQUEST['busqueda'])) {
	$busqueda = $_REQUEST['busqueda'];
	if ($vista == "all") {
		if (isset($_REQUEST['cate'])) {
			$cate = $_REQUEST['cate'];
			if ($cate!="") {
				$q = "SELECT * FROM recurso WHERE disponibilidad=0 AND categoria=$cate AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC'";
				$r = "SELECT * FROM recurso WHERE disponibilidad=0 AND categoria=$cate AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC'";
			}else{
				$q = "SELECT * FROM recurso WHERE disponibilidad=0 AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC'";
				$r = "SELECT * FROM recurso WHERE disponibilidad=0 AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC'";
			}

		}else{

			$q = "SELECT * FROM recurso WHERE disponibilidad=0 AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC' LIMIT $limit_pag,$vista";
			$r = "SELECT * FROM recurso WHERE disponibilidad=0 AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC'";
		}
	}else{
	if (isset($_REQUEST['cate'])) {
		$cate = $_REQUEST['cate'];
		if ($cate!="") {
			$q = "SELECT * FROM recurso WHERE disponibilidad=0 AND categoria=$cate AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC' LIMIT $limit_pag,$vista";
			$r = "SELECT * FROM recurso WHERE disponibilidad=0 AND categoria=$cate AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC'";
		}else{
			$q = "SELECT * FROM recurso WHERE disponibilidad=0 AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC' LIMIT $limit_pag,$vista";
			$r = "SELECT * FROM recurso WHERE disponibilidad=0 AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC'";
		}

	}else{

		$q = "SELECT * FROM recurso WHERE disponibilidad=0 AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC' LIMIT $limit_pag,$vista";
		$r = "SELECT * FROM recurso WHERE disponibilidad=0 AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC'";
	}
}
	$q_recursos = mysqli_query($link, $q);
	$r_recursos = mysqli_query($link, $r);
	$limit = mysqli_num_rows($r_recursos);
	$t = $limit/$vista;	

}else{
	$q = "SELECT * FROM recurso WHERE disponibilidad=0 ORDER BY 'ASC' LIMIT $limit_pag,$vista";
	$r = "SELECT * FROM recurso WHERE disponibilidad=0 ORDER BY 'ASC'";
	$q_recursos = mysqli_query($link, $q);
	$r_query = mysqli_query($link, $r);
	$limit = mysqli_num_rows($r_query);
	$t = $limit/$vista;
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


if ($vista=="all") {
	echo "";
}else{
// EMPIEZA PAGINADO //
echo "<div class='paginado'>";

$limite = ceil($t);
if (isset($_REQUEST['pag'])) {
	if (isset($busqueda)) {
		echo "<a href='reservar.php?busqueda=$busqueda&vista=$vista'><<</a> ";
		if ($limite==$pag || $limite-1==$pag) {
			if ($pag==$limite) {
				for ($num=$pag-$limite; $num < $pag; $num++) { 
				if ($num==1) {
					echo "<a href='reservar.php?busqueda=$busqueda&vista=$vista'>".$num."</a> ";
				}elseif ($num==0) {
					echo "";
				}else{
				echo "<a href='reservar.php?pag=$num&busqueda=$busqueda&vista=$vista'>".$num."</a> ";
				}
			}
			}else{
			for ($num=$pag-2; $num < $pag; $num++) { 
				if ($num==1) {
					echo "<a href='reservar.php?busqueda=$busqueda&vista=$vista'>".$num."</a> ";
				}elseif ($num==0) {
					echo "";
				}else{
				echo "<a href='reservar.php?pag=$num&busqueda=$busqueda&vista=$vista'>".$num."</a> ";
				}
			}
		}
		}else{
			for ($num=$pag-2; $num < $pag; $num++) { 
				if ($num==1) {
					echo "<a href='reservar.php?busqueda=$busqueda&vista=$vista'>".$num."</a> ";
				}elseif ($num==0) {
					echo "";
				}else{
				echo "<a href='reservar.php?pag=$num&busqueda=$busqueda&vista=$vista'>".$num."</a> ";
				}
			}
		}
			if ($limite==$pag || $limite-1==$pag) {
		if ($limite==$pag) {
			echo "<a href='reservar.php?pag=$num&busqueda=$busqueda&vista=$vista'>".$pag."</a> ";
		}else{
			echo "<a href='reservar.php?pag=$num&busqueda=$busqueda&vista=$vista'>".$pag."</a> ";
			$pag++;
			echo "<a href='reservar.php?pag=$pag&busqueda=$busqueda&vista=$vista'>".$pag."</a> ";
		}
		
	}elseif ($pag==2){
		for ($num=$pag; $num < $pag+4; $num++) { 
		echo "<a href='reservar.php?pag=$num&busqueda=$busqueda&vista=$vista'>".$num."</a> ";
		}
	

	}else{
			for ($num=$pag; $num < $pag+3; $num++) { 
			echo "<a href='reservar.php?pag=$num&busqueda=$busqueda&vista=$vista'>".$num."</a> ";
		}
	}
	echo " <a href='reservar.php?pag=$limite&busqueda=$busqueda&vista=$vista'>>></a>";
	}else{
		echo "<a href='reservar.php'><<</a> ";
		if ($limite==$pag || $limite-1==$pag) {
			if ($pag==$limite) {
				for ($num=$pag-4; $num < $pag; $num++) { 
				if ($num==1) {
					echo "<a href='reservar.php?vista=$vista'>".$num."</a> ";
				}elseif ($num==0) {
					echo "";
				}else{
				echo "<a href='reservar.php?pag=$num&vista=$vista'>".$num."</a> ";
				}
			}
			}else{
			for ($num=$pag-3; $num < $pag; $num++) { 
				if ($num==1) {
					echo "<a href='reservar.php?vista=$vista'>".$num."</a> ";
				}elseif ($num==0) {
					echo "";
				}else{
				echo "<a href='reservar.php?pag=$num&vista=$vista'>".$num."</a> ";
				}
			}
		}
		}else{
			for ($num=$pag-2; $num < $pag; $num++) { 
				if ($num==1) {
					echo "<a href='reservar.php?vista=$vista'>".$num."</a> ";
				}elseif ($num==0) {
					echo "";
				}else{
				echo "<a href='reservar.php?pag=$num&vista=$vista'>".$num."</a> ";
				}
			}
		}
		if ($limite==$pag || $limite-1==$pag) {
		if ($limite==$pag) {
			echo "<a href='reservar.php?pag=$num&vista=$vista'>".$pag."</a> ";
		}else{
			echo "<a href='reservar.php?pag=$num&vista=$vista'>".$pag."</a> ";
			$pag++;
			echo "<a href='reservar.php?pag=$pag&vista=$vista'>".$pag."</a> ";
		}
		
	}elseif ($pag==2){
		for ($num=$pag; $num < $pag+4; $num++) { 
		echo "<a href='reservar.php?pag=$num&vista=$vista'>".$num."</a> ";
		}
	

	}else{
			for ($num=$pag; $num < $pag+3; $num++) { 
			echo "<a href='reservar.php?pag=$num&vista=$vista'>".$num."</a> ";
		}
	}
	echo " <a href='reservar.php?pag=$limite&vista=$vista'>>></a>";
	}

}else{

	if (isset($busqueda)) {
		echo "<a href='reservar.php?busqueda=$busqueda&vista=$vista'><<</a> ";
		for ($num=1; $num < $limite+1; $num++) { 
		if ($num==1) {
			echo "<a href='reservar.php?busqueda=$busqueda&vista=$vista'>".$num."</a> ";
		}else{
		echo "<a href='reservar.php?pag=$num&busqueda=$busqueda&vista=$vista'>".$num."</a> ";
		}
	}
	echo " <a href='reservar.php?pag=$limite&busqueda=$busqueda&vista=$vista'>>></a>";
	}else{
		echo "<a href='reservar.php?&vista=$vista'><<</a> ";
		for ($num=1; $num < $limite+1; $num++) { 
			if ($num==1) {
				echo "<a href='reservar.php?vista=$vista'>".$num."</a> ";
			}else{
			echo "<a href='reservar.php?pag=$num&vista=$vista'>".$num."</a> ";
			}
		}
		echo " <a href='reservar.php?pag=$limite&vista=$vista'>>></a>";
	}
}

// ACABA PAGINADO //
}
echo "</div>";

?>