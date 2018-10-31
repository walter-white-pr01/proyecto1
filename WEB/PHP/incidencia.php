<script type="text/javascript" src="../JS/functions_inci.js"></script>
<?php
include "header.php";
$q = "SELECT * FROM tipo_incidencia ORDER BY nom_incidencia";
	$q_tipoincidencia = mysqli_query($link, $q);
$idrecu=$_REQUEST['idrecurso'];
?>

<form action="incidencia.proc.php" id="form" method="POST" onsubmit="return validate()">
	
	<?php
	echo "<input type='hidden' value='$idrecu' name='idrecurso'/>"
	?>
	Asunto: <input type="text" name="asunto" id="asu" size="25"/><br/><br/>
		Tipo<select name="tipo">

		<?php
			if(mysqli_num_rows($q_tipoincidencia)>0){
				while($tipoincidencia=mysqli_fetch_array($q_tipoincidencia)){
					echo "<option value='$tipoincidencia[id_tipo]'>".utf8_encode($tipoincidencia['nom_incidencia'])."</option>";
				}
			}
		?>
		</select><br/><br/>
			Descripcion: <textarea name="descripcion" id="desc">Describe aqui tu incidencia</textarea><br/>
		<input type="submit"/>
	</form>
