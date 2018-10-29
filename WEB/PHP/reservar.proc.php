<?php   

include 'conection.php';

// Tipo de Usuario //


$select = "SELECT * FROM recurso";
$vistaza = mysqli_query($link, $select);
$toti = mysqli_num_rows($vistaza);

$id = $_SESSION['id'];
$user_query = "SELECT * FROM users WHERE id_user=$id";
$user_q = mysqli_query($link, $user_query);
$perm = mysqli_fetch_array($user_q);

if (isset($_REQUEST['vista'])) {
	$vista = $_REQUEST['vista'];
	if ($vista == "0") {
		$vista=$toti;
	}
}else{
	$vista = 3;
}

if (isset($_REQUEST['pag'])) {
	$pag = $_REQUEST['pag'];
	$limit_pag = $pag*$vista - $vista;
}else{
	$limit_pag = 0;
}

// Formar SELECTS //


$orden = "ORDER BY 'ASC'";
if (isset($_REQUEST['busqueda'])) {
	$busqued = "(nom_recur LIKE '%".$_REQUEST['busqueda']."%' OR descripcion LIKE '%".$_REQUEST['busqueda']."%') AND";
	$busqueda = $_REQUEST['busqueda'];
}else{
	$busqued = "";
}

if (isset($_REQUEST['disponibilidad'])) {
	if ($_REQUEST['disponibilidad']=='all') {
		echo "";
	}elseif ($_REQUEST['disponibilidad']=='disp') {
		$disp = "disponibilidad=0 AND";
	}else{
		$disp = "disponibilidad=1 AND";
	}
}else{
	$disp="";
}

if (isset($_REQUEST['cate'])) {
	if ($_REQUEST['cate'] != "") {
		$categ = "categoria = ".$_REQUEST['cate']." AND";
		$cate = $_REQUEST['cate'];
	}else{
		$cate = "";
		$categ = "";
	}
}else{
	$cate = "";
	$categ = "";
}
if ($perm['permisos']!=1) {
	$disp = "disponibilidad=0 AND";
}else{
	$disp="";
}


if (isset($_REQUEST['pag'])) {
	$seeyu = "LIMIT $limit_pag,$vista";
}else{
	$seeyu = "LIMIT 0,$vista";
}

$sql = "$select WHERE $disp $categ $busqued 1 $orden $seeyu";
$total = "$select WHERE $disp $categ $busqued 1 $orden";
// echo "$sql $total";
	$q_recursos = mysqli_query($link, $sql);
	$r_recursos = mysqli_query($link, $total);
	$limit = mysqli_num_rows($r_recursos);
	$t = $limit/$vista;

// FIN SELECTS /&

// if (isset($_REQUEST['busqueda'])) {
// 	$busqueda = $_REQUEST['busqueda'];
// 	if ($vista == "all") {
// 		if (isset($_REQUEST['cate'])) {
// 			$cate = $_REQUEST['cate'];
// 			if ($cate!="") {
// 				$q = "SELECT * FROM recurso WHERE disponibilidad=0 AND categoria=$cate AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC'";
// 				$r = "SELECT * FROM recurso WHERE disponibilidad=0 AND categoria=$cate AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC'";
// 			}else{
// 				$q = "SELECT * FROM recurso WHERE disponibilidad=0 AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC'";
// 				$r = "SELECT * FROM recurso WHERE disponibilidad=0 AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC'";
// 			}

// 		}else{

// 			$q = "SELECT * FROM recurso WHERE disponibilidad=0 AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC' LIMIT $limit_pag,$vista";
// 			$r = "SELECT * FROM recurso WHERE disponibilidad=0 AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC'";
// 		}
// 	}else{
// 	if (isset($_REQUEST['cate'])) {
// 		$cate = $_REQUEST['cate'];
// 		if ($cate!="") {
// 			$q = "SELECT * FROM recurso WHERE disponibilidad=0 AND categoria=$cate AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC' LIMIT $limit_pag,$vista";
// 			$r = "SELECT * FROM recurso WHERE disponibilidad=0 AND categoria=$cate AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC'";
// 		}else{
// 			$q = "SELECT * FROM recurso WHERE disponibilidad=0 AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC' LIMIT $limit_pag,$vista";
// 			$r = "SELECT * FROM recurso WHERE disponibilidad=0 AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC'";
// 		}

// 	}else{

// 		$q = "SELECT * FROM recurso WHERE disponibilidad=0 AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC' LIMIT $limit_pag,$vista";
// 		$r = "SELECT * FROM recurso WHERE disponibilidad=0 AND (nom_recur LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%') ORDER BY 'ASC'";
// 	}
// }
// 	$q_recursos = mysqli_query($link, $q);
// 	$r_recursos = mysqli_query($link, $r);
// 	$limit = mysqli_num_rows($r_recursos);
// 	$t = $limit/$vista;	

