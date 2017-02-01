<!DOCTYPE html>
<html lang="es">
<header>
	<title>Inmocasa S.L.</title>
	<meta charset="UTF-8"/>
	<meta name="author" content="Berna Reyes"/>
	<meta name="description" content="Tu inmobiliaria cercana y de confianza"/>

	<link rel="stylesheet" href="css/estilos.css"/>
</header>
<body>	



<?php
include ("sesion.php");
include ("funciones.php");


if (time()>$_SESSION['time']+180000){

	header("Location:salir.php");

} else {


	echo "<article>Bienvenido " . $_SESSION['usuario'] . "." . "&nbsp&nbsp&nbsp&nbsp&nbsp" . date("d/m/y") . "</article>";


		if (isset($_GET['inmueble'])){

				echo "

						<section class='nav_cms'>
								<a href='main_cms.php?inmueble&alta_inm'><img class='icono_nav' src='media/img/icono_alta_inm.png'/></a>

								<a href='main.cms.php?modificacion'><img class='icono_nav' src='media/img/icono_mod_inm.png'/></a>

								<a href='main_cms.php?baja'><img class='icono_nav' src='media/img/icono_baja_inm.png'/></a>
						</section>		
					";

					if (isset($_GET['alta_inm'])){

								if ((isset($_GET['zona_sel'])) || (isset($_GET['subzona_sel']))) {

										if (isset($_GET['from_subir'])){

												if (isset($_GET['ancla_alta'])){

													$datos=$_GET['datos'];

													header("Location:main_cms.php?inmueble&alta_inm&zona_sel&from_subir&datos=$datos&#ancla");
												}	

											$datos_recuperados=unserialize($_GET['datos']);


											

											AltaInmueble($datos_recuperados);

											echo "<a name='ancla'></a>";


										} else {


												$datos_recuperados=[
																	$_GET['titulo_txt'],
																	$_GET['metros_txt'],
																	$_GET['precio_txt'],
																	$_GET['p_m2_txt'],
																	$_GET['dormitorios_txt'],
																	$_GET['banos_txt'],
																	$_GET['antiguedad_txt'],
																	$_GET['orientacion_txt'],
																	$_GET['calefaccion_txt'],
																	$_GET['tipo_suelo_txt'],
																	$_GET['tipo_fachada_txt'],
																	$_GET['telefono_txt'],
																	$_GET['comentario_txa'],
																	$_GET['observaciones_txa'],
																	$_GET['estado_sel'],
																	$_GET['operacion_sel'],
																	$_GET['tipo_inm_sel'],
																	$_GET['zona_sel'],
																	$_GET['subzona_sel']
																	];

												AltaInmueble($datos_recuperados);
										}
								
								} else {

										$datos_inicio=null;

										AltaInmueble($datos_inicio);

								}	

					}								


		} else if (isset($_GET['admin_usuario'])){

			echo "Hemos entrado en administración de usuarios";
		


		} else {

			echo "

			<section class='icono_admin_prin'>
				<article class='icono_admin'>
					<a href='main_cms.php?inmueble&alta_inm'><img class='imagen_icono' src='media/img/inmueble.png'></a>
						<article>
							<span>Administrción de inmuebles</span>
						</article>
				</article>	
			
				<article class='icono_admin'>
					<a href='main_cms.php?admin_usuario'><img class='imagen_icono' src='media/img/usuario.png'></a>
						<article>
							<span>Administración de usuarios</span>
						</article> 
				</article>	
			</section>	
			";

		}

}



?>

</body>
</html>