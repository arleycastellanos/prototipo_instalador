 var acumuladorApp = angular.module( 'acumuladorApp', [] );
            
    acumuladorApp.controller( "acumuladorAppCtrl",
        
        //[ "$scope",  //Originalmente solo se minificaba el scope.
        [ "$scope", "$http", //Esto es para minificar, pero interfiere con lo de php, hay que minificar las otras variables.
         
            function( $scope, $http )
            {
            
                
                
               
                /**
                *esta función sirve para traer todas las enfermedades según los signos y síntomas y luego mostrarlo en index.php
                */
                $scope.cargar_datos_php = function()
                {
                        var lista= document.getElementById('datos');
                        console.log(lista.length );
                        var sintomas="";


                        for (var i = 0 ; i < lista.length ; i++) 
                        {
                            if (lista.item(i).selected ) {
                                if (sintomas == ""){ 
                                    sintomas +=lista.item(i).value;
                                }else{
                                    sintomas +="," +lista.item(i).value;
                                }
                            }
                        }
                        var cad2 = sintomas;
                        console.log(cad2);
                    
                        if( cad2.length > 0 )
                        {
                            console.log("Cadena" + cad2);
                            //Aquí se hace el llamado a un php con conexión a MySQL.
                            $http.get( 'llamado-php.php?cadena=' + cad2 ).success
                            (
                                function( response ) 
                                { 
                                    console.log( response );
                                    $scope.campos = response.records;            
                                }
                            );   
                        }                    
                }

                /**
                *esta función sirve para traer lo que se ha buscado y luego mostrarlo en ayuda.php
                */
                $scope.buscar = function()
                {
                    var busqueda = $scope.text_busqueda;    
                    console.log(busqueda);
                    //Aquí se hace el llamado a un php con conexión a MySQL.
                     $http.get( 'llamado-php.php?busqueda=' + busqueda ).success
                    (
                        function( response ) 
                        { 
                            console.log( response );
                            $scope.campos = response.records;            
                        }
                    );                                        
                }

            }
        ] //Si se minifica, se deben minificar todas las llamadas inyecciones, de lo contrario mejor no minifique nada.
    );