// }else{
// 	$q = "SELECT * FROM recurso WHERE disponibilidad=0 ORDER BY 'ASC' LIMIT $limit_pag,$vista";
// 	$r = "SELECT * FROM recurso WHERE disponibilidad=0 ORDER BY 'ASC'";
// 	$q_recursos = mysqli_query($link, $q);
// 	$r_query = mysqli_query($link, $r);
// 	$limit = mysqli_num_rows($r_query);
// 	$t = $limit/$vista;
// }


$cont = 0;
while ($recur_array=mysqli_fetch_array($q_recursos)) {
	if ($cont%2 == 0) {
		echo "<a href='recurso.php?id_elegido=".$recur_array['id_recurso']."' class='hiper''><div class='impar'>";
		echo "<div class='img' style='background: url(".$recur_array['img_src'].")'>";
		echo "</div>";
		echo "<div class='text'>";
		echo "<h2>".$recur_array['nom_recur']."</h2>";
		echo "<p>".$recur_array['descripcion']."</p>";
		if ($perm['permisos']==1) {
			if ($recur_array['disponibilidad']==0) {
				echo "El estado de este recurso es <b class='disponible'>disponible</b>";
			}else{
				echo "El estado de este recurso es <b class='Ndisponible'>no disponible</b>";
			}
		}
		echo "</div>";
		echo "</div></a>";
	}else{
		echo "<a href='recurso.php?id_elegido=".$recur_array['id_recurso']."' class='hiper'><div class='par'>";
		echo "<div class='text2'>";
		echo "<h2>".$recur_array['nom_recur']."</h2>";
		echo "<p>".$recur_array['descripcion']."</p>";
		if ($perm['permisos']==1) {
			if ($recur_array['disponibilidad']==0) {
				echo "El estado de este recurso es <b class='disponible'>disponible</b>";
			}else{
				echo "El estado de este recurso es <b class='Ndisponible'>no disponible</b>";
			}
		}
		echo "</div>";
		echo "<div class='img2' style='background: url(".$recur_array['img_src'].")'>";
		echo "</div>";
		echo "</div></a>";
		}
$cont++;
}

