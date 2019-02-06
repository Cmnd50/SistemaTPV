
 <?php

require_once '../../include/dbconnect.php';
session_start();

    //$user = $_SESSION['IdUsuario'];
    $idpersona = $_POST['txtid'];
    $idenfermeriaprocedimiento = $_POST['txtIdConsulta'];
    $idindicador = $_POST['txtIdProcedimiento'];
    $peso = $_POST['txtPeso'];
    $pesoindicador = $_POST['cboUnidadPeso'];
    $altura = $_POST['txtAltura'];
    $alturaindicador = $_POST['cboUnidadAltura'];
    $temperatura = $_POST['txtTemperatura'];
    $temperaturaindicador = $_POST['cboUnidadTemperatura'];
    $pulso = $_POST['txtPulso'];
    $max = $_POST['txtMax'];
    $min = $_POST['txtMin'];
    $observaciones = $_POST['txtObservaciones'];
    $fr = $_POST['txtFR'];
    $glucotex = $_POST['txtGluco'];
    $ulmenstruacion = $_POST['txtUmestruacion'];
    $ulpap = $_POST['txtUpap'];
    $pc = $_POST['txtpc'];
    $pt = $_POST['txtpt'];
    $pa = $_POST['txtpa'];
    $motivo = $_POST['txtMotivo'];

    $queryvalidacionprocedimientodiario = "SELECT ep.IdEnfermeriaProcedimiento As 'ID Procedimiento', ip.IdIndicadorProcedimiento as 'IDIndicador', CONCAT(p.Nombres,' ',p.Apellidos) As 'Paciente',
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
                WHERE ep.IdEnfermeriaProcedimiento = '$idenfermeriaprocedimiento' and ip.IdIndicadorProcedimiento = '$idindicador' ";
                      $resultqueryvalidacionprocedimientodiario = $mysqli->query($queryvalidacionprocedimientodiario);
                      if(mysqli_num_rows($resultqueryvalidacionprocedimientodiario)==0){
                            $insertindicadorprocedimiento = "INSERT INTO indicadorprocedimiento(IdEnfermeriaProcedimiento,Peso,UnidadPeso,Altura,UnidadAltura,Temperatura,UnidadTemperatura,Pulso,PresionMax,PresionMin,Observaciones,PeriodoMeunstral,Glucotex,PC,PT,PA,FR,PAP,Motivo)
                                                     VALUES ('$idenfermeriaprocedimiento','$peso','$pesoindicador','$altura','$alturaindicador','$temperatura','$temperaturaindicador','$pulso','$max','$min','$observaciones','$ulmenstruacion','$glucotex','$pc','$pt','$pa','$fr','$ulpap','$motivo')";
                            $resultadoinsertmovimiento = $mysqli->query($insertindicadorprocedimiento);
                         }else{
                                $updateindicadorprocedimiento = "UPDATE indicadorprocedimiento SET IdEnfermeriaProcedimiento = '$idenfermeriaprocedimiento', Peso = '$peso',
                                     UnidadPeso = '$pesoindicador', Altura = '$altura', UnidadAltura = '$alturaindicador', Temperatura = '$temperatura', UnidadTemperatura = '$temperaturaindicador', Pulso = '$pulso', PresionMax = '$max', PresionMin = '$min',
                                     Observaciones = '$observaciones', Motivo = '$motivo'";
                                 $resultadoinsertmovimiento = $mysqli->query($updateindicadorprocedimiento); 
                         }




    // echo $updateindicadorprocedimiento;
    header('Location: ../../web/enfermeriaprocedimiento/medical?id='.$idpersona);
