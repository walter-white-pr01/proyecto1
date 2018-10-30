<?php
include "header.php";
$q = "SELECT * FROM tipo_incidencia ORDER BY nom_incidencia";
	$q_tipoincidencia = mysqli_query($link, $q);
$idrecu=$_REQUEST['idrecurso'];
?>
<form action="incidencia.proc.php" method="GET">
	<?php
	echo "<input type='hidden' value='$idrecu' name='idrecurso'/>"
	?>
	Asunto: <input type="text" name="asunto" size="25"/><br/><br/>
		Tipo<select name="tipo">

		<?php
			if(mysqli_num_rows($q_tipoincidencia)>0){
				while($tipoincidencia=mysqli_fetch_array($q_tipoincidencia)){
					echo "<option value='$tipoincidencia[id_tipo]'>".utf8_encode($tipoincidencia['nom_incidencia'])."</option>";
				}
			}
		?>
		</select><br/><br/>
			Descripcion: <textarea name="descripcion">Describe aqui tu incidencia</textarea><br/>
		<input type="submit"/>
	</form>
