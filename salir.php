
<?php
	
	session_start();
	session_destroy();

	header("Location:usuarios.php?fin_sesion");


?>