<?php

require_once '../../include/dbconnect.php';
session_start();


    $idconsulta = $_POST["id"];


$queryexpedientesu = "SELECT ep.IdEnfermeriaProcedimiento As 'ID', ip.IdIndicadorProcedimiento as 'IDIndicador', CONCAT(p.Nombres,' ',p.Apellidos) As 'Paciente', 
CONCAT(u.Nombres,' ',u.Apellidos) As 'Medico', m.NombreModulo As 'Especialidad', 
ep.FechaProcedimiento As 'FechaConsulta', ip.Altura as 'Altura', ip.UnidadAltura as 'UnidadAltura', ip.Peso as 'Peso', ip.UnidadPeso as 'UnidadPeso', 
ip.Temperatura as 'Temperatura', ip.UnidadTemperatura as 'UnidadTemperatura', ip.FR as 'FR', ip.Pulso as 'Pulso', ip.PresionMax as 'Max', ip.PresionMin as 'Min', 
ip.Glucotex as 'Glucotex', ip.Observaciones as 'Observaciones', ip.Motivo as 'Motivo'
FROM enfermeriaprocedimiento ep
INNER JOIN persona p ON p.IdPersona = ep.IdPersona
INNER JOIN usuario u ON u.IdUsuario = ep.IdUsuario
INNER JOIN modulo m ON m.IdModulo = ep.IdModulo
LEFT JOIN indicadorprocedimiento ip ON ip.IdEnfermeriaProcedimiento = ep.IdEnfermeriaProcedimiento
INNER JOIN motivoprocedimiento mp ON mp.IdMotivoProcedimiento = ep.IdMotivoProcedimiento
WHERE ep.FechaProcedimiento =  CURDATE()";
   $resultadoexpedientesu = $mysqli->query($queryexpedientesu);

   $datos = array();

            while ($test = $resultadoexpedientesu->fetch_assoc())
                  {
                      $datos["Paciente"] = $test['Paciente'];
                      $datos["Medico"] = $test['Medico'];
                      $datos["Especialidad"] = $test['Especialidad'];
                      $datos["FechaConsulta"] = $test['FechaConsulta'];
                      $datos["ID"] = $test['ID'];
                      if(empty($test['IDIndicador'])){
                         $datos["IDIndicador"] = "";
                      }else{
                        $datos["IDIndicador"] = $test['IDIndicador'];
                      }    
                      
                      if(empty($test['Altura'])){
                         $datos["Altura"] = "";
                      }else{
                        $datos["Altura"] = $test['Altura'];
                      }                                 
                      if(empty($test['UnidadAltura'])){
                         $datos["UnidadAltura"] = "";
                      }else{
                        $datos["UnidadAltura"] = $test['UnidadAltura'];
                      }
                      if(empty($test['Peso'])){
                         $datos["Peso"] = "";
                      }else{
                        $datos["Peso"] = $test['Peso'];
                      }
                      if(empty($test['UnidadPeso'])){
                         $datos["UnidadPeso"] = "";
                      }else{
                        $datos["UnidadPeso"] = $test['UnidadPeso'];
                      }
                      if(empty($test['Temperatura'])){
                         $datos["Temperatura"] = "";
                      }else{
                        $datos["Temperatura"] = $test['Temperatura'];
                      }
                      if(empty($test['UnidadTemperatura'])){
                         $datos["UnidadTemperatura"] = "";
                      }else{
                        $datos["UnidadTemperatura"] = $test['UnidadTemperatura'];
                      }
                      if(empty($test['FR'])){
                         $datos["FR"] = "";
                      }else{
                        $datos["FR"] = $test['FR'];
                      }
                      if(empty($test['Pulso'])){
                         $datos["Pulso"] = "";
                      }else{
                        $datos["Pulso"] = $test['Pulso'];
                      }
                      if(empty($test['Max'])){
                         $datos["Max"] = "";
                      }else{
                        $datos["Max"] = $test['Max'];
                      }
                      if(empty($test['Min'])){
                         $datos["Min"] = "";
                      }else{
                        $datos["Min"] = $test['Min'];
                      }
                      if(empty($test['Glucotex'])){
                         $datos["Glucotex"] = "";
                      }else{
                        $datos["Glucotex"] = $test['Glucotex'];
                      }
                      if(empty($test['Observaciones'])){
                         $datos["Observaciones"] = "";
                      }else{
                        $datos["Observaciones"] = $test['Observaciones'];
                      }
                      if(empty($test['Motivo'])){
                         $datos["Motivo"] = "";
                      }else{
                        $datos["Motivo"] = $test['Motivo'];
                      }

                      
                  }

    header("Content-Type","application/json");

    print_r(json_encode($datos));

?>
