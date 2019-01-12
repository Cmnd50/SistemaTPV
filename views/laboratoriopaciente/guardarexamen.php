<?php

require_once '../../include/dbconnect.php';
session_start();


    $idusuario = $_POST['txtUsuarioID'];
    $idpersona = $_POST['txtpersonaID'];
    $idtipoexamen = $_POST['cboTipoExamen'];
	$indicacion = $_POST['txtIndicacion'];


   	$insertexpediente = "INSERT INTO listaexamen(IdUsuario,IdPersona,IdTipoExamen,Activo,FechaExamen,Indicacion)"
		                     . "VALUES ('$idusuario','$idpersona','$idtipoexamen',1,now(),'$indicacion')";
	$resultadoinsertmovimiento = $mysqli->query($insertexpediente);

	header('Location: ../../web/laboratoriopaciente/medical?id='.$idpersona);