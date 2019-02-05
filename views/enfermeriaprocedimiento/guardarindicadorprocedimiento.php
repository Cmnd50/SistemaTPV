
 <?php

require_once '../../include/dbconnect.php';
session_start();

    //$user = $_SESSION['IdUsuario'];
    $idpersona = $_POST['txtid'];
    $idenfermeriaprocedimiento = $_POST['txtIdConsulta'];
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

    $insertexpediente = "INSERT INTO indicadorprocedimiento(IdEnfermeriaProcedimiento,Peso,UnidadPeso,Altura,UnidadAltura,Temperatura,UnidadTemperatura,Pulso,PresionMax,PresionMin,Observaciones,PeriodoMeunstral,Glucotex,PC,PT,PA,FR,PAP,Motivo)
                             VALUES ('$idenfermeriaprocedimiento','$peso','$pesoindicador','$altura','$alturaindicador','$temperatura','$temperaturaindicador','$pulso','$max','$min','$observaciones','$ulmenstruacion','$glucotex','$pc','$pt','$pa','$fr','$ulpap','$motivo')";
    $resultadoinsertmovimiento = $mysqli->query($insertexpediente);


    echo $insertexpediente;
    header('Location: ../../web/enfermeriaprocedimiento/medical?id='.$idpersona);
