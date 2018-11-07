
<html>
<head>
	<script src="../web/plugins/jQuery/jQuery-2.2.0.min.js"></script>



</head>
<body>
 <?php

      include '../include/dbconnect.php';
      session_start();

      $id = $_POST['txtProcedimiento'];
      $idpersona = $_POST['txtid'];
      $observacion = $_POST['txtObservaciones'];


      $insertexpediente = "UPDATE enfermeriaprocedimiento SET Estado=2, Observaciones='$observacion' WHERE IdEnfermeriaProcedimiento='$id'";
      $resultadoinsertmovimiento = $mysqli->query($insertexpediente);

       $insertexpediente2 = "UPDATE persona SET IdEstado=1 WHERE IdPersona='$idpersona'";
       $resultadoinsertmovimiento2 = $mysqli->query($insertexpediente2);
      //echo $insertexpediente;
?>


        <form id="frm" action="enfermeria_index_sinconsulta.php" method="post" class="hidden"  >

        </form>

    <script type="text/javascript">
		    $(document).ready(function(){
		            //alert($("#IdConsulta").val());
		            $("#frm").submit();
		    });
		</script>
</body>
</html>
