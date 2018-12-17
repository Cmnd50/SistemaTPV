<?php

require_once '../../include/dbconnect.php';
session_start();

                  $querytipoexamen = "SELECT IdTipoExamen, NombreExamen FROM tipoexamen";
                  $resultadotipoexamen = $mysqli->query($querytipoexamen);

   $datos = array();

            while ($test = $resultadotipoexamen->fetch_assoc())
                  {
                      $datos[] = $test;
                      
                  }

    header("Content-Type","application/json");

    print_r(json_encode($datos));

?>
