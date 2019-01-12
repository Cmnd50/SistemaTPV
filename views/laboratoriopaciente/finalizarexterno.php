
<?php

require_once '../../include/dbconnect.php';
session_start();

      $idpersona = $_POST['txtpersonaID'];
      $insertexpediente2 = "UPDATE persona SET IdEstado=1 WHERE IdPersona='$idpersona'";
      $resultadoinsertmovimiento2 = $mysqli->query($insertexpediente2);

  header('Location: ../../web/laboratoriopaciente/index');