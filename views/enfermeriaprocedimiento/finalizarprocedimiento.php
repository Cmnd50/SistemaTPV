
 <?php

      include '../../include/dbconnect.php';
      session_start();

      $id = $_POST['txtProcedimiento'];
      $idpersona = $_POST['txtid'];
      $observacion = $_POST['txtObservaciones'];


      $insertexpediente = "UPDATE enfermeriaprocedimiento SET Estado=2,  WHERE IdEnfermeriaProcedimiento='$id'";
      $resultadoinsertmovimiento = $mysqli->query($insertexpediente);

       $insertexpediente2 = "UPDATE persona SET IdEstado=1 WHERE IdPersona='$idpersona'";
       $resultadoinsertmovimiento2 = $mysqli->query($insertexpediente2);
       header('Location: ../../web/enfermeriaprocedimiento/index');

      //echo $insertexpediente;
