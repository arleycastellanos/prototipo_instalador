<?php

    /**
    * Autores: dubier perez/jeison salgado
    * La siguiente clase se crea para verificar algunos aspectos de la instalación del aplicativo. 
    *
    */

    class Verificador
    {
        
        /**
        * Esta función es el método constructor de la clase.
        */
        function Verificador()
        {

           if( file_exists( "instalador.php" ) == true )
            {
                //echo "El archivo de configuración existe, se procederá a ir al sitio.";
                header( "location: instalador.php" );
            
            }


        }

        /**
        * Método que muestra las tablas creadas o el conteo de las tablas existentes.
        * @param        conexion            Un parámetro tipo conexión, es decir, no se necesitan todos los argumentos de una conexión.
        * @param        número              El tipo de opción a escoger, 1 es retornar el html con las tablas y 2 es retornar el conteo de las tablas.
        * @return       texto               Un html con el nombre de las tablas existentes o un número con el total de tablas existentes. 
        */
        function mostrar_tablas( $conexion, $opcion = null )
        {
            $salida = "<br><br> --- Tablas instaladas --- <br>";
            $resultado = $conexion->query( "SHOW TABLES" );
            $conteo = 0;

            while( $fila = mysqli_fetch_array( $resultado ) )
            {
                $salida .= $fila[ 0 ]."<br>";
                $conteo ++;
            }

            if( $opcion == 2 ) $salida = $conteo; 

            return $salida;
        }

        /**
        * Borra un archivo del sistema.
        * @param        texto           nombre del archivo que se va a borrar.
        */
        function borrar_archivo( $nombre_archivo )
        {
            unlink( $nombre_archivo );
        }


        /*******************************************f u n c i o n e s*********************************************************************/

        /**
        *   Esta función se encarga de verificar si existe una tabla en el catálogo del sistema.
        *   @param      texto       el nombre de la tabla a buscar  
        *   @param      texto       el servidor para la conexión 
        *   @param      texto       el usuario para la conexión
        *   @param      texto       la contraseña para la conexión
        *   @param      texto       el nombre de la base de datos
        *   @return     número      un número con valores 0 o 1 para indicar o no la existencia de una tabla.
        */
        function verificar_existencia_tabla( $tabla, $servidor, $usuario, $clave, $bd, $imp_pruebas = null )
        {
            $conteo = 0;

            $sql = " SELECT COUNT( * ) AS conteo FROM information_schema.tables WHERE table_schema = '$bd' AND table_name = '$tabla' ";
            if( $imp_pruebas == 1 ) echo "<br><strong>".$sql."</strong><br>";
            $conexion = mysqli_connect( $servidor, $usuario, $clave, $bd  );
            $resultado = $conexion->query( $sql );

            while( $fila = mysqli_fetch_assoc( $resultado ) )
            {
                $conteo = $fila[ 'conteo' ]; //Si hay resultados la variable será afectada.
            }

            return $conteo;
        }

        /**
        *   Esta función se encarga de verificar si existe una restricción en el catálogo del sistema. Por supuesto esta función y la
        *   de búsqueda de tablas podría ser una sola, generalizando mejor y refactorizando el código.
        *   @param      texto       el nombre del objeto a buscar   
        *   @param      texto       el servidor para la conexión 
        *   @param      texto       el usuario para la conexión
        *   @param      texto       la contraseña para la conexión
        *   @param      texto       el nombre de la base de datos
        *   @return     número      un número con valores 0 o 1 para indicar o no la existencia de una tabla.
        */
        function verificar_existencia_objeto( $objeto, $servidor, $usuario, $clave, $bd, $imp_pruebas = null )
        {
            $conteo = 0;

            //$sql = " SELECT COUNT( * ) AS conteo FROM information_schema.tables WHERE table_schema = '$bd' AND table_name = '$tabla' ";
            $sql = " SELECT COUNT( * ) AS conteo FROM information_schema.TABLE_CONSTRAINTS WHERE TABLE_SCHEMA = '$bd' AND CONSTRAINT_NAME = '$objeto'; ";
            if( $imp_pruebas == 1 ) echo "<br><strong>".$sql."</strong><br>";
            $conexion = mysqli_connect( $servidor, $usuario, $clave, $bd  );
            $resultado = $conexion->query( $sql );

            while( $fila = mysqli_fetch_assoc( $resultado ) )
            {
                $conteo = $fila[ 'conteo' ]; //Si hay resultados la variable será afectada.
            }

            return $conteo;
        }


    }
?>
