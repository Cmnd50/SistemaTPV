<?php
require_once '../../include/dbconnect.php';
session_start();

$persona = $_POST['txtid'];
$fecha = $_POST['txtFechaConsulta'];


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
           $nombrecategoria = $test['Nombre'];
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
$carpeta = 'C:/UQSolutions/'.$nombrecategoria.'/Procedimientos/';
$subcarpeta = $carpeta . $NombreArchivo;
$carpetaGuardar = 'C:/UQSolutions/'.$nombrecategoria.'';

//VALIDACION PARA TOMAR EL ARCHIVO PDF **************************************


if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);

	    $insertexpediente2 = "UPDATE persona SET RutaCarpeta='$carpetaGuardar'  WHERE IdPersona='$persona'";
	    $resultadoinsertmovimiento2 = $mysqli->query($insertexpediente2);



	    	if(!file_exists($subcarpeta)){
	    		mkdir($subcarpeta, 0777, true);

    		        $insertconsultaurlima = "INSERT INTO enfermeriaprocedimiento(IdPersona,FechaProcedimiento, Estado, Procedimientoimaurl)"
                       . "VALUES ('$persona','$fecha',1,'$subcarpeta')";
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

	    		   $insertconsultaurlima = "INSERT INTO enfermeriaprocedimiento(IdPersona,FechaProcedimiento, Estado, Procedimientoimaurl)"
                       . "VALUES ('$persona','$fecha',1,'$subcarpeta')";
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
}



 header('Location: ../../web/ingresoexpediente/view?id='.$persona);