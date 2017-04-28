<!-- 
*
* autores: dubier perez/jeison salgado
* 
--> 


<html ng-app="acumuladorApp"><!--Hay que observar que aquí se inicia el ng-app-->
	<head>
		<title>Mi veterinaria</title>
		<?php
		/* se incluye la clase BD la cual contiene las funciones para el funcionamiento del prototipo */
		include ('class/BD.php');
		

		
		/*Se nombra una variable para crear un nuevo objeto*/
		$obj_o= new BD;
		/* trae la función estilos de bootstrap de la clase */
		echo $obj_o->estilos("bootstrap"); 

		echo $obj_o->Verificador();
		?>
		<script type="text/javascript" src="js/angular.min.js"></script><!--En esta linea realizamos la conexion con el angular sin esto no nos funciona. -->
		
	</head>
	<body>
	<div ng-controller="acumuladorAppCtrl"><!--Super importante el controlador aquí-->


		<div class='container' >
		  	<div class='row'></div>
		  	</br>
		  		<div class='row'>
		  			<center><?php  echo $obj_o->encabezado(); ?> </center><!--Encabezado de la página-->

		  		</div>

		  		<br>

		  		
			  		
		  	
		  
				<div class='row'>
				<?php  echo $obj_o->ayuda(); ?><!--Botón de ayuda-->
					<div class='col-xs-12 col-md-4 col-lg-3'>  
							<?php
					            echo $obj_o->traer_lista_informacion( "sintomas[] ", "tb_sintomas","id_sintomas", "sintoma");?> <!-- en esta linea traemos la información de una tabla de determinados campos en un select. --> 
		            </div>
						<div class='col-xs-12 col-md-6 '>

					            <br>
					            <label><h1 style="color:green">ENFERMEDADES</h1></label>
					            <br>
					             
					                
					            <div>
					            
					              <div class='table-responsive' >
					            
					                <table class='table table-hover' border='0px'>
					                    <tr tr class='bg-success'> 
					                        <th>Enfermedades</th>
					                        <th>Cantidad de Sintomas</th>
					                        <th>total Sintomas</th>
					                    </tr> 
					                 
					                    <tr ng-repeat="x in campos">
					                        <td>{{ x.Enfermedad }}</td><!--Muestra en pantalla la enfermedad que se encuentra en la base de datos según los signos y síntomas--> 
					                        <td>{{ x.conteo_sintomas }}</td><!--Muestra en pantalla el conteo de los síntomas-->    
					                        <td>{{ x.conteo_total }}</td><!--Muestra en pantalla el conteo total de los síntomas-->  
					                    </tr>   
					                    
					                  

					                </table> 
					                <!--{{ x.a }}-->
					              </div>
					            </div> 





					            
					               


					        </div>
					        
					        <!-- Aquí se incluye el otro archivo js para probar que el código se puede colocar en otro archivo  -->
					         <script type="text/javascript" src="js/nuevo.js"></script><!--Se llama las funciones del AngularJs-->
							
				</div>
					
				</div>
		</div>

			
 	

	</body>
</html>


