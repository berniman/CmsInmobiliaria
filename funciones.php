
<?php

function AltaInmueble($datos){

	include ("conexion.php");

	$consulta="SELECT MAX(id_inm) FROM inmuebles;";
	$resultado_id=mysql_query($consulta) or die ("No se ha podido realizar la consulta");

	$dato=mysql_fetch_array($resultado_id);

	$id_inm=$dato[0]+1;



										
										echo "
							<form name='alta_inmueble' action='main_cms.php' method='get' enctype='application/x-www-urlencoded'>

							<section class='alta_prin'>
								<article class='alta_inm'>	
									<label>Título: </label>
									<input type='text' name='titulo_txt' value='$datos[0]'/>
								</article>
								<article class='alta_inm'>	
									<label>Metros: </label>
									<input type='text' name='metros_txt' value='$datos[1]'/>
								</article>
								<article class='alta_inm'>	
									<label>Precio: </label>
									<input type='text' name='precio_txt' value='$datos[2]'/>
								</article>
								<article class='alta_inm'>	
									<label>Precio m<sup>2</sup>: </label>
									<input type='text' name='p_m2_txt' value='$datos[3]'/>
								</article>
								<article class='alta_inm'>	
									<label>Dormitorios: </label>
									<input type='text' name='dormitorios_txt' value='$datos[4]'/>
								</article>
								<article class='alta_inm'>	
									<label>Baños: </label>
									<input type='text' name='banos_txt' value='$datos[5]'/>
								</article>
								<article class='alta_inm'>	
									<label>Antigüedad: </label>
									<input type='text' name='antiguedad_txt' value='$datos[6]'/>
								</article>
								<article class='alta_inm'>	
									<label>Orientación: </label>
									<input type='text' name='orientacion_txt' value='$datos[7]'/>
								</article>
								<article class='alta_inm'>	
									<label>Calefacción: </label>
									<input type='text' name='calefaccion_txt' value='$datos[8]'/>
								</article>
								<article class='alta_inm'>	
									<label>Tipo Suelo: </label>
									<input type='text' name='tipo_suelo_txt' value='$datos[9]'/>
								</article>
								<article class='alta_inm'>	
									<label>Tipo Fachada: </label>
									<input type='text' name='tipo_fachada_txt' value='$datos[10]'/>
								</article>
								<article class='alta_inm'>	
									<label>Teléfono: </label>			
									<input type='text' name='telefono_txt' value='$datos[11]'/>
								</article>	
							
								

							</section>

							<section class='alta_der'>	

								<article>
									<article>
									<label>Comentario: </label>
									</article>
									<article>
									<textarea name='comentario_txa'>$datos[12]</textarea>
									</article>
								</article>
								
								<article>
									<article>
									<label>Observaciones: </label>
									</article>
									<article>
									<textarea class='txa_observaciones' name='observaciones_txa'>$datos[13]</textarea>
									</article>
								</article>

								<article>
									<label>Estado: </label>
									<select name='estado_sel'>

								";
										if ($datos[14]!=null){

											echo "<option value='$datos[14]'>$datos[14]</option>";	

										}
								
								echo"	
										<option value=''>Seleccionar</option>
										<option value='Visible'>Visible</option>
										<option value='Oculto'>Oculto</option>
									</select>	 


								</article>

								</br>

								<article>

									<label>Operación: </label>
									<select name='operacion_sel'>

								";
								
												if ($datos[15]!=null){

													echo "<option value='$datos[15]'>$datos[15]</option>";

																
												}

										

								echo "				

														<option value=''>Seleccionar</option>
												";
												
														$consulta_operaciones="SELECT operacion FROM tipo_op;";
														$resultado_operaciones=mysql_query($consulta_operaciones);

														while ($operaciones=mysql_fetch_array($resultado_operaciones)){

															echo "<option value='$operaciones[0]'>$operaciones[0]</option>";

														}

											

								echo "
									</select>			

								</article>

								</br>

								</article>

									<label>Tipo Inmueble: </label>
									<select name='tipo_inm_sel'>

								";

										if ($datos[16]!=null){

											echo "<option value='$datos[16]'>$datos[16]</option>";

										}


								echo " 
										<option value=''>Seleccionar</option>
								";
								
										$consulta_tipo_inm="SELECT n_tipo_inm FROM tipo_inm";
										$resultado_tipo_inm=mysql_query($consulta_tipo_inm) or die ("No se ha podido realizar la consulta");

										while ($tipo_inm=mysql_fetch_array($resultado_tipo_inm)){

											echo "<option value='$tipo_inm[0]'>$tipo_inm[0]</option>";

										}


								echo"

								</select>

							</section>

							</section>

							<section class='zona_sel'>
							<article class='alta_inm'>
									<label>Seleccione zona del inmueble: </label>
								</article>
								<article>	
										
							";

									if ($datos[17]!=null){

										

											echo "
												<select name='zona_sel' onchange='submit();' disabled>
													<option value='$datos[17]' selected>$datos[17]</option>
											";						


									} else {

											echo "
												<select name='zona_sel' onchange='submit();'>
													<option value='' selected>Seleccionar</option>
											";
									}


											$consulta="SELECT zona FROM zonas;";
											$resultado_zonas=mysql_query($consulta) or die ("No se ha podido realizar la consulta");

											while($dato_zona=mysql_fetch_array($resultado_zonas)){

												echo "
													<option value='$dato_zona[0]'>$dato_zona[0]</option>
												";
											}

									echo "
										</select>
									";



										if ($datos[18]!=null){

												echo "	
														<select name='subzona_sel' onchange='submit();'>
														<option value='$datos[18]' selected>$datos[18]</option>
														
													";

										} else {
											
												echo "
														<select name='subzona_sel' onchange='submit();'>
														<option value=''>Seleccionar</option>
												";
										}

									
												

													$consulta_2="SELECT subzona FROM zonas, subzonas WHERE zonas.id_zona=subzonas.id_zona AND zona='$datos[17]';";
													$resultado_subzonas=mysql_query($consulta_2) or die ("No se ha podido realizar la consulta");

													while($dato_subzona=mysql_fetch_array($resultado_subzonas)){

														echo "
															<option value='$dato_subzona[0]'>$dato_subzona[0]</option>
														";	
													}

													echo "
															</select>
								
													";

													if (isset($_GET['subzona_sel'])){

														echo "<input type='hidden' name='zona_sel' value='$datos[17]'/>";
													}


				

									echo "
										<input type='hidden' name='inmueble'/>
										<input type='hidden' name='alta_inm'/>
									";



							echo"

								</article>
							</section>	

							</form>

							";

									
						
							$datos_env=$datos;

							$datos_env=serialize($datos_env);

							echo"

							<section class='subir_archivo'>
									<article class='form_subir'>
									<form name='subir_archivo' action='subir_archivo.php' method='post' enctype='multipart/form-data'>
										<article>
											<label>Subir imágenes: </label>
										</article>
										<article>
											<input type='file' name='archivo_fls'/>
											<input type='hidden' name='id' value='$id_inm'/>
											<input type='hidden' name='datos_form' value='$datos_env'/>
											<input type='submit' name='subir_btn' value='Subir Archivo'/>
										</article>
									</form>	
							</article>	

							";

							echo "
							</br>
							<section>
									<article>
							";

									$consulta_imagenes="SELECT url FROM img_temp WHERE id_inm='$id_inm';";
									$resultado_imagenes=mysql_query($consulta_imagenes) or die ("No se ha podido realizar la consulta");

									$url_imagen=mysql_fetch_array($resultado_imagenes);

									if ($url_imagen[0]!==null){

										$consulta_img_temp="SELECT url, tipo_img FROM img_temp WHERE id_inm='$id_inm';";
										$resultado_img_temp=mysql_query($consulta_img_temp) or die ("No se ha podido relizar la consulta");

										echo "<form name='select_prin' action='modificar_archivo.php' method='get' enctype='application/x-www-urlencoded'>";

													while ($url_temp=mysql_fetch_array($resultado_img_temp)){

														$principal='principal';

														echo "<section class='prev_img'>

															  <img class='img_sub_min' src='" . $url_temp[0] . "'/>

														";

																if ($url_temp[1]==$principal){

																		echo "<input type='radio' name='imagen' value='$url_temp[0]' onchange='submit()' checked/>";

																} else {

																		echo "<input type='radio' name='imagen' value='$url_temp[0]' onchange='submit()'/>";
																}



														echo "<article class='eliminar_img'><a href='eliminar_img.php?datos=$datos_env&eliminar=$url_temp[0]'>Eliminar</a><article>

															  </section>
														";

													}

												echo "<input type='hidden' name='datos_env' value='$datos_env'/>"; 	

										echo "</form>";			

									} else {

										echo "<img src='media/img/no_image.png'/>";
									}		

							echo"
									</article>
							</section>

							<section>

							";

							$datos_grab=serialize($datos);

							echo "
									<article>
										<p>
											<form name='grabar_datos' action='grabar_inm.php' method='get' enctype='application/x-www-urlencoded'>
													<input type='hidden' name='id_inm' value='$id_inm'/>
													<input type='hidden' name='datos_grab' value='$datos_grab'/>
													<input type='submit' name='grabar_btn' value='Grabar Inmueble'/>
											</form> 
										</p>	
									</article>
							</section>		

							";

						


}



?>