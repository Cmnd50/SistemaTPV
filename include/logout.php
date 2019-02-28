<?php
   require_once("../include/dbconnect.php");
   session_start();
   date_default_timezone_set('america/el_salvador');
   $fechas = date('Y-m-d G:i:s');
   
   		if(!isset($_SESSION['user']))
   		{
   			header("Location: (../index)");
   		}
   		else if(isset($_SESSION['user'])!="")
   		{
   			header("Location: app.php");
   		}
   
   		if(isset($_GET['logout']))
   		{
   		$IdUsuario = $_SESSION['IdUsuario'];
   			$updateestadouser = "UPDATE usuario SET Estado = 'Desconectado', HoraUltimaSesion = '$fechas'  where IdUsuario = '$IdUsuario'";
   		    $resultadoupdate = $mysqli->query($updateestadouser);
   			session_destroy();
   			unset($_SESSION['user']);\
   			header("Location: ../index");
   		}
   
   
