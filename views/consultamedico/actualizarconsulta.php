 <?php

require_once '../../include/dbconnect.php';
session_start();

      $id = $_POST['txtconsultaID'];
      $idpersona = $_POST['txtpersonaID'];
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



      $insertexpediente = "UPDATE consulta SET Diagnostico='$diagnostico',IdEnfermedad='$enfermedad',Comentarios='$comentarios',Otros='$otros',Activo=1,
                          EstadoNutricional='$estadonutricional',CirugiasPrevias='$cirugiasprevias',MedicamentosActuales='$medicamentosactuales',ExamenFisica='$examenfisica',
                          PlanTratamiento='$plantratamiento',FechaProxVisita='$fechaproxvisita',Alergias='$alergias'  WHERE IdConsulta='$id'";
      $resultadoinsertmovimiento = $mysqli->query($insertexpediente);

      //echo $insertexpediente;
      
     header('Location: ../../web/consultamedico/medical?id='.$id);
