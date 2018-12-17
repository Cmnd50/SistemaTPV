
<html>
<head>
	<script src="../web/plugins/jQuery/jQuery-2.2.0.min.js"></script>



</head>
<body>
 <?php

      include '../include/dbconnect.php';
      session_start();

      $id = $_POST['txtconsultaID'];
      $idpersona = $_POST['txtpersonaID'];


      $insertexpediente = "UPDATE consulta SET Activo=0 WHERE IdConsulta='$id'";
      $resultadoinsertmovimiento = $mysqli->query($insertexpediente);

      $insertexpediente2 = "UPDATE persona SET IdEstado=1 WHERE IdPersona='$idpersona'";
      $resultadoinsertmovimiento2 = $mysqli->query($insertexpediente2);

?>


        <form id="frm" action="medico_index_consulta.php" method="post" class="hidden"  >

        </form>

    <script type="text/javascript">
		    $(document).ready(function(){
		            //alert($("#IdConsulta").val());
		            $("#frm").submit();
		    });
		</script>
</body>
</html>
