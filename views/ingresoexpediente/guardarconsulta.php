
 <?php

require_once '../../include/dbconnect.php';
session_start();

    $user = $_SESSION['IdUsuario'];
    $persona = $_POST['txtid'];
    $usuario = $_POST['cboUsuario'];
    $modulo = $_POST['cboModulo'];
    $fecha = $_POST['txtFecha'];

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

      $diagnostico = $_POST['txtDiagnostico'];
      $enfermedad = $_POST['cboEnfermedad'];
      $comentarios = $_POST['txtComentarios'];
      $otros = $_POST['txtOtros'];
      $estadonutricional = $_POST['txtEstadoNutriconal'];
      $alergias = $_POST['txtAlergiass'];
      $cirugiasprevias = $_POST['txtCirugiasPrevias'];
      $medicamentosactuales = $_POST['txtMedicamentosTomados'];
      $examenfisica = $_POST['txtExamenFisica'];
      $plantratamiento = $_POST['txtPlanTratamiento'];
      $fechaproxvisita = $_POST['txtFechaProxima'];

		//CREACION DE CONSULTA
    $insertexpediente = "INSERT INTO consulta(IdUsuario,IdPersona,IdModulo,FechaConsulta, Activo, IdEstado)"
                       . "VALUES ('$usuario','$persona','$modulo', '$fecha', 0, 1)";
    $resultadoinsertmovimiento = $mysqli->query($insertexpediente);
    $idconsulta = $mysqli->insert_id;
        //CREACION DE CONSULTA
    $insertexpediente1 = "INSERT INTO indicador(IdConsulta,Peso,UnidadPeso,Altura,UnidadAltura,Temperatura,UnidadTemperatura,Pulso,PresionMax,PresionMin,Observaciones,PeriodoMeunstral,Glucotex,PC,PT,PA,FR,PAP,Motivo)
                             VALUES ('$idconsulta','$peso','$pesoindicador','$altura','$alturaindicador','$temperatura','$temperaturaindicador','$pulso','$max','$min','$observaciones','$ulmenstruacion','$glucotex','$pc','$pt','$pa','$fr','$ulpap','$motivo')";
    $resultadoinsertmovimiento1 = $mysqli->query($insertexpediente1);


    $insertexpediente2 = "UPDATE consulta SET Diagnostico='$diagnostico',IdEnfermedad='$enfermedad',Comentarios='$comentarios',Otros='$otros',Activo=0,
                          EstadoNutricional='$estadonutricional',CirugiasPrevias='$cirugiasprevias',MedicamentosActuales='$medicamentosactuales',ExamenFisica='$examenfisica',
                          PlanTratamiento='$plantratamiento',FechaProxVisita='$fechaproxvisita',Alergias='$alergias'  WHERE IdConsulta='$idconsulta'";
    $resultadoinsertmovimiento2 = $mysqli->query($insertexpediente2);

    //echo $insertexpediente;
    //echo $insertexpediente1;
    //echo $insertexpediente2;

    header('Location: ../../web/ingresoexpediente/view?id='.$persona);

