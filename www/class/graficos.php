<?php 

/**
* 
*autores: dubier perez/jeison salgado
*/

/**
*Esta clase contiene todas la funciones  
*/
include ('class/Verificador.php');

class Graficos extends Verificador

{
		/**
		*esta función contiene el link de la libreria de bootstrap. 
		*@return 		caracteres 		retorna estilos de bootstrap.
		*/
		function estilos($carpeta=null)
		{
			$salida="";
			$salida=" <link rel='stylesheet'  href='css/bootstrap/bootstrap.min.css'>";
					 
			return $salida;		 
		}

		/**
		*esta función las encabezado de la página. 
		*@return 		caracteres 		retorna el encabezado.
		*/
		function encabezado()
		{
			$salida="";
			$salida="<img class='img img-responsive' src='imagenes/titulo.png'>";
			return $salida;
		}
		/**
		*esta función nos envia a un formulario de busqueda. 
		*@return 		caracteres 		icono de ayuda.
		*/
		function ayuda()
		{
			$salida="";
			$salida="<a href='ayuda.php'><img src='imagenes/buscar.png' align='right'></a>";
			return $salida;
		}
		/**
		*esta función nos permi8te dirijirnos al index. 
		*@return 		caracteres 		icono de inicio.
		*/
		function inicio()
		{
			$salida="";
			$salida="<a href='index.php'><img src='imagenes/inicio.png' align='right' class='img img-responsive'></a>";
			return $salida;
		}

}
