<?php

require_once '../../include/dbconnect.php';
session_start();

      $id = $_GET["did"];

      $queryobtenerconsulta = "SELECT IdPersona from listaexamen where IdListaExamen = '$id'";
      $resultadoqueryobtenerconsulta = $mysqli->query($queryobtenerconsulta);
       while ($test = $resultadoqueryobtenerconsulta->fetch_assoc()) {
        $idpersona = $test['IdPersona'];
    }

      $insertexpediente = "DELETE FROM listaexamen WHERE IdListaExamen = $id and Activo = 1";
      $resultadoinsertmovimiento = $mysqli->query($insertexpediente);

     header('Location: ../../web/laboratoriopaciente/medical?id='.$idpersona);
