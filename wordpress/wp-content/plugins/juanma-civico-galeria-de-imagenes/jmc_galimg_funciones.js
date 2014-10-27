//Creo una función para cambiar la imagen mostrada.
function jmc_galimg_cambiar_img(jmc_galimg_id_seleccionado)
{
	//Creo una variable para almacenar el objeto con el que se va a trabajar.
	var jmc_galimg_actual = document.getElementById("jmc_galimg_actual");
	//Creo una variable para almacenar el objeto que se quiere mostrar.
	var jmc_galimg_seleccionado = document.getElementById(jmc_galimg_id_seleccionado);
	//Creo una variable para almacenar el objeto que contiene todos los thumbs de las caratulas de los discos.
	var jmc_galimg_thumbs_img = document.getElementById("jmc_galimg_thumbs").getElementsByTagName("img");
	//Creo una variable para almacenar el objeto cuyo codigo se quiere modificar.
	var jmc_galimg_thumbs = document.getElementById("jmc_galimg_thumbs");
	//Modifico la ruta de la imagen del objeto.
	jmc_galimg_actual.src = jmc_galimg_seleccionado.src;
	//Creo una variable para almacenar el nuevo código de programación.
	var jmc_galimg_codigo = "";
	//Recorro el array "thumbs_img" comparando las rutas de los archivos.
	for (jmc_galimg_index = 0; jmc_galimg_index < jmc_galimg_thumbs_img.length; jmc_galimg_index++)
	{
		//Si la ruta del objeto actual coincide con la ruta comparada...
		if (jmc_galimg_actual.src == jmc_galimg_thumbs_img[jmc_galimg_index].src)
			//Almaceno en la variable "codigo" el nuevo estilo.
			jmc_galimg_codigo += "<img class='jmc_galimg_seleccionada' id='" + jmc_galimg_thumbs_img[jmc_galimg_index].id + "' src='" + jmc_galimg_thumbs_img[jmc_galimg_index].src + "' onclick='jmc_galimg_cambiar_img(this.id);' />";
		//En caso contrario, dejo el estilo normal.
		else
			jmc_galimg_codigo += "<img id='" + jmc_galimg_thumbs_img[jmc_galimg_index].id + "' src='" + jmc_galimg_thumbs_img[jmc_galimg_index].src + "' onclick='jmc_galimg_cambiar_img(this.id);' />";
	}
	//Modifico el código del apartado "thumbs".
	jmc_galimg_thumbs.innerHTML = jmc_galimg_codigo;
}

