<?php
require_once '../../include/dbconnect.php';

session_start();

	$id2 = $_POST['menu[+'];

    foreach($_POST['menu'] as $id)
    {
        $sql1="UPDATE menuusuario SET MenuUsuarioActivo=".$_POST["chkRow"]." WHERE id='".$id."'";
        $resultadoActuPermisos = $mysqli->query($sql1);
        echo $sql1;
    }



	