<?php
date_default_timezone_set('america/el_salvador');
$fechas = date('Y-m-d G:i:s');

   if(isset($_SESSION['tiempo']) ) {
   
       //Variable que define el tiempo de inactividad en segundos
       $inactivo = 20;
   			    //Calcular el tiempo de inactividad
   			    $vida_session = time() - $_SESSION['tiempo'];
   
   			        //Comprobar si el tiempo de vida de la sesión es mayor a tiempo de inactividad
   			        if($vida_session > $inactivo)
   			        {
   
   			        	
   			$IdUsuario = $_SESSION['IdUsuario'];
   			$updateestadouser = "UPDATE usuario SET Estado = 'Desconectado', HoraUltimaSesion = '$fechas'  where IdUsuario = '$IdUsuario'";
   		    $resultadoupdate = $mysqli->query($updateestadouser);
   			            //Removemos sesión.
   			            session_unset();
   			            //Destruimos sesión.
   			            session_destroy();              
   			            //Redirigimos pagina.
   			            header("Location:  ../../index");
   
   			            exit();
   			        }
   
   			} else {
       //Activamos sesion tiempo.
       $_SESSION['tiempo'] = time();
   }
   ?>