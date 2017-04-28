<?php
/**
*  
* @autores: dubier perez/jeison salgado
*/





/**
*Esta clase contiene todas la funciones  
*/
include('Graficos.php');

class BD extends Graficos
{

			public $conexion; //variable publica
			/**
			*esta funcion es el constructor.			
			*/
			function BD ()
			{
				$this->conexion=$this->crear_conexion();
				//echo "nacio la clase BD";
			}
			/**
			*esta funcion se encarga de crear la conexion con el servidor.			
			*@return 		caracteres 		retorna mysqli_connect.
			*/
			 function crear_conexion ()
			 {
			 	include('config.php');
			 	return mysqli_connect($servidor,$usuario,$clave,$bd);
			 }
			 




			/**
			*esta función sirve para mostrar el formulario el cual contiene *un select que trae los datos de una tabla
			*@param 	texto  		parametro de entrada que contiene $nombre_lista
			*@param 	texto 		parametro de entrada que contiene tabla
			*@param 	texto 		parametro de entrada que contiene campo_llave_primaria
			*@param 	texto 		parametro de entrada que contiene $campos_a_mostrar
			*/

			function traer_lista_informacion( $nombre_lista, $tabla, $campo_llave_primaria, $campo_a_mostrar ) 
			{	//Se hace la conexión con la base de datos
				include( "config.php" ); 
				$salida = "";

				//------------SQL Se traen datos----------------------------------------------------
				//Selecciona todos los campos de una tabla
				$sql = "SELECT * FROM  $tabla "; 
				if( $sn_diagnostico_clinico == "s" ) echo "<div class='contenedor-sql-pruebas'>".$sql."</div>";
				

				$conexion = mysqli_connect( $servidor, $usuario, $clave, $bd );
				$resultado = $conexion->query( $sql );

						
						
						           
						$salida.="<label for='exampleInputEmail1'><h1 style=color:green>SINTOMAS</h1>  </label><br>";
						$salida.="<select ng-model='id_sintomas' ng-change='cargar_datos_php()' id='datos' multiple size='12' class='form-control' name='$nombre_lista' >";
						$contador=0;
						
				while ($fila = mysqli_fetch_assoc($resultado)) 
					
				{ 
					$contador ++;
					
		    		if ($fila != '..' && $fila !='.' && $fila !='')
		    		{
		                //echo" $fila;
		         	$salida.= "<option value='$fila[$campo_llave_primaria]' >" . $contador . " - ". $fila[$campo_a_mostrar]."</option>"; //Se muestra en un select los datos que contien una tabla

		        	}
		      
				}
				$salida.="</select>";	//cierra la etiqueta 
				
			

				//retorna todo lo que contiene la variable $salida 

				return $salida;	
			}

			/**
			*esta funcion se encarga realizar la consulta en una tabla.
			*
			*@param 		texto 			Es el nombre de la tabla.
			*@param 		texto 			campo clave.
			*@param 		texto 			campo a buscar.	
			*@return 		caracteres 		retorna la consulta.
			*/
			
			
			Function consultar($valores)
			{
				include( "config.php" );
        	
		        /*Esta conexión se realiza para la prueba con angularjs*/
		        header("Access-Control-Allow-Origin: *");
		        header("Content-Type: application/json; charset=UTF-8");
		        
		        $conn = new mysqli( $servidor, $usuario, $clave, $bd );
		        
		        //Se busca principalmente por alias.
		     		

		     	$sql = "SELECT tb_enfermedades.enfermedad , COUNT(tb_informe.id_enfermedad) as conteo_sintomas , (SELECT COUNT(tb_informe.id_enfermedad) conteo_total FROM tb_informe where tb_enfermedades.id_enfermedad = tb_informe.id_enfermedad GROUP BY id_enfermedad) as conteo_total FROM tb_informe , tb_enfermedades WHERE tb_informe.id_enfermedad = tb_enfermedades.id_enfermedad AND tb_informe.id_sintomas in($valores) GROUP BY tb_informe.id_enfermedad";
				//echo $sql;
		        //LA tabla que se cree debe tener la tabla aquí requerida, y los campos requeridos abajo.
		       
		       	//$this->imprimir($sql);
		        $result = $this->conexion->query( $sql );	
		        
		        $outp = "";
		       
		        
		        while($rs = $result->fetch_array( MYSQLI_ASSOC )) 
		        {
		            //Mucho cuidado con esta sintaxis, hay una gran probabilidad de fallo con cualquier elemento que falte.
		            if ($outp != "") {$outp .= ",";}

		            $outp .= '{"Enfermedad":"'.utf8_encode($rs["enfermedad"]).'",';            // <-- La tabla MySQL debe tener este campo.		            
		            $outp .= '"conteo_sintomas":"'.$rs["conteo_sintomas"].'",';         // <-- La tabla MySQL debe tener este campo.
		            //$outp .= '"abc":"'.$sql.'",';
		            $outp .= '"conteo_total":"'.$rs["conteo_total"].'"}';     // <-- La tabla MySQL debe tener este campo.
		            
		          
		        }
		        
		        $outp ='{"records":['.$outp.']}';
		       	$conn->close();
		        
		        return $outp;
		 		//echo $sql;
		 
		 	
		 		//return $sql;
			}

			/*Esta función nos permite realizar una busqueda del manual técnico del software.*/
			function buscar()
			{
				    //COnexión a la base de datos.
			        include( "config.php" ); 
			        
			        /*Esta conexión se realiza para la prueba con angularjs*/
			        header("Access-Control-Allow-Origin: *");
			        header("Content-Type: application/json; charset=UTF-8");
			        
			        $conn = new mysqli( $servidor, $usuario, $clave, $bd );
			        
			        //Se busca principalmente por alias.
			        
			        $consulta = explode(",", utf8_decode($_GET['busqueda']));
			        //echo $consulta;
			        
					$sql  = " SELECT * FROM tb_busqueda  WHERE ";
				    for ($i=0; $i < count($consulta); $i ++) { 
				        	
			        	$sql .= " nombre LIKE '%".$consulta[$i]."%'";
			        	$sql .= " OR definicion LIKE '%".$consulta[$i]."%'";
			        	$sql .= " OR claves LIKE '%".$consulta[$i]."%'";
			        	if ($i < (count($consulta)-1)) $sql.=" or ";
			        	
			        }
			        


			        //echo $sql;
			        //LA tabla que se cree debe tener la tabla aquí requerida, y los campos requeridos abajo.
			        $result = $conn->query( $sql );
			        
			        $outp = "";
			        
			        while($rs = $result->fetch_array( MYSQLI_ASSOC )) 
			        {
			            //Mucho cuidado con esta sintaxis, hay una gran probabilidad de fallo con cualquier elemento que falte.
			            if ($outp != "") {$outp .= ",";}
			            
			            $outp .= '{"nombre":"'.utf8_encode($rs["nombre"]).'",';  // <-- La tabla MySQL debe tener este campo.
			            $outp .= '"definicion":"'.utf8_encode($rs["definicion"]).'",';     // <-- La tabla MySQL debe tener este campo.
			            $outp .= '"url":"'.$rs["url"].'"}';            // <-- La tabla MySQL debe tener este campo.
			        }
			        
			        $outp ='{"records":['.$outp.']}';
			        $conn->close();
			        
			        echo($outp);

			    
			     
			}
			
}	


 ?>
