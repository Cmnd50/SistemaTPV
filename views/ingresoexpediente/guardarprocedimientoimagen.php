<?php
require_once '../../include/dbconnect.php';
session_start();

//ELIMINAR SIMBOLOS
function eliminar_simbolos($string){
 
    $string = trim($string);
 
    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );
 
    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );
 
    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );
 
    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );
 
    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );
 
    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );
 
    $string = str_replace(
        array("\\", "¨", "º", "-", "~",
             "#", "@", "|", "!", "\"",
             "·", "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "<code>", "]",
             "+", "}", "{", "¨", "´",
             ">", "< ", ";", ",", ":",
             ".", " "),
        ' ',
        $string
    );
return $string;
} 

$persona = $_POST['txtid'];
$fecha = $_POST['txtFechaConsulta'];
//$IdUsuario = 3;
//OBTENER CONFIGURACION GENERAL
$queryobtenerconfig = "SELECT IpServidora, NombreCarpeta, UnidadServer FROM configuraciongeneral WHERE IdConfiguracionGeneral = 1";

$resultadoobtenerconfig = $mysqli->query($queryobtenerconfig);
while ($test = $resultadoobtenerconfig->fetch_assoc()) {
           $ip = $test['IpServidora'];
           $unidad = $test['UnidadServer'];
           $nombrecarpeta = $test['NombreCarpeta'];
       }


//OBTENER USUARIO MIGRADO
$queryobtenerconfig = "SELECT IdUsuario FROM usuario WHERE InicioSesion = 'Migrado'";

$resultadoobtenerconfig = $mysqli->query($queryobtenerconfig);
while ($test = $resultadoobtenerconfig->fetch_assoc()) {
           $IdUsuario = $test['IdUsuario'];
       }


//OBTENER NOMBRE CON CODIGO **************************************
$queryobtenernombrecodigo = "SELECT CONCAT(Categoria,'',replace(FechaNacimiento,'-',''),' ',Nombres,' ',Apellidos) AS 'Nombre' FROM persona WHERE IdPersona = '$persona'";

$resultadoobtenernombrecodigo = $mysqli->query($queryobtenernombrecodigo);
while ($test = $resultadoobtenernombrecodigo->fetch_assoc()) {
           $codigo = $test['Nombre'];
       }

 //OBTENER NOMBRE CON CATEGORIA **************************************
$queryobtenernombrecategoria = "SELECT CONCAT(Categoria,' ',Nombres,' ',Apellidos) AS 'Nombre' FROM persona WHERE IdPersona = '$persona'";

$resultadoobtenernombrecategoria = $mysqli->query($queryobtenernombrecategoria);
while ($test = $resultadoobtenernombrecategoria->fetch_assoc()) {
           $nombrecategoria = eliminar_simbolos($test['Nombre']);
       }

//OBTENER NOMBRE COMPLETO **************************************
$queryobtenernombre = "SELECT CONCAT(Nombres,' ',Apellidos) AS 'Nombre' FROM persona WHERE IdPersona = '$persona'";

$resultadoobtenernombre = $mysqli->query($queryobtenernombre);
while ($test = $resultadoobtenernombre->fetch_assoc()) {
           $Nombres = $test['Nombre'];
       }


//DARLE FORMATO AL NOMBRE QUE TENDRA EL PDF **************************************
$NombreArchivo = "Consulta " . str_replace('-','',$fecha).'';

//RUTA DE LA CARPETA DONDE SE ALMACENARAN LOS PDFS DE LAS CONSULTAS SEGUN NOMBRE **************************************

$rutapersona = $nombrecarpeta.'/'.$nombrecategoria;
$ruta = $nombrecarpeta.'/'.$nombrecategoria.'/Procedimientos/'.$NombreArchivo;
$carpeta = '//'.$ip.'/'.$unidad.'/'.$nombrecarpeta.'/'.$nombrecategoria.'/Procedimientos/';
$subcarpeta = $carpeta . $NombreArchivo;

