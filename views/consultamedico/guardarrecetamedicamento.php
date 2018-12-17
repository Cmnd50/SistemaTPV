<html>
<head>
	<script src="../web/plugins/jQuery/jQuery-2.2.0.min.js"></script>

</head>
<body>
 <?php

include '../include/dbconnect.php';
session_start();


    $idconsulta = $_POST['txtconsultaID'];

    $totalfrascos = $_POST['txtTotal'];

    $idreceta = $_POST['txtIdReceta'];
    $idmedicamento = $_POST['txtIdMedicamento'];
    if(empty($_POST['txtCantidad'])){
        $cantidad = 0;
    }else{
	$cantidad = $_POST['txtCantidad'];
    }
    if(empty($_POST['txtHoras'])){
        $horas = 0;
    }else{
    $horas = $_POST['txtHoras'];
    }
    if(empty($_POST['txtDias'])){
        $dias = 0;
    }else{
    $dias = $_POST['txtDias'];
    }
    if(!empty($totalfrascos)){
        $total_dec = $totalfrascos;
        $indicacion = $_POST['txtIndicacion'];
    }
    else{
    $total_dec = $dias * ((24 / $horas) * $cantidad);
            $indicacion = '';
        }
    $total = round($total_dec);



    $insertmovimiento = "INSERT INTO receta_medicamentos(IdReceta,IdMedicamento,Cantidad,Horas,Dias,Total,Indicacion)"
    		                ."VALUES ('$idreceta','$idmedicamento','$cantidad','$horas','$dias','$total','$indicacion')";
    $resultadoinsertmovimiento = $mysqli->query($insertmovimiento);



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
