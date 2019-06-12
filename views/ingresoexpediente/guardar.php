<?php
include '../../include/dbconnect.php';
session_start();



    //Guardar la geografia correcta
    $geografia = "";

    if(isset($_POST['txtDepartamento']))
        $geografia = $_POST['txtDepartamento'];

    if(isset($_POST['txtMunicipio']))
        $geografia = $_POST['txtMunicipio'];

    if(isset($_POST['txtCanton']))
        $geografia = $_POST['txtCanton'];


    $usuario = $_SESSION['IdUsuario'];
    $Nombres = $_POST['txtNombres'];
    $Apellidos = $_POST['txtApellidos'];
    $FechaNacimiento = $_POST['txtFechaNacimiento'];
    $Direccion = $_POST['txtDireccion'];
    $Correo = $_POST['txtCorreo'];
    $IdGeografia = $geografia;
    $Genero = $_POST['txtGenero'];
    $IdEstadoCivil = $_POST['txtIdEstadoCivil'];
    //$IdParentesco = 1; //$_POST['txt'];
    $Telefono = $_POST['txtTelefono'];
    $Celular = $_POST['txtCelular'];
    $Alergias = $_POST['txtAlergias'];
    $Medicamentos = $_POST['txtMedicamentos'];
    $Enfermedad = $_POST['txtEnfermedad'];
    $Dui = $_POST['txtDui'];
    $TelefonoResponsable = $_POST['txtTelefonoResponsable'];
    $IdEstado = "1";
    $Categoria = $_POST['txtCategoria'];

    //Datos del Responsable
    $NombresResponsable = $_POST['txtNombresResponsable'];
    $ApellidosResponsable = $_POST['txtApellidosResponsable'];
    $DuiResponsable = $_POST['txtDuiResponsable'];
    $Parentesco = $_POST['txtParentesco'];
    $IdPais = $_POST['txtIdPais'];

//OBTENER CODIGO BC
$querycodigobc = "SELECT MAX(codigopaciente) + 1 as 'Codigo' FROM persona";

