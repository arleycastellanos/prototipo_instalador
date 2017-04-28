<!-- 
* 
*autores: dubier perez/jeison salgado
* 
-->
<html ng-app="acumuladorApp"><!--Hay que observar que aquí se inicia el ng-app-->
	<head>
			<title>busqueda</title>
			<?php
				/*Incluye la clase y las funciones que se encuentran en BD.php*/
				include ('class/BD.php');
				/*Se nombra una variable para crear un nuevo objeto*/
				$obj_o= new BD;
				/* trae la función estilos de bootstrap de la clase */
				echo $obj_o->estilos("bootstrap"); 
			?>
			<script type="text/javascript" src="js/angular.min.js"></script><!--Libreria de AngularJs-->
	</head>
	<body>
		<div ng-controller="acumuladorAppCtrl"><!--Super importante el controlador aquí-->


			<div class='container' >
			  	
			  	<br>
			  	<div class='row'>
				  	
				  	<center><?php  echo $obj_o->encabezado(); ?> </center><!--Contiene el cabezado de la página-->

				</div>
				<br>
				
				
		  		<div class='row'>
		  		<?php echo $obj_o->inicio(); ?><!--Botón de volver al inicio-->
			  		<div class='col-xs-12 col-md-4 '>


			  		<label><h1 style="color:green">Buscar</h1></label>
						<input type="text" class="form-control" ng-model="text_busqueda" ng-change="buscar();" placeholder="Ingrese lo que desea buscar."><!--Caja de texto que digitamos lo que seamos buscar-->
						<br>
						<br>
					</div>
				</div>
				<hr>
				<div ng-repeat="x in campos"><!--Es esencial para que muestre en pantalla los datos que se encuentrán en la base de datos-->
					<div class='row'>
						<div class='col-xs-12 col-md-4 '>
											            
				            
		                    <strong><li>{{ x.nombre }}</li></strong><!--trae en pantalla el titulo de una consulta-->
		                    {{ x.definicion }} <!--trae en pantalla la descripción de una consulta-->
		                    

						</div>
							  
						<div class='col-xs-12 col-md-8 '>
						   	<img class="img img-responsive" src="{{ x.url }}"><!--trae en pantalla la imagen de una consulta-->

					    </div>
			    	</div>
			    	<br><hr>
				</div>
		           
			    



			    <script type="text/javascript" src="js/nuevo.js"></script><!--Se llama las funciones del AngularJs-->
		    
		
			</div>
		</div>
		
	</body>
</html>

