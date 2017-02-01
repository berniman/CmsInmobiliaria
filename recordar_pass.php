
<?php

if (isset($_POST['recordar_btn'])){

		$email=$_POST['email_usuario'];

		$conexion=mysql_connect('localhost', 'root', '') or die ('No se ha podido establecer la conexion con el SGBD.');
		mysql_select_db('inmobiliaria', $conexion) or die ('No se ha podido conectar con la BBDD.');

		$consulta="SELECT usuario, pass, email FROM usuarios WHERE email='$email';";
		$resultado=mysql_query($consulta);

		$dato=mysql_fetch_array($resultado);

				if ($dato[2]==$email){

							$correo_de_entrega=$email;
							$asunto="Recordatorio de credenciales de acceso.";

							$cuerpo_del_mensaje="Recordatorio de usuario y contraseña: \n";
							$cuerpo_del_mensaje.="------------------------------------- \n";
							$cuerpo_del_mensaje.="Usuario: " . $dato[0] . "\n";
							$cuerpo_del_mensaje.="Contraseña: " . $dato[1] . "\n";
							$cuerpo_del_mensaje.="------------------------------------- \n\n";
							$cuerpo_del_mensaje.="Recuerde poner a buen recaudo estos datos.";

							if (mail($correo_de_entrega, $asunto, $cuerpo_del_mensaje)){

								header("Location:usuarios.php?mensaje_ok");

							} else {

								header("Location:usuarios.php?error_mensaje");

							}


				} else {

					header("Location:usuarios.php?error_email");

				}

		mysql_close($conexion) or die ("No se ha podido cerrar la conexión.");		

} else {

		echo "
			<form name='recordar_pass' action='recordar_pass.php' method='post' enctype='application/x-www-urlencoded'>
				<article>
					<label>Introduzca su email</label>
					<input type='text' name='email_usuario'/>
				</article>
				<article>
					<input type='submit' name='recordar_btn' value='Enviar'/>
				</article>			
		";			

}

?>