$disp=$_REQUEST['disponibilidad'];
if ($vista==$toti) {
	echo "";
}else{
// EMPIEZA PAGINADO //
echo "<div class='paginado'>";

$limite = ceil($t);
if (isset($_REQUEST['pag'])) {
	if (isset($busqueda)) {
		echo "<a href='reservar.php?busqueda=$busqueda&vista=$vista&cate=$cate&disponibilidad=$disp'><<</a> ";
		if ($limite==$pag || $limite-1==$pag) {
			if ($pag==$limite) {
				for ($num=$pag-$limite; $num < $pag; $num++) { 
				if ($num==1) {
					echo "<a href='reservar.php?busqueda=$busqueda&vista=$vista&cate=$cate&disponibilidad=$disp'>".$num."</a> ";
				}elseif ($num==0) {
					echo "";
				}else{
				echo "<a href='reservar.php?pag=$num&busqueda=$busqueda&vista=$vista&cate=$cate&disponibilidad=$disp'>".$num."</a> ";
				}
			}
			}else{
			for ($num=$pag-2; $num < $pag; $num++) { 
				if ($num==1) {
					echo "<a href='reservar.php?busqueda=$busqueda&vista=$vista&cate=$cate&disponibilidad=$disp'>".$num."</a> ";
				}elseif ($num==0) {
					echo "";
				}else{
				echo "<a href='reservar.php?pag=$num&busqueda=$busqueda&vista=$vista&cate=$cate&disponibilidad=$disp'>".$num."</a> ";
				}
			}
		}
		}else{
			for ($num=$pag-2; $num < $pag; $num++) { 
				if ($num==1) {
					echo "<a href='reservar.php?busqueda=$busqueda&vista=$vista&cate=$cate&disponibilidad=$disp'>".$num."</a> ";
				}elseif ($num==0) {
					echo "";
				}else{
				echo "<a href='reservar.php?pag=$num&busqueda=$busqueda&vista=$vista&cate=$cate&disponibilidad=$disp'>".$num."</a> ";
				}
			}
		}
			if ($limite==$pag || $limite-1==$pag) {
		if ($limite==$pag) {
			echo "<a href='reservar.php?pag=$num&busqueda=$busqueda&vista=$vista&cate=$cate&disponibilidad=$disp'>".$pag."</a> ";
		}else{
			echo "<a href='reservar.php?pag=$num&busqueda=$busqueda&vista=$vista&cate=$cate&disponibilidad=$disp'>".$pag."</a> ";
			$pag++;
			echo "<a href='reservar.php?pag=$pag&busqueda=$busqueda&vista=$vista&cate=$cate&disponibilidad=$disp'>".$pag."</a> ";
		}
		
	}elseif ($pag==2){
		for ($num=$pag; $num < $pag+4; $num++) { 
		echo "<a href='reservar.php?pag=$num&busqueda=$busqueda&vista=$vista&cate=$cate&disponibilidad=$disp'>".$num."</a> ";
		}
	

	}else{
			for ($num=$pag; $num < $pag+3; $num++) { 
			echo "<a href='reservar.php?pag=$num&busqueda=$busqueda&vista=$vista&cate=$cate&disponibilidad=$disp'>".$num."</a> ";
		}
	}
	echo " <a href='reservar.php?pag=$limite&busqueda=$busqueda&vista=$vista&cate=$cate&disponibilidad=$disp'>>></a>";
	}else{
		echo "<a href='reservar.php&cate=$cate'><<</a> ";
		if ($limite==$pag || $limite-1==$pag) {
			if ($pag==$limite) {
				for ($num=$pag-4; $num < $pag; $num++) { 
				if ($num==1) {
					echo "<a href='reservar.php?vista=$vista&cate=$cate&disponibilidad=$disp'>".$num."</a> ";
				}elseif ($num==0) {
					echo "";
				}else{
				echo "<a href='reservar.php?pag=$num&vista=$vista&cate=$cate&disponibilidad=$disp'>".$num."</a> ";
				}
			}
			}else{
			for ($num=$pag-3; $num < $pag; $num++) { 
				if ($num==1) {
					echo "<a href='reservar.php?vista=$vista&cate=$cate&disponibilidad=$disp'>".$num."</a> ";
				}elseif ($num==0) {
					echo "";
				}else{
				echo "<a href='reservar.php?pag=$num&vista=$vista&cate=$cate&disponibilidad=$disp'>".$num."</a> ";
				}
			}
		}
		}else{
			for ($num=$pag-2; $num < $pag; $num++) { 
				if ($num==1) {
					echo "<a href='reservar.php?vista=$vista&cate=$cate&disponibilidad=$disp'>".$num."</a> ";
				}elseif ($num==0) {
					echo "";
				}else{
				echo "<a href='reservar.php?pag=$num&vista=$vista&cate=$cate&disponibilidad=$disp'>".$num."</a> ";
				}
			}
		}
		if ($limite==$pag || $limite-1==$pag) {
		if ($limite==$pag) {
			echo "<a href='reservar.php?pag=$num&vista=$vista&cate=$cate&disponibilidad=$disp'>".$pag."</a> ";
		}else{
			echo "<a href='reservar.php?pag=$num&vista=$vista&cate=$cate&disponibilidad=$disp'>".$pag."</a> ";
			$pag++;
			echo "<a href='reservar.php?pag=$pag&vista=$vista&cate=$cate&disponibilidad=$disp'>".$pag."</a> ";
		}
		
	}elseif ($pag==2){
		for ($num=$pag; $num < $pag+4; $num++) { 
		echo "<a href='reservar.php?pag=$num&vista=$vista&cate=$cate&disponibilidad=$disp'>".$num."</a> ";
		}
	

	}else{
			for ($num=$pag; $num < $pag+3; $num++) { 
			echo "<a href='reservar.php?pag=$num&vista=$vista&cate=$cate&disponibilidad=$disp'>".$num."</a> ";
		}
	}
	echo " <a href='reservar.php?pag=$limite&vista=$vista&cate=$cate&disponibilidad=$disp'>>></a>";
	}

}else{

	if (isset($busqueda)) {
		echo "<a href='reservar.php?busqueda=$busqueda&vista=$vista&cate=$cate&disponibilidad=$disp'><<</a> ";
		for ($num=1; $num < $limite+1; $num++) { 
		if ($num==1) {
			echo "<a href='reservar.php?busqueda=$busqueda&vista=$vista&cate=$cate&disponibilidad=$disp'>".$num."</a> ";
		}else{
		echo "<a href='reservar.php?pag=$num&busqueda=$busqueda&vista=$vista&cate=$cate&disponibilidad=$disp'>".$num."</a> ";
		}
	}
	echo " <a href='reservar.php?pag=$limite&busqueda=$busqueda&vista=$vista&cate=$cate&disponibilidad=$disp'>>></a>";
	}else{
		echo "<a href='reservar.php?&vista=$vista&cate=$cate&disponibilidad=$disp'><<</a> ";
		for ($num=1; $num < $limite; $num++) { 
			if ($num==1) {
				echo "<a href='reservar.php?vista=$vista&cate=$cate&disponibilidad=$disp'>".$num."</a> ";
			}else{
			echo "<a href='reservar.php?pag=$num&vista=$vista&cate=$cate&disponibilidad=$disp'>".$num."</a> ";
			}
		}
		echo " <a href='reservar.php?pag=$limite&vista=$vista&cate=$cate&disponibilidad=$disp'>>></a>";
	}
}

// ACABA PAGINADO //
}
echo "</div>";

?>