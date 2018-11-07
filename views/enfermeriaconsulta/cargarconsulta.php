<?php

include '../include/dbconnect.php';
session_start();

    $idconsulta = $_POST["id"];


    $queryexpedientesu = "SELECT c.IdConsulta, c.FechaConsulta As FechaConsulta, CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico',
                                          CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente', m.NombreModulo As 'Especialidad'
                                          from consulta c
                                          inner join usuario u on c.IdUsuario = u.IdUsuario
                                          inner join modulo m on c.IdModulo = m.IdModulo
                                          inner join persona p on c.IdPersona = p.IdPersona
                                          where c.IdConsulta = $idconsulta";
   $resultadoexpedientesu = $mysqli->query($queryexpedientesu);

   $datos = array();

            while ($test = $resultadoexpedientesu->fetch_assoc())
                  {
                      $datos["Paciente"] = $test['Paciente'];
                      $datos["Medico"] = $test['Medico'];
                      $datos["Especialidad"] = $test['Especialidad'];
                      $datos["FechaConsulta"] = $test['FechaConsulta'];
                  }

    header("Content-Type","application/json");

    print_r(json_encode($datos));

?>
