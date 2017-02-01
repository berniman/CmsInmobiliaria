<?php

	$conexion=mysql_connect("localhost", "root", "") or die ("No se ha podido realizar la conexion con el SGBD");
	mysql_query("SET NAMES 'UTF8'");
	mysql_select_db("inmobiliaria", $conexion) or die ("No se ha podido seleccionar la BBDD");

?>