//Creo una funcion para avanzar la imagen.
function jmc_galimg_avanzar_img()
{
	//Creo una variable para almacenar el objeto con el que se va a trabajar.
	var jmc_galimg_thumbs_img = document.getElementById("jmc_galimg_thumbs").getElementsByTagName("img");
	//Creo una variable para almacenar el objeto cuyo codigo se quiere modificar.
	var jmc_galimg_thumbs = document.getElementById("jmc_galimg_thumbs");
	//Creo una variable para almacenar el objeto actual.
	var jmc_galimg_actual = document.getElementById("jmc_galimg_actual");
	//Creo una variable para almacenar el nuevo código de programación.
	var jmc_galimg_codigo = "";
	//Recorro el array "thumbs_img" comparando las rutas de los archivos.
	for (jmc_galimg_index = 0; jmc_galimg_index < jmc_galimg_thumbs_img.length; jmc_galimg_index++)
	{
		//Si la ruta del objeto actual coincide con la ruta comparada...
		if (jmc_galimg_actual.src == jmc_galimg_thumbs_img[jmc_galimg_index].src)
		{
			//Si no es la última imagen de la lista...
			if (jmc_galimg_index < (jmc_galimg_thumbs_img.length - 1))
				//Incremento en 1 el valor de la variable "index".
				jmc_galimg_index++;
			//En caso contrario...
			else
				//Asigno al indice el valor inicial.
				jmc_galimg_index = 0;
			//Asigno al atributo "src" del objeto actual la ruta de la nueva imagen.
			jmc_galimg_actual.src = jmc_galimg_thumbs_img[jmc_galimg_index].src;
		}
	}
	//Vuelvo a recorrer el array comparando la ruta de los archivos, pero esta vez para comprobar el que está seleccionado.
	for (jmc_galimg_index = 0; jmc_galimg_index < jmc_galimg_thumbs_img.length; jmc_galimg_index++)
	{
		//Si la ruta del objeto actual coincide con la ruta comparada...
		if (jmc_galimg_actual.src == jmc_galimg_thumbs_img[jmc_galimg_index].src)
			//Almaceno en la variable "codigo" el nuevo estilo.
			jmc_galimg_codigo += "<img class='jmc_galimg_seleccionada' id='" + jmc_galimg_thumbs_img[jmc_galimg_index].id + "' src='" + jmc_galimg_thumbs_img[jmc_galimg_index].src + "' onclick='jmc_galimg_cambiar_img(this.id);' />";
		//En caso contrario, dejo el estilo normal.
		else
			jmc_galimg_codigo += "<img id='" + jmc_galimg_thumbs_img[jmc_galimg_index].id + "' src='" + jmc_galimg_thumbs_img[jmc_galimg_index].src + "' onclick='jmc_galimg_cambiar_img(this.id);' />";
	}
	//Modifico el código del apartado "thumbs".
	jmc_galimg_thumbs.innerHTML = jmc_galimg_codigo;
}

//Creo una funcion para retroceder la imagen.
function jmc_galimg_retroceder_img()
{
	//Creo una variable para almacenar el objeto con el que se va a trabajar.
	var jmc_galimg_thumbs_img = document.getElementById("jmc_galimg_thumbs").getElementsByTagName("img");
	//Creo una variable para almacenar el objeto cuyo codigo se quiere modificar.
	var jmc_galimg_thumbs = document.getElementById("jmc_galimg_thumbs");
	//Creo una variable para almacenar el objeto actual.
	var jmc_galimg_actual = document.getElementById("jmc_galimg_actual");
	//Creo una variable para almacenar el nuevo código de programación.
	var jmc_galimg_codigo = "";
	//Recorro el array "thumbs_img" comparando las rutas de los archivos.
	for (jmc_galimg_index = 0; jmc_galimg_index < jmc_galimg_thumbs_img.length; jmc_galimg_index++)
	{
		//Si la ruta del objeto actual coincide con la ruta comparada...
		if (jmc_galimg_actual.src == jmc_galimg_thumbs_img[jmc_galimg_index].src)
		{
			//Si no es la primera imagen de la lista...
			if (jmc_galimg_index > 0)
				//Decremento en 1 el valor de la variable "index".
				jmc_galimg_index--;
			//En caso contrario...
			else
				//Asigno al indice el valor de la última imagen de la lista.
				jmc_galimg_index = jmc_galimg_thumbs_img.length - 1;
			//Asigno al atributo "src" del objeto actual la ruta de la nueva imagen.
			jmc_galimg_actual.src = jmc_galimg_thumbs_img[jmc_galimg_index].src;
		}
	}
	//Vuelvo a recorrer el array comparando la ruta de los archivos, pero esta vez para comprobar el que está seleccionado.
	for (jmc_galimg_index = 0; jmc_galimg_index < jmc_galimg_thumbs_img.length; jmc_galimg_index++)
	{
		//Si la ruta del objeto actual coincide con la ruta comparada...
		if (jmc_galimg_actual.src == jmc_galimg_thumbs_img[jmc_galimg_index].src)
			//Almaceno en la variable "codigo" el nuevo estilo.
			jmc_galimg_codigo += "<img class='jmc_galimg_seleccionada' id='" + jmc_galimg_thumbs_img[jmc_galimg_index].id + "' src='" + jmc_galimg_thumbs_img[jmc_galimg_index].src + "' onclick='jmc_galimg_cambiar_img(this.id);' />";
		//En caso contrario, dejo el estilo normal.
		else
			jmc_galimg_codigo += "<img id='" + jmc_galimg_thumbs_img[jmc_galimg_index].id + "' src='" + jmc_galimg_thumbs_img[jmc_galimg_index].src + "' onclick='jmc_galimg_cambiar_img(this.id);' />";
	}
	//Modifico el código del apartado "thumbs".
	jmc_galimg_thumbs.innerHTML = jmc_galimg_codigo;
}

