<?php

include '../include/dbconnect.php';
session_start();

    $idconsulta = $_POST["id"];


    $queryexpedientesu = "SELECT CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente', c.FechaConsulta As 'FechaConsulta', CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico',
                                m.NombreModulo As 'Especialidad', i.Peso As 'Peso', i.UnidadPeso As 'UnidadPeso', i.Altura As 'Altura', i.UnidadAltura As 'UnidadAltura',
                                i.Temperatura As 'Temperatura', i.UnidadTemperatura As 'UnidadTemperatura', i.Pulso As 'Pulso', i.PresionMax As 'Max', i.PresionMin  As 'Min',
                                i.Observaciones As 'Observaciones', i.PeriodoMeunstral As 'PeriodoMeunstral', i.Glucotex As 'Glucotex', i.PC As 'PC', 
                                 i.PT As 'PT', i.PA As 'PA', i.FR As 'FR', i.PAP As 'PAP', i.Motivo As 'Motivo'
                          FROM consulta c
                          INNER JOIN usuario u ON c.IdUsuario = u.IdUsuario
                          INNER JOIN persona p ON c.IdPersona = p.IdPersona
                          INNER JOIN modulo m ON c.IdModulo = m.IdModulo
                          INNER JOIN indicador i ON c.IdConsulta = i.IdConsulta
                          WHERE c.IdConsulta = $idconsulta";
   $resultadoexpedientesu = $mysqli->query($queryexpedientesu);

   $datos = array();
            while ($test = $resultadoexpedientesu->fetch_assoc())
                  {
                      $datos["Paciente"] = $test['Paciente'];
                      $datos["Medico"] = $test['Medico'];
                      $datos["Especialidad"] = $test['Especialidad'];
                      $datos["FechaConsulta"] = $test['FechaConsulta'];
                      $datos["Peso"] = $test['Peso'];
                      $datos["UnidadPeso"] = $test['UnidadPeso'];
                      $datos["Altura"] = $test['Altura'];
                      $datos["UnidadAltura"] = $test['UnidadAltura'];
                      $datos["Temperatura"] = $test['Temperatura'];
                      $datos["UnidadTemperatura"] = $test['UnidadTemperatura'];
                      $datos["Pulso"] = $test['Pulso'];
                      $datos["Max"] = $test['Max'];
                      $datos["Min"] = $test['Min'];
                      $datos["Observaciones"] = $test['Observaciones'];
                      $datos["PeriodoMeunstral"] = $test['PeriodoMeunstral'];
                      $datos["Glucotex"] = $test['Glucotex'];
                      $datos["PC"] = $test['PC'];
                      $datos["PT"] = $test['PT'];
                      $datos["PA"] = $test['PA'];
                      $datos["FR"] = $test['FR'];
                      $datos["PAP"] = $test['PAP'];
                      $datos["Motivo"] = $test['Motivo'];
                  }

    header("Content-Type","application/json");

    print_r(json_encode($datos));

?>
