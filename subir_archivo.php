<?php

include ("conexion.php");

$id_inm=$_POST['id'];

$datos=$_POST['datos_form'];


$estructura="media/img/fotos_inmuebles/" . $id_inm;

	$consulta_id="SELECT id_img, url FROM imagenes WHERE id_inm='$id_inm';";
	$resultado_id=mysql_query($consulta_id);

	

		if ($id=mysql_fetch_array($resultado_id)==null){

			mkdir($estructura, 0777);

		} 

		$contador=$resultado_id[0]+1;

		$archivo=$_FILES['archivo_fls']['tmp_name'];
		$destino="./media/img/fotos_inmuebles/" . $id_inm . "/" . $id_inm . "_" . $contador . "_" . $_FILES['archivo_fls']['name'];


		if (move_uploaded_file($archivo, $destino)){

			$consulta_sel="SELECT url FROM img_temp;";
			$resultado_sel=mysql_query($consulta_sel) or die ("No se ha podido realizar la consulta");

			$sel=mysql_fetch_array($resultado_sel);

				if ($sel==null){

						$consulta_insertar_img="INSERT INTO img_temp VALUES ('$destino', '$id_inm', 'principal');";
						mysql_query($consulta_insertar_img);

						mysql_close($conexion) or die ("No se ha podido cerrar la conexion");

						header("Location:main_cms.php?inmueble&alta_inm&zona_sel&from_subir&datos=$datos");

				} else {

						$consulta_insertar_img="INSERT INTO img_temp VALUES ('$destino', '$id_inm', 'secundaria');";
						mysql_query($consulta_insertar_img);

						mysql_close($conexion) or die ("No se ha podido cerrar la conexion");

						header("Location:main_cms.php?inmueble&alta_inm&zona_sel&from_subir&datos=$datos&ancla_alta");

				}



		} else {

			echo "Ha habido un problema al subir el archivo";

		}
		



?>