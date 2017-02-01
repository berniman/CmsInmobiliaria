
<?php

session_start();

	if ($_SESSION['logueado']!=true){

		header("Location:salir.php");

	}


?>