$resultadocodigobc = $mysqli->query($querycodigobc);
while ($test = $resultadocodigobc->fetch_assoc()) {
           $bc = $test['Codigo'];
       }


    $query = "select Dui from persona where Dui = '".$Dui."'";
    $results = $mysqli->query( $query) or die('ok');

                if($results->fetch_assoc() > 0) // not available
                {  

                    $_SESSION['dui'] = 1;
                    echo '<script>window.location="../../web/ingresoexpediente/index"</script>';
                    //echo "entra aqui porque ya existe ";
                    //echo $query;
                } 

        else if($results->fetch_assoc() == 0){ 
            if ($Dui == ""){
            $_SESSION['dui'] = "";
            $insertexpediente = "INSERT INTO persona
                        (
                             Nombres,Apellidos,FechaNacimiento,Direccion
                            ,Correo,IdGeografia,Genero,IdEstadoCivil
                            ,Telefono,Celular,Alergias
                            ,Medicamentos,Enfermedad,Dui,TelefonoResponsable
                            ,IdEstado,Categoria,NombresResponsable
                            ,ApellidosResponsable,Parentesco,DuiResponsable,IdPais,CodigoPaciente
                        )
                        VALUES
                        (
                             '$Nombres','$Apellidos','$FechaNacimiento','$Direccion'
                            ,'$Correo','$IdGeografia','$Genero','$IdEstadoCivil'
                            ,'$Telefono','$Celular','$Alergias'
                            ,'$Medicamentos','$Enfermedad',null,'$TelefonoResponsable'
                            ,'$IdEstado','$Categoria','$NombresResponsable'
                            ,'$ApellidosResponsable','$Parentesco','$DuiResponsable',$IdPais,$bc
                        )";


                            $resultadoinsertmovimiento = $mysqli->query($insertexpediente);
                             $last_id = $mysqli->insert_id;

                           

                            $query = "select IdPersona from persona order by 1 desc limit 1";

                            $tbl = $mysqli->query($query);
                            $arr = array();

                            while ($f = $tbl->fetch_assoc())
                            {
                              $arr[] = $f;
                            }

                            $IdPersona = $arr[0]["IdPersona"];

                            echo "<h1>$IdPersona</h1>";

                            //Insertando el registro para el test de la persona
                            $strTest = "insert into test
                                            (IdPersona,IdClase,Fecha,Hora)
                                        VALUES
                                            ($IdPersona,1,NOW(),NOW())
                                        ";
                            $resultTest = $mysqli->query($strTest);

                            echo "<h2>$strTest</h2>";

                            //Determinando el IdTest
                            $query = "select IdTest from test order by 1 desc limit 1";

                            $tbl = $mysqli->query($query);
                            $arrTest = array();

                            while ($f = $tbl->fetch_assoc())
                            {
                              $arrTest[] = $f;
                            }

                            $IdTest = $arrTest[0]["IdTest"];


                            //echo "<h1>$IdTest</h1>";



                                //Barriendo las preguntas del socioeconómico
                                $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 1;";
                                $tblPreguntas = $mysqli->query($query);
                                $arrPreguntas = array();

                                while ($f = $tblPreguntas->fetch_assoc())
                                {
                                    $IdPregunta = $f["IdPregunta"];
                                    $IdRespuesta = $_POST["selPregunta". $f["IdPregunta"]];
                                    $IdFactor = 1;

                                    $queryInsResp = "insert into testdetalle
                                                        (IdTest,IdFactor,IdPregunta,IdRespuesta)
                                                    values
                                                        ($IdTest,$IdFactor,$IdPregunta,$IdRespuesta)
                                                    ";
                                    $resultInsResp = $mysqli->query($queryInsResp);
                                }



                                $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 2;";
                                $tblPregHC = $mysqli->query($query);
                                $arrPregHC = array();

                                while ($f = $tblPregHC->fetch_assoc())
                                {
                                    $IdPregunta = $f["IdPregunta"];
                                    $Ponderacion = $f["Ponderacion"];

                                    $IdFactor = 2;
                                    $IdRespuesta = $_POST["selPregunta". $f["IdPregunta"]];

                                    switch ($Ponderacion) {
                                        case "0":
                                        {
                                            //Insertar una respuesta por pregunta
                                            $queryInsResp = "insert into testdetalle
                                                        (IdTest,IdFactor,IdPregunta,IdRespuesta)
                                                    values
                                                        ($IdTest,$IdFactor,$IdPregunta,$IdRespuesta);
                                                    ";
                                            $resultInsResp = $mysqli->query($queryInsResp);
                                            //echo "<h3>$queryInsResp</h3>";
                                            break;
                                        }
                                        case "1":
                                        {
                                            //Insertar la respuesta abierta
                                            $queryInsResp = "insert into testdetalle
                                                        (IdTest,IdFactor,IdPregunta,Detalle)
                                                    values
                                                        ($IdTest,$IdFactor,$IdPregunta,'$IdRespuesta');
                                                    ";
                                            $resultInsResp = $mysqli->query($queryInsResp);
                                            //echo "<h3>$queryInsResp</h3>";
                                            break;
                                        }
                                        case "2":
                                        {
                                            //Insertar múltiples respuestas
                                            echo "<h1>$IdRespuesta</h1>";
                                            for ($i=0;$i<count($IdRespuesta);$i++)
                                            {
                                                $idResp = $IdRespuesta[$i];
                                                $queryInsResp = "insert into testdetalle
                                                        (IdTest,IdFactor,IdPregunta,IdRespuesta)
                                                    values
                                                        ($IdTest,$IdFactor,$IdPregunta,$idResp);
                                                    ";
                                                $resultInsResp = $mysqli->query($queryInsResp);
                                                //echo "<h3>$queryInsResp</h3>";
                                            }

                                            break;
                                        }
                                        default:

                                            break;
                                    }

                                }



                        //Guardar vacunación
                        $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 3;";
                        $tblPregEV = $mysqli->query($query);
                        $arrPregEV = array();

                        while ($f = $tblPregEV->fetch_assoc())
                        {
                            $IdPregunta = $f["IdPregunta"];
                            $Ponderacion = $f["Ponderacion"];

                            $IdFactor = 3;
                            $IdRespuesta = $_POST["selPregunta". $f["IdPregunta"]];

                            switch ($Ponderacion) {
                                case "0":
                                {
                                    //Insertar una respuesta por pregunta
                                    $queryInsResp = "insert into testdetalle
                                                (IdTest,IdFactor,IdPregunta,IdRespuesta)
                                            values
                                                ($IdTest,$IdFactor,$IdPregunta,$IdRespuesta);
                                            ";
                                    $resultInsResp = $mysqli->query($queryInsResp);
                                   
                                    break;
                                }
                                case "1":
                                {
                                    //Insertar la respuesta abierta
                                    $queryInsResp = "insert into testdetalle
                                                (IdTest,IdFactor,IdPregunta,Detalle)
                                            values
                                                ($IdTest,$IdFactor,$IdPregunta,'$IdRespuesta');
                                            ";
                                    $resultInsResp = $mysqli->query($queryInsResp);
                                   
                                    break;
                                }
                                case "2":
                                {
                                    //Insertar múltiples respuestas
                                    echo "<h1>$IdRespuesta</h1>";
                                    for ($i=0;$i<count($IdRespuesta);$i++)
                                    {
                                        $idResp = $IdRespuesta[$i];
                                        $queryInsResp = "insert into testdetalle
                                                (IdTest,IdFactor,IdPregunta,IdRespuesta)
                                            values
                                                ($IdTest,$IdFactor,$IdPregunta,$idResp);
                                            ";
                                        $resultInsResp = $mysqli->query($queryInsResp);
                                        
                                    }

                                    break;
                                }
                                default:

                                    break;
                            }

                        }
                       // echo "entra aqui porque no se digito dui ";
                    header('Location: ../../web/ingresoexpediente/view?id='.$last_id);
            }
            else{
                $_SESSION['dui'] = "";
                 $insertexpediente = "INSERT INTO persona
                        (
                             Nombres,Apellidos,FechaNacimiento,Direccion
                            ,Correo,IdGeografia,Genero,IdEstadoCivil
                            ,Telefono,Celular,Alergias
                            ,Medicamentos,Enfermedad,Dui,TelefonoResponsable
                            ,IdEstado,Categoria,NombresResponsable
                            ,ApellidosResponsable,Parentesco,DuiResponsable,IdPais,codigopaciente
                        )
                        VALUES
                        (
                             '$Nombres','$Apellidos','$FechaNacimiento','$Direccion'
                            ,'$Correo','$IdGeografia','$Genero','$IdEstadoCivil'
                            ,'$Telefono','$Celular','$Alergias'
                            ,'$Medicamentos','$Enfermedad','$Dui','$TelefonoResponsable'
                            ,'$IdEstado','$Categoria','$NombresResponsable'
                            ,'$ApellidosResponsable','$Parentesco','$DuiResponsable',$IdPais,$bc
                        )";


                            $resultadoinsertmovimiento = $mysqli->query($insertexpediente);
                             $last_id = $mysqli->insert_id;

                           

                            $query = "select IdPersona from persona order by 1 desc limit 1";

                            $tbl = $mysqli->query($query);
                            $arr = array();

                            while ($f = $tbl->fetch_assoc())
                            {
                              $arr[] = $f;
                            }

                            $IdPersona = $arr[0]["IdPersona"];

                            echo "<h1>$IdPersona</h1>";

                            //Insertando el registro para el test de la persona
                            $strTest = "insert into test
                                            (IdPersona,IdClase,Fecha,Hora)
                                        VALUES
                                            ($IdPersona,1,NOW(),NOW())
                                        ";
                            $resultTest = $mysqli->query($strTest);

                            echo "<h2>$strTest</h2>";

                            //Determinando el IdTest
                            $query = "select IdTest from test order by 1 desc limit 1";

                            $tbl = $mysqli->query($query);
                            $arrTest = array();

                            while ($f = $tbl->fetch_assoc())
                            {
                              $arrTest[] = $f;
                            }

                            $IdTest = $arrTest[0]["IdTest"];


                            //echo "<h1>$IdTest</h1>";



                                //Barriendo las preguntas del socioeconómico
                                $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 1;";
                                $tblPreguntas = $mysqli->query($query);
                                $arrPreguntas = array();

                                while ($f = $tblPreguntas->fetch_assoc())
                                {
                                    $IdPregunta = $f["IdPregunta"];
                                    $IdRespuesta = $_POST["selPregunta". $f["IdPregunta"]];
                                    $IdFactor = 1;

                                    $queryInsResp = "insert into testdetalle
                                                        (IdTest,IdFactor,IdPregunta,IdRespuesta)
                                                    values
                                                        ($IdTest,$IdFactor,$IdPregunta,$IdRespuesta)
                                                    ";
                                    $resultInsResp = $mysqli->query($queryInsResp);
                                }



                                $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 2;";
                                $tblPregHC = $mysqli->query($query);
                                $arrPregHC = array();

                                while ($f = $tblPregHC->fetch_assoc())
                                {
                                    $IdPregunta = $f["IdPregunta"];
                                    $Ponderacion = $f["Ponderacion"];

                                    $IdFactor = 2;
                                    $IdRespuesta = $_POST["selPregunta". $f["IdPregunta"]];

                                    switch ($Ponderacion) {
                                        case "0":
                                        {
                                            //Insertar una respuesta por pregunta
                                            $queryInsResp = "insert into testdetalle
                                                        (IdTest,IdFactor,IdPregunta,IdRespuesta)
                                                    values
                                                        ($IdTest,$IdFactor,$IdPregunta,$IdRespuesta);
                                                    ";
                                            $resultInsResp = $mysqli->query($queryInsResp);
                                            //echo "<h3>$queryInsResp</h3>";
                                            break;
                                        }
                                        case "1":
                                        {
                                            //Insertar la respuesta abierta
                                            $queryInsResp = "insert into testdetalle
                                                        (IdTest,IdFactor,IdPregunta,Detalle)
                                                    values
                                                        ($IdTest,$IdFactor,$IdPregunta,'$IdRespuesta');
                                                    ";
                                            $resultInsResp = $mysqli->query($queryInsResp);
                                            //echo "<h3>$queryInsResp</h3>";
                                            break;
                                        }
                                        case "2":
                                        {
                                            //Insertar múltiples respuestas
                                            echo "<h1>$IdRespuesta</h1>";
                                            for ($i=0;$i<count($IdRespuesta);$i++)
                                            {
                                                $idResp = $IdRespuesta[$i];
                                                $queryInsResp = "insert into testdetalle
                                                        (IdTest,IdFactor,IdPregunta,IdRespuesta)
                                                    values
                                                        ($IdTest,$IdFactor,$IdPregunta,$idResp);
                                                    ";
                                                $resultInsResp = $mysqli->query($queryInsResp);
                                                //echo "<h3>$queryInsResp</h3>";
                                            }

                                            break;
                                        }
                                        default:

                                            break;
                                    }

                                }



                        //Guardar vacunación
                        $query = "select IdPregunta,Nombre,Ponderacion from pregunta where IdFactor = 3;";
                        $tblPregEV = $mysqli->query($query);
                        $arrPregEV = array();

                        while ($f = $tblPregEV->fetch_assoc())
                        {
                            $IdPregunta = $f["IdPregunta"];
                            $Ponderacion = $f["Ponderacion"];

                            $IdFactor = 3;
                            $IdRespuesta = $_POST["selPregunta". $f["IdPregunta"]];

                            switch ($Ponderacion) {
                                case "0":
                                {
                                    //Insertar una respuesta por pregunta
                                    $queryInsResp = "insert into testdetalle
                                                (IdTest,IdFactor,IdPregunta,IdRespuesta)
                                            values
                                                ($IdTest,$IdFactor,$IdPregunta,$IdRespuesta);
                                            ";
                                    $resultInsResp = $mysqli->query($queryInsResp);
                                   
                                    break;
                                }
                                case "1":
                                {
                                    //Insertar la respuesta abierta
                                    $queryInsResp = "insert into testdetalle
                                                (IdTest,IdFactor,IdPregunta,Detalle)
                                            values
                                                ($IdTest,$IdFactor,$IdPregunta,'$IdRespuesta');
                                            ";
                                    $resultInsResp = $mysqli->query($queryInsResp);
                                   
                                    break;
                                }
                                case "2":
                                {
                                    //Insertar múltiples respuestas
                                    echo "<h1>$IdRespuesta</h1>";
                                    for ($i=0;$i<count($IdRespuesta);$i++)
                                    {
                                        $idResp = $IdRespuesta[$i];
                                        $queryInsResp = "insert into testdetalle
                                                (IdTest,IdFactor,IdPregunta,IdRespuesta)
                                            values
                                                ($IdTest,$IdFactor,$IdPregunta,$idResp);
                                            ";
                                        $resultInsResp = $mysqli->query($queryInsResp);
                                        
                                    }

                                    break;
                                }
                                default:

                                    break;
                            }

                        }
                        //echo "entra aqui porque no se digito dui ";
            header('Location: ../../web/ingresoexpediente/view?id='.$last_id);
            }
         
    }
    else{
        echo "error";
    }


