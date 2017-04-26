
<!--
	Autores: dubier perez/jeison salgado
	Primer formulario para la instalación de un aplicativo, aunque el aplicativo en sí no existe, solo se mostrará el proceso de instalación.
-->

<html>
<head>
	<title>Instalador</title>
	<link rel="stylesheet"  href="css/bootstrap/bootstrap.min.css">
</head>
<body>

	<br>
	<br>
	<br>

	<div class="container">

		<div class="row">
		            <div class="col-xs-12 col-md-1 "></div>
		                <div class="col-xs-12 col-md-4 well">
		                        <div class="form-group" >

									<form action="instalando.php" method="get">
										<!--<label for="exampleInputEmail1">Nombre de la tabla (*)  </label>
										<br>
										<input type="text" class="form-control" name="tabla" placeholder="Nombre de la tabla" required>
										<br>-->
										<label for="exampleInputEmail1">Servidor</label>
										<br>
										<input type="text" class="form-control" name="servidor" placeholder="servidor" required>
										<br>
										<label for="exampleInputEmail1">Usuario</label>
										<br>
										<input type="text" class="form-control" name="usuario" placeholder="usuario" required>
										<br>
										<label for="exampleInputEmail1">Clave  </label>
										<br>
										<input type="text" class="form-control" name="contrasena" placeholder="clave">
										<br>
										<label for="exampleInputEmail1">Base de datos</label>
										<br>
										<input type="text" class="form-control" name="bd"  placeholder="base de datos" required>
										<br>
										<input type="submit" class="btn btn-info" value="Enviar">

									</form>


								</div>
	    				</div>
	    				<br>
	    				<br>
	    				<br>
	    				<br>
	    				<br>
	    				<br>
    	</div>
    </div>


</body>
</html>		
