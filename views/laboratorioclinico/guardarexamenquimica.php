
 <?php

require_once '../../include/dbconnect.php';
session_start();

			$tipo_examen = 4;
			$usuario = $_SESSION['IdUsuario'];
			$id_persona = $_POST["idpersona"];;
			$id_consulta = $_POST["idconsulta"];
			$glucosa = $_POST['glucosa'];
			$glucosapost = $_POST['glucosapost'];
			$colesteroltotal = $_POST['colesteroltotal'];
			$triglicerido = $_POST['triglicerido'];
			$acidourico = $_POST['acidourico'];
			$creatinina = $_POST['creatinina'];
			$nitrogenoureico = $_POST['nitrogenoureico'];
			$urea = $_POST['urea'];
			$idlistaexamen = $_POST['idlistaexamen'];

			$insertmovimiento = "INSERT INTO examenquimica(IdListaExamen, IdTipoExamen, IdUsuario, IdPersona, Fecha, Glucosa, GlucosaPost, ColesterolTotal, Triglicerido, AcidoUrico,
																											Creatinina,	NitrogenoUreico, Urea, Activo)"
																."VALUES('$idlistaexamen','$tipo_examen', '$usuario', '$id_persona', now(), '$glucosa', '$glucosapost', '$colesteroltotal', '$triglicerido',
																					'$acidourico', '$creatinina', '$nitrogenoureico', '$urea',1)";
			$resultadoinsertmovimiento = $mysqli->query($insertmovimiento);																		

			$insertmovimiento2 = "UPDATE listaexamen SET Activo=0 WHERE IdListaExamen='$idlistaexamen'";
			$resultadoinsertmovimiento2 = $mysqli->query($insertmovimiento2);

			

   header('Location: ../../web/laboratorioclinico/index');
