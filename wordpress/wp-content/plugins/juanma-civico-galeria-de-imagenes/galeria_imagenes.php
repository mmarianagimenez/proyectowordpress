<?php

/*
Plugin Name: Galeria de Imagenes
Description: Plugin que te permitira tener una lista de tus imagenes e irlas visualizando una a una.
Author: Juan Manuel Civico
Version: 2.0
Author URI: http://www.juanmacivico.com
*/

/*  Copyright 2013  JUAN MANUEL CIVICO  (email : juanma@juanmacivico.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//Creo una funcion que muestre la galería de imagenes por pantalla.
function jmc_galimg_insertar_galeria()
{
	//Indico la ruta de la hoja de estilos.
	wp_register_style("jmc_galimg_css", path_join(WP_PLUGIN_URL, basename(dirname( __FILE__ )) . "/jmc_galimg_estilos.css"));
	wp_enqueue_style("jmc_galimg_css");
	//Indico la ruta de las funciones con JavaScript.
	wp_register_script("jmc_galimg_js", path_join(WP_PLUGIN_URL, basename(dirname( __FILE__ )) . "/jmc_galimg_funciones.js"));
	wp_enqueue_script("jmc_galimg_js");
	//Creo una variable que almacene la carpeta con las imagenes de la galeria.
	$jmc_galimg_galeria = opendir("./wp-content/plugins/juanma-civico-galeria-de-imagenes/img");
	//Creo un array donde almacenaré los nombres de las imagenes.
	$jmc_galimg_img = array();
	//Leemos los archivos de la carpeta y metemos sus nombres en el array.
	while ($jmc_galimg_archivo_leido = readdir($jmc_galimg_galeria))
	{
		if (($jmc_galimg_archivo_leido != ".") and ($jmc_galimg_archivo_leido != "..") and ($jmc_galimg_archivo_leido != "Thumbs.db"))
			$jmc_galimg_img[] = $jmc_galimg_archivo_leido;
	}
	//Obtengo el contenido de la página o la entrada.
	$jmc_galimg_contenido = get_the_content();
	//Creo una variable para almacenar en código fuente de la galeria.
	$jmc_galimg_codigo = "<center>
				<div id='jmc_galimg_galeria'>
					<img class='jmc_galimg_flechas' id='jmc_galimg_anterior' src='" . plugins_url() . "/juanma-civico-galeria-de-imagenes/controles/arrow_left.gif' onclick='jmc_galimg_retroceder_img();' />
					<img class='jmc_galimg_size' id='jmc_galimg_actual' src='" . plugins_url() . "/juanma-civico-galeria-de-imagenes/img/" . $jmc_galimg_img[0] . "' />
					<img class='jmc_galimg_flechas' id='jmc_galimg_siguiente' src='" . plugins_url() . "/juanma-civico-galeria-de-imagenes/controles/arrow.gif' onclick='jmc_galimg_avanzar_img();' />
				</div>
				<div id='jmc_galimg_thumbs'>
					<img class='jmc_galimg_seleccionada' id='img1' src='" . plugins_url() . "/juanma-civico-galeria-de-imagenes/img/" . $jmc_galimg_img[0] . "' onclick='jmc_galimg_cambiar_img(this.id);' />";
	//Recorro el array, insertando las imagenes en la galeria.
	for ($jmc_galimg_index = 1; $jmc_galimg_index < count($jmc_galimg_img); $jmc_galimg_index++)
	{
		$jmc_galimg_codigo .= "<img id='img" . ($jmc_galimg_index + 1) . "' src='" . plugins_url() . "/juanma-civico-galeria-de-imagenes/img/" . $jmc_galimg_img[$jmc_galimg_index] . "' onclick='jmc_galimg_cambiar_img(this.id);' />";
	}
	$jmc_galimg_codigo .= "</div></center><script> setInterval('jmc_galimg_avanzar_img()', 5000); </script>";
	//Busco las palabras clave que hay que insertar para que funcione el plugin y las sustituyo por el código de la galeria.
	$jmc_galimg_contenido = str_replace("[insert_img]", $jmc_galimg_codigo, $jmc_galimg_contenido);
	//Devuelvo el nuevo contenido.
	return $jmc_galimg_contenido;
}

//Indico A WordPress que tiene que mostrar la galeria por pantalla.
add_filter('the_content', 'jmc_galimg_insertar_galeria');

//Creo una funcion que muestre el menu principal.
function jmc_galimg_menu_principal()
{
	//Indico la ruta de la hoja de estilos.
	wp_register_style("jmc_galimg_css", path_join(WP_PLUGIN_URL, basename(dirname( __FILE__ )) . "/jmc_galimg_estilos.css"));
	wp_enqueue_style("jmc_galimg_css");
	//Indico la ruta de las funciones con JavaScript.
	wp_register_script("jmc_galimg_js", path_join(WP_PLUGIN_URL, basename(dirname( __FILE__ )) . "/jmc_galimg_funciones.js"));
	wp_enqueue_script("jmc_galimg_js");
	//Creo una variable que almacene la carpeta con las imagenes de la galeria.
	$jmc_galimg_galeria = opendir("./../wp-content/plugins/juanma-civico-galeria-de-imagenes/img");
	//Creo un array donde almacenaré los nombres de las imagenes.
	$jmc_galimg_img = array();
	//Leemos los archivos de la carpeta y metemos sus nombres en el array.
	while ($jmc_galimg_archivo_leido = readdir($jmc_galimg_galeria))
	{
		if (($jmc_galimg_archivo_leido != ".") and ($jmc_galimg_archivo_leido != "..") and ($jmc_galimg_archivo_leido != "Thumbs.db"))
			$jmc_galimg_img[] = $jmc_galimg_archivo_leido;
	}
	//Creo una variable para almacenar en código fuente de la galeria.
	$jmc_galimg_codigo = "<center><h3>Mi galeria de imagenes</h3><div id='jmc_galimg_thumbs'><img class='jmc_galimg_seleccionada' id='img1' src='./../wp-content/plugins/juanma-civico-galeria-de-imagenes/img/" . $jmc_galimg_img[0] . "' onclick='jmc_galimg_cambiar_seleccion(this.id);' />";
	//Recorro el array, insertando las imagenes en la galeria.
	for ($jmc_galimg_index = 1; $jmc_galimg_index < count($jmc_galimg_img); $jmc_galimg_index++)
	{
		$jmc_galimg_codigo .= "<img id='img" . ($jmc_galimg_index + 1) . "' src='./../wp-content/plugins/juanma-civico-galeria-de-imagenes/img/" . $jmc_galimg_img[$jmc_galimg_index] . "' onclick='jmc_galimg_cambiar_seleccion(this.id);' />";
	}
	$jmc_galimg_codigo .= "</div>
		<form action='" . $_SERVER['REQUEST_URI'] . "' method='post' enctype='multipart/form-data'>
		<input type='button' id='jmc_galimg_form' name='jmc_galimg_form' value='Subir imagen' onclick='jmc_galimg_form_subida();' />
		<input type='hidden' id='jmc_galimg_borrada' name='jmc_galimg_borrada' value='./../wp-content/plugins/juanma-civico-galeria-de-imagenes/img/" . $jmc_galimg_img[0] . "' />
		<input type='submit' id='jmc_galimg_borrar' name='jmc_galimg_borrar' value='Eliminar imagen' />
		<br /><br />
		<div id='jmc_galimg_accion'></div>
		</form>
	</center>";
	//Muestro la galeria por pantalla.
	echo $jmc_galimg_codigo;
}

//Si quiero subir una imagen al servidor...
if (isset($_REQUEST["jmc_galimg_aceptar"]))
{
	//Compruebo que existen los campos necesarios para subir un archivo al servidor.
	if (isset($_FILES["jmc_galimg_file"]))
	{
		//Almaceno en una variable el nombre del archivo.
		$jmc_galimg_nom_file = $_FILES["jmc_galimg_file"]["name"];
		//Almaceno en una variable el nombre temporal del archivo.
		$jmc_galimg_nombre_tmp = $_FILES["jmc_galimg_file"]["tmp_name"];
		//Almaceno el tipo del archivo en una variable.
		$jmc_galimg_tipo_file = end(explode(".", $jmc_galimg_nom_file));
		//Almaceno el tamaño del archivo en una variable.
		$jmc_galimg_tamanio = $_FILES["jmc_galimg_file"]["size"];
		//Convierto el tamaño del archivo de Bytes a KB.
		$jmc_galimg_tamanio /= 1024;
		//Redondeo el tamaño del archivo al entero más próximo.
		$jmc_galimg_tamanio = round($jmc_galimg_tamanio);
		//Almaceno en una variable la ruta en la que guardaré el archivo.
		$jmc_galimg_ruta = "./../wp-content/plugins/juanma-civico-galeria-de-imagenes/img";
	}
	//Compruebo que la extension del archivo es la deseada. En este caso, debe de ser una imagen
	if ((strtolower($jmc_galimg_tipo_file) == "png") or (strtolower($jmc_galimg_tipo_file) == "gif") or (strtolower($jmc_galimg_tipo_file) == "jpg") or (strtolower($jmc_galimg_tipo_file) == "jpeg"))
	{
		if (jmc_galimg_tamanio <= 5120)
		{
			//Creo una variable que me guarde el nombre completo del archivo.
			$jmc_galimg_nombre = $jmc_galimg_ruta . "/" . date("d") . date("m") . date("Y") . "-" . date("H") . date("i") . date("s") . "." . $jmc_galimg_tipo_file;
			//Almaceno el archivo en el servidor.
			move_uploaded_file($jmc_galimg_nombre_tmp, $jmc_galimg_nombre);
		}
	}
}

//Si quiero eliminar un archivo del servidor...
if (isset($_REQUEST["jmc_galimg_borrar"]))
{
	if (isset($_REQUEST["jmc_galimg_borrada"]))
	{
		$jmc_galimg_borrada = $_REQUEST["jmc_galimg_borrada"];
		unlink($jmc_galimg_borrada);
	}
}

//Creo una funcion que agregue un elemento al menu de WordPress para controlar el Plugin.
function jmc_galimg_menu()
{
	$jmc_galimg_menu = add_menu_page("GaleriaImagenes", "GaleriaImagenes", "administrator", "jmc_galimg_menu", "jmc_galimg_menu_principal");
}

//Muestro el menu por pantalla.
add_action("admin_menu", "jmc_galimg_menu");


?>