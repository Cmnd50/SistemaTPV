
 <?php

require_once '../../include/dbconnect.php';
session_start();

    $user = $_SESSION['IdUsuario'];
    $persona = $_POST['txtPaciente'];
    $modulo = $_POST['cboModulo'];
    $motivo = $_POST['cboMotivo'];

		//AL MOMENTO DE ALMACENAR LA CONSULTA, EL IDESTADO SE GUARDA EN 1, ESO SIGNIFICA QUE NO TIENE ALMACENADOS SIGNOS VITALES
    $insertexpediente = "INSERT INTO enfermeriaprocedimiento(IdPersona,FechaProcedimiento,IdMotivoProcedimiento,IdUsuario,IdModulo,Estado)"
                       . "VALUES ('$persona',now(),'$motivo','$user','$modulo',1)";
    $resultadoinsertmovimiento = $mysqli->query($insertexpediente);

    header('Location: ../../web/enfermeriaprocedimiento/medical?id='.$persona);

    
?>