//Creo una función para cambiar la imagen seleccionada (Admin).
function jmc_galimg_cambiar_seleccion(jmc_galimg_id_seleccionado)
{
	//Creo una variable para almacenar el objeto que se quiere mostrar.
	var jmc_galimg_seleccionado = document.getElementById(jmc_galimg_id_seleccionado);
	//Creo una variable para almacenar el objeto que contiene todos los thumbs de las imágenes.
	var jmc_galimg_thumbs_img = document.getElementById("jmc_galimg_thumbs").getElementsByTagName("img");
	//Creo una variable para almacenar el objeto cuyo codigo se quiere modificar.
	var jmc_galimg_thumbs = document.getElementById("jmc_galimg_thumbs");
	//Creo una variable para almacenar el nuevo código de programación.
	var jmc_galimg_codigo = "";
	//Recorro el array "thumbs_img" comparando las rutas de los archivos.
	for (jmc_galimg_index = 0; jmc_galimg_index < jmc_galimg_thumbs_img.length; jmc_galimg_index++)
	{
		//Si la ruta del objeto actual coincide con la ruta comparada...
		if (jmc_galimg_seleccionado.src == jmc_galimg_thumbs_img[jmc_galimg_index].src)
		{
			//Almaceno en la variable "codigo" el nuevo estilo.
			jmc_galimg_codigo += "<img class='jmc_galimg_seleccionada' id='" + jmc_galimg_thumbs_img[jmc_galimg_index].id + "' src='" + jmc_galimg_thumbs_img[jmc_galimg_index].src + "' onclick='jmc_galimg_cambiar_seleccion(this.id);' />";
			//Indico la ruta del archivo que he seleccionado para cuando quiera borrarlo.
			var jmc_galimg_borrado = document.getElementById("jmc_galimg_borrada");
			var jmc_galimg_ruta_dividida = (jmc_galimg_thumbs_img[jmc_galimg_index].src).split("/");
			var jmc_galimg_posicion = jmc_galimg_ruta_dividida.length - 1;
			jmc_galimg_borrado.value = "./../wp-content/plugins/juanma-civico-galeria-de-imagenes/img/" + jmc_galimg_ruta_dividida[jmc_galimg_posicion];
		}
		//En caso contrario, dejo el estilo normal.
		else
			jmc_galimg_codigo += "<img id='" + jmc_galimg_thumbs_img[jmc_galimg_index].id + "' src='" + jmc_galimg_thumbs_img[jmc_galimg_index].src + "' onclick='jmc_galimg_cambiar_seleccion(this.id);' />";
	}
	//Modifico el código del apartado "thumbs".
	jmc_galimg_thumbs.innerHTML = jmc_galimg_codigo;
}

//Creo una funcion que muestre el formulario de subida por pantalla.
function jmc_galimg_form_subida()
{
	//Creo una variable para almacenar el objeto que voy a manipular.
	var jmc_galimg_formulario = document.getElementById("jmc_galimg_accion");
	//Creo una variable para almacenar el codigo de programación.
	var jmc_galimg_codigo = "<label>Recuerde que el archivo que va a subir tiene que ser PNG, GIF o JPG, y de un tamaño no superior a 5MB.</label><br /><input type='file' name='jmc_galimg_file' /><input type='submit' name='jmc_galimg_aceptar' value='Aceptar' />'";
	//Modifico el codigo del objeto que estoy manipulando.
	jmc_galimg_formulario.innerHTML = jmc_galimg_codigo;
}