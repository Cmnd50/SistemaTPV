<?php
session_start();
require_once("../include/dbconnect.php");
date_default_timezone_set('america/el_salvador');

$fechas = date('Y-m-d G:i:s');
        	
$IdUsuario = $_SESSION['IdUsuario'];
$updateestadouser = "UPDATE usuario SET Estado = 'Desconectado', HoraUltimaSesion = '$fechas'  where IdUsuario = '$IdUsuario'";
$resultadoupdate = $mysqli->query($updateestadouser);
    //Removemos sesión.
    session_unset();
    //Destruimos sesión.
    session_destroy();              
    //Redirigimos pagina.
    header("Location: ../index");
?>

