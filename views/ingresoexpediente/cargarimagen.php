if(isset($_POST['submitExamen'])){
    $name       = $_FILES['file']['name'];  
    $temp_name  = $_FILES['file']['tmp_name'];

    //OBTENER NOMBRE CON CODIGO **************************************
      $queryobtenernombrecodigo = "SELECT CONCAT(Categoria,'',replace(FechaNacimiento,'-',''),' ',Nombres,' ',Apellidos) AS 'Nombre' FROM persona WHERE IdPersona = '$persona'";

      $resultadoobtenernombrecodigo = $mysqli->query($queryobtenernombrecodigo);
      while ($test = $resultadoobtenernombrecodigo->fetch_assoc()) {
                 $codigo = $test['Nombre'];
             }

      //OBTENER NOMBRE COMPLETO **************************************
      $queryobtenernombre = "SELECT CONCAT(Nombres,' ',Apellidos) AS 'Nombre' FROM persona WHERE IdPersona = '$persona'";

      $resultadoobtenernombre = $mysqli->query($queryobtenernombre);
      while ($test = $resultadoobtenernombre->fetch_assoc()) {
                 $Nombres = $test['Nombre'];
             }


      //DARLE FORMATO AL NOMBRE QUE TENDRA EL PDF **************************************
      $NombreArchivo = "CONSULTA " . str_replace('-', '', $fecha).' '.$Nombres;

      //RUTA DE LA CARPETA DONDE SE ALMACENARAN LOS PDFS DE LAS CONSULTAS SEGUN NOMBRE **************************************
      $carpeta = 'C:/UQSolutions/EscaneoConsultas/'.$codigo.'';  


 if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);

    $insertexpediente2 = "UPDATE persona SET RutaCarpeta='$carpeta'  WHERE IdPersona='$persona'";
    $resultadoinsertmovimiento2 = $mysqli->query($insertexpediente2);
        
    if(isset($name)){
        if(!empty($name)){      
            $carpeta = 'C:/UQSolutions/EscaneoConsultas/'.$codigo.'';     
            if(move_uploaded_file($temp_name, $carpeta.$name)){
                echo 'File uploaded successfully';
            }
        }       
    }  else {
        echo 'You should select a file to upload !!';
    }
}

}