if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);

	     $insertexpediente2 = "UPDATE persona SET RutaCarpeta='$rutapersona'  WHERE IdPersona='$persona'";
	    $resultadoinsertmovimiento2 = $mysqli->query($insertexpediente2);

	    	if(!file_exists($subcarpeta)){
	    		mkdir($subcarpeta, 0777, true);

    		        $insertconsultaurlima = "INSERT INTO enfermeriaprocedimiento(IdPersona,FechaProcedimiento, Estado, Procedimientoimaurl,IPServer,UnidadServer,IdUsuario)"
                       . "VALUES ('$persona','$fecha',1,'$ruta','$ip','$unidad','$IdUsuario')";
					$resultadoinsertconsultaurlima = $mysqli->query($insertconsultaurlima);
					
					foreach($_FILES["file"]['tmp_name'] as $key => $tmp_name)
						{
							//Validamos que el archivo exista
							if($_FILES["file"]["name"][$key]) {
								$filename = $_FILES["file"]["name"][$key]; //Obtenemos el nombre original del archivo
								$source = $_FILES["file"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
								
								$directorio = $subcarpeta; //Declaramos un  variable con la ruta donde guardaremos los archivos
								
								//Validamos si la ruta de destino existe, en caso de no existir la creamos
								if(!file_exists($directorio)){
									mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
								}
								
									$dir=opendir($directorio); //Abrimos el directorio de destino
									$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
								
								//Movemos y validamos que el archivo se haya cargado correctamente
								//El primer campo es el origen y el segundo el destino
								if(move_uploaded_file($source, $target_path)) {	
									
									} else {	
									
								}
								closedir($dir); //Cerramos el directorio de destino
							}
						}
	    	}
	    		    	else{
		//CONTADOR DE CONSULTAS **************************************
			$queryobtenercontador = "SELECT count(*) as 'Contador' FROM 
										enfermeriaprocedimiento WHERE FechaProcedimiento = '$fecha' and IdPersona = '$persona';";

							$resultadoobtenercontador = $mysqli->query($queryobtenercontador);
							while ($test = $resultadoobtenercontador->fetch_assoc()) {
							           $contador = $test['Contador'] + 1;
							       }


	    					$subcarpeta = $carpeta . $NombreArchivo.'('.$contador.')';

	    			    	mkdir($subcarpeta, 0777, true);
							$ruta = $nombrecarpeta.'/'.$nombrecategoria.'/Procedimientos/'.$NombreArchivo.'('.$contador.')';
    		        		$insertconsultaurlima = "INSERT INTO enfermeriaprocedimiento(IdPersona,FechaProcedimiento, Estado, Procedimientoimaurl,IPServer,UnidadServer,IdUsuario)"
                       					. "VALUES ('$persona','$fecha',1,'$ruta','$ip','$unidad','$IdUsuario')";
								$resultadoinsertconsultaurlima = $mysqli->query($insertconsultaurlima);
					
					foreach($_FILES["file"]['tmp_name'] as $key => $tmp_name)
						{
							//Validamos que el archivo exista
							if($_FILES["file"]["name"][$key]) {
								$filename = $_FILES["file"]["name"][$key]; //Obtenemos el nombre original del archivo
								$source = $_FILES["file"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
								
								$directorio = $subcarpeta; //Declaramos un  variable con la ruta donde guardaremos los archivos
								
								//Validamos si la ruta de destino existe, en caso de no existir la creamos
								if(!file_exists($directorio)){
									mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
								}
								
									$dir=opendir($directorio); //Abrimos el directorio de destino
									$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
									
							

								//Movemos y validamos que el archivo se haya cargado correctamente
								//El primer campo es el origen y el segundo el destino
								if(move_uploaded_file($source, $target_path)) {	
									
									} else {	
									
								}
								closedir($dir); //Cerramos el directorio de destino
							}
						}
	    	}

}
else{
    	if(!file_exists($subcarpeta)){
	    		mkdir($subcarpeta, 0777, true);

	    		   $insertconsultaurlima = "INSERT INTO enfermeriaprocedimiento(IdPersona,FechaProcedimiento, Estado, Procedimientoimaurl,IPServer,UnidadServer,IdUsuario)"
                       . "VALUES ('$persona','$fecha',1,'$ruta','$ip','$unidad','$IdUsuario')";
					$resultadoinsertconsultaurlima = $mysqli->query($insertconsultaurlima);

					foreach($_FILES["file"]['tmp_name'] as $key => $tmp_name)
						{
							//Validamos que el archivo exista
							if($_FILES["file"]["name"][$key]) {
								$filename = $_FILES["file"]["name"][$key]; //Obtenemos el nombre original del archivo
								$source = $_FILES["file"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
								
								$directorio = $subcarpeta; //Declaramos un  variable con la ruta donde guardaremos los archivos
								
								//Validamos si la ruta de destino existe, en caso de no existir la creamos
								if(!file_exists($directorio)){
									mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
								}
								
									$dir=opendir($directorio); //Abrimos el directorio de destino
									$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
								
								//Movemos y validamos que el archivo se haya cargado correctamente
								//El primer campo es el origen y el segundo el destino
								if(move_uploaded_file($source, $target_path)) {	
									echo $insertconsultaurlima;
									
									} else {	
									
								}
								closedir($dir); //Cerramos el directorio de destino
							}
				 }
	    	}  
	    	else{
		//CONTADOR DE CONSULTAS **************************************
			$queryobtenercontador = "SELECT count(*) as 'Contador' FROM 
										enfermeriaprocedimiento WHERE FechaProcedimiento = '$fecha' and IdPersona = '$persona';";

							$resultadoobtenercontador = $mysqli->query($queryobtenercontador);
							while ($test = $resultadoobtenercontador->fetch_assoc()) {
							           $contador = $test['Contador'] + 1;
							       }


	    					$subcarpeta = $carpeta . $NombreArchivo.'('.$contador.')';

	    			    	mkdir($subcarpeta, 0777, true);
							$ruta = $nombrecarpeta.'/'.$nombrecategoria.'/Procedimientos/'.$NombreArchivo.'('.$contador.')';
    		        		$insertconsultaurlima = "INSERT INTO enfermeriaprocedimiento(IdPersona,FechaProcedimiento, Estado, Procedimientoimaurl,IPServer,UnidadServer,IdUsuario)"
                       					. "VALUES ('$persona','$fecha',1,'$ruta','$ip','$unidad','$IdUsuario')";
								$resultadoinsertconsultaurlima = $mysqli->query($insertconsultaurlima);
					
					foreach($_FILES["file"]['tmp_name'] as $key => $tmp_name)
						{
							//Validamos que el archivo exista
							if($_FILES["file"]["name"][$key]) {
								$filename = $_FILES["file"]["name"][$key]; //Obtenemos el nombre original del archivo
								$source = $_FILES["file"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
								
								$directorio = $subcarpeta; //Declaramos un  variable con la ruta donde guardaremos los archivos
								
								//Validamos si la ruta de destino existe, en caso de no existir la creamos
								if(!file_exists($directorio)){
									mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
								}
								
									$dir=opendir($directorio); //Abrimos el directorio de destino
									$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
									
							

								//Movemos y validamos que el archivo se haya cargado correctamente
								//El primer campo es el origen y el segundo el destino
								if(move_uploaded_file($source, $target_path)) {	
									
									} else {	
									
								}
								closedir($dir); //Cerramos el directorio de destino
							}
						}
	    	}
}



 header('Location: ../../web/ingresoexpediente/view?id='.$persona);