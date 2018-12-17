<html>
<head>
	<script src="../web/plugins/jQuery/jQuery-2.2.0.min.js"></script>

</head>
<body>
 <?php

include '../include/dbconnect.php';
session_start();

    $idusuario = $_POST['txtusuarioID'];
    $idconsulta = $_POST['txtconsultaID'];
    $idpersona = $_POST['txtpersonaID'];


	   $insertexpediente = "INSERT INTO receta(IdUsuario,IdConsulta,IdPersona,Activo,Fecha)"
		                     . "VALUES ('$idusuario','$idconsulta','$idpersona',1,now())";
  	 $resultadoinsertmovimiento = $mysqli->query($insertexpediente);


?>


        <form id="frm" action="medico_consulta_paciente.php" method="post">
          <input type="hidden" id="IdConsulta" name="IdConsulta" value="<?php echo $idconsulta ?>" />
        </form>

				<script type="text/javascript">
						$(document).ready(function(){
										//alert($("#IdConsulta").val());
										$("#frm").submit();
						});
				</script>

<?php

?>
</body>
</html>
