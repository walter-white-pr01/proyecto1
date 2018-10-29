<!DOCTYPE html>
<html>
<head>
	<link href="headcss.css" rel="stylesheet" type="text/css" />
	<title></title>

</head>
<body>
<?php include 'header.php'; ?>
	<?php
$_SESSION['id']=1;
$link = mysqli_connect('172.24.17.144', 'Marc', '159753', 'bd_casal_ww');
//$recurso=$_REQUEST['id_elegido'];
$recurso=2;
$query1 = "SELECT * FROM recurso WHERE id_recurso=$recurso";
$q_recurso = mysqli_query($link, $query1);

			if(mysqli_num_rows($q_recurso)>0){
				while($rec=mysqli_fetch_array($q_recurso)){
					echo "<b>Nombre:</b> ".$rec['nom_recur']."<br>";
					echo "<b>Descripcion:</b> ".$rec['descripcion']."<br>";
					echo "<img src='".$rec['img_src']."'/>";
					if($rec['disponibilidad']==0){
						echo "<a href='reserva.proc.php?idrecurso=$rec[id_recurso]'>Reservar</a><br/>";
					}else{
						echo "<a href='#'>No disponible</a><br/>";
					}
					
				}
			}
		?>
</body>
</html>



