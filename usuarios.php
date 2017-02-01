<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inmocasa S.L.</title>
	<meta charset="UTF-9"/>
	<meta name="author" content="Berna Reyes"/>
	<meta name="description" content="Tu inmobiliaria cercana y de confianza"/>

	<link rel="stylesheet" href="css/estilos.css"/>
</head>
<body>

	<?php

			if (isset($_GET['error_validar'])){

				echo "
					  <script>
							alert('El usuario o contraseña son erróneos, por favor, inténtelo de nuevo.');
					  </script>
				";

			} else if(isset($_GET['error_ingreso'])) {

				echo "
					  <script>
					  		alert('No ha ingresado de manera correcta. Por favor, inténtelo de nuevo.');
					  </script>		

				";

			} else if (isset($_GET['error_email'])){

				echo "
					  <script>
					  		alert('El email ingresado no consta en nuestra base de datos. Por favor, inténtelo de nuevo.');
					  </script>		
				";

			} else if (isset($_GET['error_mensaje'])){

				echo "
					  <script>
					  		alert('Ha ocurrido un error al enviarle el mensaje. Por favor, pruebe de nuevo en unos minutos.');
					  </script>			
				";

			} else if (isset($_GET['mensaje_ok'])){

				echo "
					  <script>
					  		alert('Hemos enviado con éxito sus credenciales de acceso a su correo electrónico.');
					  </script>			
				";

			} else if (isset($_GET['fin_sesion'])){

				echo " 
					  <script>
					  		alert('La sesión ha expirado');
					  </script>		
				";

			}			


	?>

		<form name='val_usuario' action='validar_usuario.php' method='post' enctype='application/x-www-urlencoded'>
			<article class="intro_usuarios">
				<label>Usuario: </label>
				<input type='text' name='usuario_txt'/>
			</article>

			<article class="intro_usuarios">
				<label>Contraseña: </label>
				<input type='password' name='pass_txt'/>
			</article>

			<article class="intro_usuarios">
				<a href="recordar_pass.php">Si ha olvidado sus credenciales de acceso pulse aquí.</a>
			</article>		

			<article class="intro_usuarios">
				<input type='reset' name='borrar_btn' value='Borrar'/>
				<input type='submit' name='enviar_btn' value='Ingresar'/>
			</article>
	
		</form>

	



</body>
</html>