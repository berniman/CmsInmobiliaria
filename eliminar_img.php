<?php

include ("conexion.php");

$datos=$_GET['datos'];
$url_eliminar=$_GET['eliminar'];


	$consulta="DELETE FROM img_temp WHERE url='$url_eliminar';";
	mysql_query($consulta) or die ("No se ha podido realizar la consulta");

	mysql_close($conexion) or die ("No se ha podido cerrar la conexión");

	unlink($url_eliminar);

	header("Location:main_cms.php?inmueble&alta_inm&zona_sel&from_subir&datos=$datos&ancla_alta");


?>