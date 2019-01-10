<?php

require_once '../../include/dbconnect.php';
session_start();

      $id = $_GET["did"];

      $queryobtenerconsulta = "SELECT IdConsulta from listaexamen where IdListaExamen = '$id'";
      $resultadoqueryobtenerconsulta = $mysqli->query($queryobtenerconsulta);
       while ($test = $resultadoqueryobtenerconsulta->fetch_assoc()) {
        $idconsulta = $test['IdConsulta'];
    }

      $insertexpediente = "DELETE FROM listaexamen WHERE IdListaExamen = $id and Activo = 1";
      $resultadoinsertmovimiento = $mysqli->query($insertexpediente);

     header('Location: ../../web/consultamedico/medical?id='.$idconsulta);
