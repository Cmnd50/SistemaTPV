<?php

include '../../include/dbconnect.php';
session_start();

    $InicioSesion = $_POST['InicioSesion'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Correo = $_POST['Correo'];
    $clave = $_POST['clave'];
    $Puesto = $_POST['Puesto'];
    $activo = $_POST['activo'];

    $query = "select * from usuario where InicioSesion = '".strtolower($InicioSesion)."'";
    $results = $mysqli->query( $query) or die('ok');

    if($results->fetch_assoc() > 0) // not available
    {
        echo '<script type="text/javascript">
            $(document).ready(function(){
                    window.location.href="../../web/usuario/index";
                    alert("Este usuario existe, intente ingresar otro Usuario");
            });

        </script>';
    }
    else
    {

     $insert = "INSERT INTO usuario(InicioSesion,Nombres,Apellidos,Correo,Clave,Activo,IdPuesto,FechaIngreso,AmilatAdmin,Estado,ImagenUsuario,Idioma)"
                        . "VALUES ('$InicioSesion','$Nombre','$Apellido','$Correo','$clave','$activo','$Puesto',now(),0,'Desconectado','uploads/usuarios/admin.jpg',1)";
     $resultadoinsert = $mysqli->query($insert);
		 $last_id = $mysqli->insert_id;


		 $querymenudetalle = "SELECT IdMenuDetalle, IdMenu from menudetalle where IdMenu between 1 and 12 order by IdMenu asc";
		 $resultadomenudetalle = $mysqli->query($querymenudetalle);

		 while ($test = $resultadomenudetalle->fetch_assoc())
								{
										$IdMenuDetalle = $test['IdMenuDetalle'];
										$IdMenu = $test['IdMenu'];


										$queryMenuUsuario = "insert into menuusuario
																				(IdMenuDetalle,MenuUsuarioActivo,IdUsuario,IdMenu,TipoPermiso)
																		values
																				($IdMenuDetalle,1,$last_id,$IdMenu,1)
																		";
										$resultInsermenuusuario = $mysqli->query($queryMenuUsuario);
								}
                                //echo $insert;
                                //echo $queryMenuUsuario;

			      header('Location: ../../web/usuario/index');
    }


