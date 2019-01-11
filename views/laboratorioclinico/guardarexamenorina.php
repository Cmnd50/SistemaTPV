
 <?php

require_once '../../include/dbconnect.php';
session_start();


			$tipo_examen = 3;
			$usuario = $_SESSION['IdUsuario'];
			$id_persona = $_POST["idpersona"];;
			$id_consulta = $_POST["idconsulta"];
			$color = $_POST['color'];
			$olor = $_POST['olor'];
			$aspecto = $_POST['aspecto'];
			$densidad = $_POST['densidad'];
			$PH = $_POST['ph'];
			$proteinas = $_POST['proteinas'];
			$glucosa = $_POST['glucosa'];
			$sangreoculta = $_POST['sangreoculta'];
			$cuerposcetomicos = $_POST['cuerposcetomicos'];
			$urobilinogeno = $_POST['urobilinogeno'];
			$bilirrubina = $_POST['bilirrubina'];
			$esterasaleucocitaria = $_POST['esterasaleucocitaria'];
			$cilindros = $_POST['cilindros'];
			$hematies = $_POST['hematies'];
			$leucocitos = $_POST['leucocitos'];
			$celulasepiteliales = $_POST['celulasepiteliales'];
			$elementosminerales = $_POST['elementosminerales'];
			$parasitos = $_POST['parasitos'];
			$observaciones = $_POST['observaciones'];
			$idlistaexamen = $_POST['idlistaexamen'];

	if(empty($id_consulta)){

			$insertmovimiento = "INSERT INTO examenorina (IdListaExamen, IdTipoExamen, IdUsuario, IdPersona, Fecha, Color, Olor, Aspecto, Densidad, Ph, Proteinas, Glucosa, SagreOculta,
																			 CuerposCetomicos, Urobilinogeno, Bilirrubina, EsterasaLeucocitaria, Cilindros, Hematies, Leucocitos, CelulasEpiteliales, ElementosMinerales,
																			 Parasitos, Observaciones,Activo)"
																 ."VALUES('$idlistaexamen','$tipo_examen', '$usuario', '$id_persona', now(), '$color', '$olor', '$aspecto', '$densidad', '$PH', '$proteinas', '$glucosa',
																			'$sangreoculta', '$cuerposcetomicos', '$urobilinogeno', '$bilirrubina', '$esterasaleucocitaria', '$cilindros', '$hematies',
																			'$leucocitos', '$celulasepiteliales', '$elementosminerales', '$parasitos', '$observaciones',1)";

			$insertmovimiento2 = "UPDATE listaexamen SET Activo=0 WHERE IdListaExamen='$idlistaexamen'";
			$resultadoinsertmovimiento2 = $mysqli->query($insertmovimiento2);

	}

	else{
					$insertmovimiento = "INSERT INTO examenorina (IdListaExamen, IdTipoExamen, IdConsulta, IdUsuario, IdPersona, Fecha, Color, Olor, Aspecto, Densidad, Ph, Proteinas, Glucosa, SagreOculta,
																			 CuerposCetomicos, Urobilinogeno, Bilirrubina, EsterasaLeucocitaria, Cilindros, Hematies, Leucocitos, CelulasEpiteliales, ElementosMinerales,
																			 Parasitos, Observaciones,Activo)"
																 ."VALUES('$idlistaexamen','$tipo_examen', '$id_consulta', '$usuario', '$id_persona', now(), '$color', '$olor', '$aspecto', '$densidad', '$PH', '$proteinas', '$glucosa',
																			'$sangreoculta', '$cuerposcetomicos', '$urobilinogeno', '$bilirrubina', '$esterasaleucocitaria', '$cilindros', '$hematies',
																			'$leucocitos', '$celulasepiteliales', '$elementosminerales', '$parasitos', '$observaciones',1)";

			$insertmovimiento2 = "UPDATE listaexamen SET Activo=0 WHERE IdListaExamen='$idlistaexamen'";
			$resultadoinsertmovimiento2 = $mysqli->query($insertmovimiento2);

	}




    header('Location: ../../web/laboratorioclinico/index');
