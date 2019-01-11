
 <?php

require_once '../../include/dbconnect.php';
session_start();

			$tipo_examen = 2;
			$usuario = $_SESSION['IdUsuario'];
			$id_persona = $_POST["idpersona"];;
			$id_consulta = $_POST["idconsulta"];
			$color = $_POST['color'];
			$consistencia = $_POST['consistencia'];
			$mucus = $_POST['mucus'];
			$hematies = $_POST['hematies'];
			$leucocitos = $_POST['leucocitos'];
			$restosalimenticios = $_POST['restosalimenticios'];
			$macroscopicos = $_POST['macroscopicos'];
			$microscopicos = $_POST['microscopicos'];
			$florabacteriana = $_POST['florabacteriana'];
			$otros = $_POST['otros'];
			$pactivos = $_POST['pactivos'];
			$pquistes = $_POST['pquistes'];
    		$idlistaexamen = $_POST['idlistaexamen'];

	    $insertmovimiento = "INSERT INTO examenheces(IdListaExamen, IdTipoExamen IdUsuario, IdPersona, Fecha, Color, Consistencia, Mucus, Hematies, Leucocitos, RestosAlimenticios,
																			Macrocopicos, Microscopicos, FloraBacteriana, Otros, PActivos, PQuistes,Activo)"
								."VALUES('$idlistaexamen','$tipo_examen', '$usuario', '$id_persona', now(), '$color', '$consistencia', '$mucus', '$hematies', '$leucocitos',
													'$restosalimenticios', '$macroscopicos', '$microscopicos', '$florabacteriana', '$otros', '$pactivos', '$pquistes',1)";
		    $resultadoinsertmovimiento = $mysqli->query($insertmovimiento);

            $insertmovimiento2 = "UPDATE listaexamen SET Activo=0 WHERE IdListaExamen='$idlistaexamen'";
			$resultadoinsertmovimiento2 = $mysqli->query($insertmovimiento2);



    header('Location: ../../web/laboratorioclinico/index');
