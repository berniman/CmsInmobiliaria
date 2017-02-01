
<?php

include ("conexion.php");

if (isset($_POST['enviar_btn'])){


$usuario=$_POST['usuario_txt'];
$pass=$_POST['pass_txt'];


$conexion=mysql_connect('localhost', 'root', '') or die ("No se ha podido realizar la conexión con el SGBD");
mysql_select_db('inmobiliaria') or die ("No se ha podido conectar con la BBDD");

$consulta="SELECT usuario, pass, rol FROM usuarios WHERE usuario='$usuario';";
$resultado=mysql_query($consulta) or die ("No se ha podido realizar la consulta");

$dato=mysql_fetch_array($resultado);


		if ($dato[0]==$usuario && $dato[1]==$pass){

				session_start();

						$_SESSION['logueado']=true;
						$_SESSION['usuario']=$dato[0];
						$_SESSION['time']=time();
						$_SESSION['rol']=$dato[2];

				header("Location:main_cms.php");

		} else {

			header("Location:usuarios.php?error_validar");

		}

mysql_close($conexion) or die ("no se ha podido cerrar la conexion con el SGBD");		

} else {

	header("Location:usuarios.php?error_ingreso");

}		





?>