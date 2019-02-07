<?php

require_once '../../include/dbconnect.php';
session_start();

	$idusuario = $_POST['txtusuarioID'];
	$idconsulta = $_POST['txtconsultaID'];
	$idpersona = $_POST['txtpersonaID'];
	$idtipoexamen = $_POST['cboTipoExamen'];
	$indicacion = $_POST['txtIndicacion'];


	$insertexpediente = "INSERT INTO listarayosx(IdUsuario,IdEnfermeriaProcedimiento,IdPersona,IdTipoRayosx,Activo,FechaExamen,Indicacion)"
	         . "VALUES ('$idusuario','$idconsulta','$idpersona','$idtipoexamen',1,now(),'$indicacion')";
	$resultadoinsertmovimiento = $mysqli->query($insertexpediente);
	header('Location: ../../web/enfermeriaprocedimiento/medical?id='.$idpersona);


