
<?php

require_once '../../include/dbconnect.php';
session_start();


      $id = $_POST['txtconsultaID'];
      $idpersona = $_POST['txtpersonaID'];


      $insertexpediente = "UPDATE consulta SET Activo=0 WHERE IdConsulta='$id'";
      $resultadoinsertmovimiento = $mysqli->query($insertexpediente);

      $insertexpediente2 = "UPDATE persona SET IdEstado=1 WHERE IdPersona='$idpersona'";
      $resultadoinsertmovimiento2 = $mysqli->query($insertexpediente2);

  header('Location: ../../web/consultamedico/index');