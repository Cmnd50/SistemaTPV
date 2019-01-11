
 <?php

require_once '../../include/dbconnect.php';
session_start();


			$tipo_examen = 5;
			$usuario = $_SESSION['IdUsuario'];
			$id_persona = $_POST["idpersona"];;
			$id_consulta = $_POST["idconsulta"];
			$resultado = $_POST['resultado'];
			$idlistaexamen = $_POST['idlistaexamen'];


			$insertmovimiento = "INSERT INTO examenesvarios(IdListaExamen, IdTipoExamen, IdUsuario, IdPersona, Fecha, Resultado, Activo)"
															."VALUES('$idlistaexamen','$tipo_examen', '$usuario', '$id_persona', now(), '$resultado',1)";
			$resultadoinsertmovimiento = $mysqli->query($insertmovimiento);

			$insertmovimiento2 = "UPDATE listaexamen SET Activo=0 WHERE IdListaExamen='$idlistaexamen'";
			$resultadoinsertmovimiento2 = $mysqli->query($insertmovimiento2);

			


    header('Location: ../../web/laboratorioclinico/index');

    
