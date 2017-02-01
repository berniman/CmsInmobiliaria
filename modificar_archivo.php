<?php

include ("conexion.php");

$datos=$_GET['datos_env'];
$modificacion=$_GET['imagen'];

	$consulta_mod_sec="UPDATE img_temp SET tipo_img='secundaria';";
	mysql_query($consulta_mod_sec) or die ("No se ha podido realizar la consulta");

	$consulta_mod_prin="UPDATE img_temp SET tipo_img='principal' WHERE url='$modificacion';";
	mysql_query($consulta_mod_prin) or die ("No se ha podido realizar la consulta");

	header("Location:main_cms.php?inmueble&alta_inm&zona_sel&from_subir&datos=$datos&ancla_alta");

?>