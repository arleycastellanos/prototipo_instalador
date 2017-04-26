<?php

    /**
    * Autores: dubier perez/jeison salgado
    * Este código borra los archivos de la instalación y redirige al sitio. 
    */

    include( "class/Verificador.php" );
    $objeto_verificador = new Verificador();

    $objeto_verificador->borrar_archivo( "instalador.php" );
    $objeto_verificador->borrar_archivo( "instalando.php" );
    header( "location: index.php" );
