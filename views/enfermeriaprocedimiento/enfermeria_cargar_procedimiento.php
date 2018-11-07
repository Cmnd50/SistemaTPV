<?php

include '../include/dbconnect.php';
session_start();

    $idconsulta = $_POST["id"];


    $queryexpedientesu = "SELECT ep.IdEnfermeriaProcedimiento As 'ID', CONCAT(p.Nombres,' ',p.Apellidos) As 'Paciente', CONCAT(u.Nombres,' ',u.Apellidos) As 'Medico', m.NombreModulo As 'Especialidad', ep.FechaProcedimiento As 'FechaConsulta', 
mp.Nombre As 'Motivo'
FROM enfermeriaprocedimiento ep
INNER JOIN persona p ON p.IdPersona = ep.IdPersona
INNER JOIN usuario u ON u.IdUsuario = ep.IdUsuario
INNER JOIN modulo m ON m.IdModulo = ep.IdModulo
INNER JOIN motivoprocedimiento mp ON mp.IdMotivoProcedimiento = ep.IdMotivoProcedimiento
WHERE ep.IdEnfermeriaProcedimiento = $idconsulta";
   $resultadoexpedientesu = $mysqli->query($queryexpedientesu);

   $datos = array();

            while ($test = $resultadoexpedientesu->fetch_assoc())
                  {
                      $datos["Paciente"] = $test['Paciente'];
                      $datos["Medico"] = $test['Medico'];
                      $datos["Especialidad"] = $test['Especialidad'];
                      $datos["FechaConsulta"] = $test['FechaConsulta'];
                      $datos["Motivo"] = $test['Motivo'];
                      $datos["ID"] = $test['ID'];
                  }

    header("Content-Type","application/json");

    print_r(json_encode($datos));

?>
