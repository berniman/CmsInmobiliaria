<?php

include ("conexion.php");

		if (isset($_GET['grabar_btn'])){

				$id_inm=$_GET['id_inm'];
			 	$datos=unserialize($_GET['datos_grab']);

			 	$id_op_consulta="SELECT id_op FROM tipo_op WHERE operacion='$datos[15]';";
				$resultado_id_op=mysql_query($id_op_consulta);

				$id_op=mysql_fetch_array($resultado_id_op);



			 	$id_tipo_inm_consulta="SELECT id_tipo_inm FROM tipo_inm WHERE n_tipo_inm='$datos[16]';";
			 	$resultado_tipo_inm=mysql_query($id_tipo_inm_consulta);

			 	$id_tipo_inm=mysql_fetch_array($resultado_tipo_inm);


			 	$id_zona_consulta="SELECT id_zona FROM zonas WHERE zona='$datos[17]';";
			 	$resultado_id_zona=mysql_query($id_zona_consulta);

			 	$id_zona=mysql_fetch_array($resultado_id_zona);


			 	$id_subzona_consulta="SELECT id_subzona FROM subzonas WHERE subzona='$datos[18]';";
			 	$resultado_id_subzona=mysql_query($id_subzona_consulta);

			 	$id_subzona=mysql_fetch_array($resultado_id_subzona);


			 	$consulta_grab="INSERT INTO inmuebles VALUES (
			 		'$id_inm',
			 		'$datos[0]',
			 		'$datos[1]',
			 		'$datos[2]',
			 		'$datos[3]',
			 		'$datos[4]',
			 		'$datos[5]',
			 		'$datos[6]',
			 		'$datos[7]',
			 		'$datos[8]',
			 		'$datos[9]',
			 		'$datos[10]',
			 		'$datos[12]',
			 		'$datos[13]',
			 		'$datos[11]',
			 		'0',
			 		'$datos[14]',
			 		'$id_op[0]',
			 		'$id_tipo_inm[0]',
			 		'$id_zona[0]',
			 		'$id_subzona[0]'
			 		);";

				mysql_query($consulta_grab) or die ("No se ha podido realizar la consulta");


				$consulta_img_temp="SELECT url, id_inm, tipo_img FROM img_temp;";
				$resultado_img_temp=mysql_query($consulta_img_temp) or die ("No se ha podido realizar la conulta 1");

				while ($img_temp=mysql_fetch_array($resultado_img_temp)){

						$consulta_id_img="SELECT MAX(id_img) FROM imagenes";
						$resultado_id_img=mysql_query($consulta_id_img) or die ("No se ha podido realizar la consulta 2");

						$id_img_temp=mysql_fetch_array($resultado_id_img);

							if ($id_img_temp==null){

									$id_img=1;
							} else {		

									$id_img=$id_img_temp[0]+1;

							}

						$consulta_insert_img="INSERT INTO imagenes VALUES ('$id_img', '$img_temp[0]', '$img_temp[2]', '$img_temp[1]');";
						mysql_query($consulta_insert_img) or die ("No se ha podido realizar la consulta");

				}

				mysql_query("DELETE FROM img_temp;");


		} else {

			echo "Has entrado por donde no debes colega.";

		}
	

?>