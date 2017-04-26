<?php

    /**
     *autores: dubier perez/jeison salgado
     * Este php me permite usar el poder del php con un ejemplo de la tecnología AngularJS...
     * incluso desde el administrador de este sitio.
     */

    


include'class/BD.php'; //Se incluye todas las funcione y clase que se encuentra en BD.php
    $nuevo_obj=new BD();    // llama la clase BD
           
     if( isset( $_GET[ 'cadena' ] ) )//Recibe todo lo que contiene cadena y hace la respectiva consulta
    {     
        $valores=$_GET['cadena'];
        echo  $nuevo_obj->consultar($valores);//Se trae la función consultar que se encuentra en el BD.php
        //echo $sql;
    }

     if( isset( $_GET[ 'busqueda' ] ) )//Recibe todo loq ue contiene busqueda y hace una busqueda en la base de datos mediante la función
    {  
        if ($_GET['busqueda']!="") {
           $valores=$_GET['busqueda'];
        echo  $nuevo_obj->buscar();//Se trae la función buscar que se encuentra en el BD.php
        //echo $sql;
        }
        
    }



?>
