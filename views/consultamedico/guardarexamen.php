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
    $idtipoexamen = $_POST['cboTipoExamen'];
		$indicacion = $_POST['txtIndicacion'];


	   $insertexpediente = "INSERT INTO listaexamen(IdUsuario,IdConsulta,IdPersona,IdTipoExamen,Activo,FechaExamen,Indicacion)"
		                     . "VALUES ('$idusuario','$idconsulta','$idpersona','$idtipoexamen',1,now(),'$indicacion')";
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
