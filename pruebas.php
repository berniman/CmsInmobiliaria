<!DOCTYPE html>
<html lang='es'>
<head>
	<title>Prueba</title>
	<meta charset="UTF-8"/>
</head>
<body>

		<form name="form_examen" action="pruebas.php" method="get" enctype="text/plain">
			<label>Coche: </label>

				<?php

					if (isset($_GET['zona'])){

						$zona=$_GET['zona'];

						echo "zona seleccionada " . $zona . "</br>";

						echo "
								<select name='zona' onchange='submit();' disabled>
									<option value='$zona' selected>$zona</option>	
						";

					} else {

						echo "Zona NO seleccionada</br>";

						echo "
								<select name='zona' onchange='submit();'>
									<option value='' selected>Seleccionar</option>
						";

					}

						$conexion=mysql_connect('localhost', 'root', '') or die ("No se ha podido establecer la conexión con el SGBD");
						mysql_query("SET NAMES 'UTF8'");
						mysql_select_db('inmobiliaria', $conexion) or die ("No se ha podido conectar con la BBDD");

						$consulta="SELECT zona FROM zonas;";
						$resultado=mysql_query($consulta) or die ("No se ha podido realizar la consulta");

						while($dato=mysql_fetch_array($resultado)){

								echo "
										<option value='$dato[0]'>$dato[0]</option>
								";


						}

						echo "</select>";

					echo "
							<select name='subzona'>
								<option value=''>Seleccionar</option>
					";

					if (isset($_GET['zona'])){

						$consulta_2="SELECT subzona FROM zonas, subzonas WHERE zonas.id_zona=subzonas.id_zona AND zona='$zona';";
						$resultado_2=mysql_query($consulta_2) or die ("No se ha podido realizar la consulta");

						while ($dato_2=mysql_fetch_array($resultado_2)){

							echo "
								<option value='$dato_2[0]'>$dato_2[0]</option>
							";	

						}	


					echo "
							
							</select>
							<input type='hidden' name='zona' value='$zona'>	
					";

					}

					mysql_close($conexion) or die ("No se ha podido cerrar la conexión");


				?>

				<div class="botones">
						<input type="submit" class="mano" name="enviar_btn" value="Enviar"/>
						<input type="reset" class="mano" name="reset_btn" value="Borrar"/>
		</form>				

</body>
</html>