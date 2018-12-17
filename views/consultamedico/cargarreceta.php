<?php

require_once '../../include/dbconnect.php';
session_start();
    $idreceta = $_POST["id"];
    $queryexpedientesu = "SELECT r.IdReceta As 'IdReceta'
                          FROM receta r
                          WHERE r.IdReceta = '$idreceta'";

   $resultadoexpedientesu = $mysqli->query($queryexpedientesu);

   $datos = array();

            while ($test = $resultadoexpedientesu->fetch_assoc())
                  {
                      $datos["IdReceta"] = $test['IdReceta'];

                  }

    header("Content-Type","application/json");

    print_r(json_encode($datos));

?>
